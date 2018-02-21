<template>
    <div>
        <notifications position="top center" />
        <table class="tbl-typical">
            <tr>
                <th align=""><h4>Select Year and Semester</h4></th>
                <th></th>
            </tr>
            <tr>
                <td>
                    Year:
                    <input type="text" class="form-control" v-model="year" placeholder="2017/2018">
                </td>

                <td>
                    Semester:
                    <select name="" id="" class="form-control col-md-6" v-model="semester">
                        <option value="1st">First Semester</option>
                        <option value="2nd">Second Semester</option>
                    </select>
                </td>
            </tr>
        </table>

        <div>
            <table class="table tbl-typical" v-show="allCourseInfo">
                <tr>
                    <th align="center">Course Code</th>
                    <th align="center">Unit</th>
                    <th align="center">C.A</th>
                    <th align="center">Exam</th>
                    <th align="center">Total</th>
                    <th align="center">Grade</th>
                </tr>
            </table>
            <span v-for="results in resultArray">
                <span v-for="result in results">
                    <span v-if="result.student_id == selectedStudentId">
                        <table class="tbl-typical">
                            <tr>
                                <td align="center">{{result.course_code}}</td>
                                <td align="center">{{result.unit}}</td>
                                <td align="center">{{result.C_A}}</td>
                                <td align="center">{{result.Exam}}</td>
                                <td align="center">{{result.total}}</td>
                                <td align="center">{{result.grade}}</td>
                            </tr>
                        </table>
                    </span>
                </span>
            </span>
            <br><br>
            <table class="tbl-typical">
                <tr>
                    <!--<th>&emsp;&emsp;&emsp;&emsp;&emsp;</th>-->
                    <th align="center">Total Grade Points : {{gpa.totalGradePoints}}</th>
                    <th align="center">Total Units : {{gpa.totalUnits}}</th>
                    <th align="center">GPA : {{gpa.gpa}}</th>
                </tr>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                courses: '',
                enabled: false,
                allResults:'',
                allCourseInfo:'',
                year:'2017/2018',
                semester:'',
                students:'',
                showResult:false,
                selectedStudentId:'',
                resultArray:[],
                gpa:{},
            }
        },

        methods: {
            fetchResults(){
                var params = {
                    semester: this.semester,
                    year: this.year,
                }
                this.resultArray = [];
                axios.post('/result/view-selected', params)
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            var allCourses = this.allCourseInfo;
                            this.allResults = _response.data;
                            //console.log(this.allResults);

                            this.allResults.forEach( entry => {
                               var result = JSON.parse(entry.results);
                               entry.results = JSON.parse(entry.results);

                               /*calculating the grade*/
                               result.forEach(secondEntry => {
                                   secondEntry.total = parseInt(secondEntry.C_A) + parseInt(secondEntry.Exam);
                                   if (secondEntry.total >= 70){
                                       secondEntry.grade = 'A';
                                       secondEntry.points = 5;
                                   }else if(secondEntry.total <70 && secondEntry.total >= 60){
                                       secondEntry.grade = 'B';
                                       secondEntry.points = 4;
                                   }else if(secondEntry.total <60 && secondEntry.total >= 50){
                                       secondEntry.grade = 'C';
                                       secondEntry.points = 3;
                                   }else if(secondEntry.total <50 && secondEntry.total >= 40){
                                       secondEntry.grade = 'D';
                                       secondEntry.points = 0;
                                   }else if(secondEntry.total <40){
                                       secondEntry.grade = 'F';
                                       secondEntry.points = 0;

                                   }

                                   allCourses.forEach(courseEntry =>{
                                       if (courseEntry.id  == secondEntry.course_id.course_id){
                                           secondEntry.unit = courseEntry.unit;
                                           secondEntry.course_code = courseEntry.course_code;
                                       }
                                   })
                               })

//                                console.log(result);
                                this.resultArray.push(result);
                            });
                        }
                    })
            },

            getAllCourses(){
                axios.get('/course/view')
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.allCourseInfo = _response.data;
                        }
                    })
            },

            fetchStudent(){
                axios.get('/student/loggedIn')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.selectedStudentId = _response.data;
                            this.viewResult(this.selectedStudentId);
                        }
                    })
            },

            viewResult(student_id){
//                console.log(this.allResults);
//                console.log(this.resultArray);
                this.calculateCGPA(student_id);
                this.showResult = !this.showResult;
            },

            /*calculateCGPA (){
                var totalUnits = 0.0;
                var gradePoints = 0.0;
                var  cgpa = 0.0;
                var student_id = '';
                this.resultArray.forEach(entry =>{
                    student_id = entry.student_id;
                    entry.forEach(subEntry => {
                        var v1 = parseInt(subEntry.unit);
                        var v2 = parseInt(subEntry.points);
                        totalUnits += parseInt(subEntry.unit);
                        var points = v1 * v2;
                        gradePoints += points
                    })

                    cgpa = gradePoints / totalUnits;
                    console.log(gradePoints);
                    console.log(totalUnits);
                    console.log(cgpa);
                    this.cgpa.push(
                        {
                            totalGradePoints : gradePoints,
                            totalUnits : totalUnits,
                            cgpa : cgpa,
                            student_id : student_id,
                        }
                    )
                })
            }*/

            calculateCGPA (student_id){
                var totalUnits = 0.0;
                var gradePoints = 0.0;
                var  gpa = 0.0;
                this.gpa = {};
               /* var student_id = '';*/
                this.resultArray.forEach(entry =>{
                    entry.forEach(subEntry => {
                        if(subEntry.student_id == student_id){
                            var v1 = parseInt(subEntry.unit);
                            var v2 = parseInt(subEntry.points);
                            totalUnits += parseInt(subEntry.unit);
                            var points = v1 * v2;
                            gradePoints += points
                        }
                    })

                    gpa = gradePoints / totalUnits;

                })

                this.gpa.totalGradePoints = gradePoints;
                this.gpa.totalUnits = totalUnits;
                this.gpa.gpa = gpa;
                this.gpa.student_id = student_id;

            }

            /*update(course){
                axios.post('/course/edit', course)
                    .then(response => {
                        this.fetchView();
                        this.$notify({type: 'success', text: 'Course update successful', speed:400});
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating course. unsuccessfully. Try again later</span>', speed:400});
                    })
            }*/
        },

        mounted(){
            /*this.fetchView();*/
            /*this.getAllCourses();*/

        },

        watch: {
            year() {
                if (this.semester) {
                    this.fetchStudent();
                    this.getAllCourses();
                    this.fetchResults();
                }
            },

            semester() {
                if(this.year){
                    this.fetchStudent();
                    this.getAllCourses();
                    this.fetchResults();
                }
            }
        }
    }
</script>