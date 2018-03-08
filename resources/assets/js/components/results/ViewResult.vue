<template>
    <div class="row">
        <notifications position="center" />
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>View Result</header>
                </div>
                <div class="card-body" id="bar-parent">
                    <div class="col-md-12">
                        <table class="tbl-typical">
                            <tr>
                                <th align=""><h4>Select Year and Semester Of Approved Result</h4></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>
                                    Year:
                                    <input type="text" class="form-control" v-model="year" placeholder="2017/2018">
                                </td>

                                <td>
                                    Semester:
                                    <select name="" id="" class="form-control" v-model="semester">
                                        <option value="">Semester</option>
                                        <option value="1st">First Semester</option>
                                        <option value="2nd">Second Semester</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <br><br>
                        <table class="tbl-typical col-md-4">
                            <tr>
                                <td><h4>Students</h4></td>
                            </tr>
                            <tr v-for="resultDetails in allResults">
                                <span v-for="student in students">
                                    <span v-if="student.id == resultDetails.student_id">
                                        <td><a href="#" @click.prevent="viewResult(resultDetails.student_id)">{{student.lastname}}&nbsp;{{student.firstname}} &emsp; {{student.identification_no}}</a></td>
                                    </span>
                                </span>
                            </tr>
                        </table>

                        <div v-show="showResult" class="table-scrollable">
                            <div id="printMe">
                                <label>
                                    <span v-for="student in students">
                                        <span v-if="student.id == selectedStudentId"><h4><strong><h5>Name:</h5> {{student.lastname}} {{student.firstname}} &emsp; <br><h5>Identification No:</h5> {{student.identification_no}}</strong></h4></span>
                                    </span>
                                    <span>
                                        <h4><strong><h5>Year: </h5> {{year}}<h5>Semester: </h5> {{semester}}</strong></h4>
                                    </span>
                                </label>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle">
                                    <thead>
                                    <tr>
                                        <th align="center">Course Code</th>
                                        <th align="center">Unit</th>
                                        <th align="center">C.A</th>
                                        <th align="center">Exam</th>
                                        <th align="center">Total</th>
                                        <th align="center">Grade</th>
                                    </tr>
                                    </thead>
                                    <tbody v-for="results in resultArray">
                                    <tr v-for="result in results" v-if="result.student_id == selectedStudentId">
                                        <td align="center">{{result.course_code}}</td>
                                        <td align="center">{{result.unit}}</td>
                                        <td align="center">{{result.C_A}}</td>
                                        <td align="center">{{result.Exam}}</td>
                                        <td align="center">{{result.total}}</td>
                                        <td align="center">{{result.grade}}</td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <th align="center" colspan="2">Total Grade Points: {{gpa.totalGradePoints}}</th>
                                        <th align="center" colspan="2">Total Units: {{gpa.totalUnits}}</th>
                                        <th align="center" colspan="2">GPA: {{gpa.gpa}}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div style="float: right">
                                <button class="btn btn-sm btn-default" @click="print"><span class="fa fa-print"></span></button>
                                <button class="btn btn-sm btn-default" @click.prevent="pdf"><span class="fa fa-file-pdf-o"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                               result.status = entry.status;
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

            fetchStudents(){
                axios.get('/student/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.students = _response.data;
                        }
                    })
            },

            viewResult(student_id){
//                console.log(this.allResults);
//                console.log(this.resultArray);
                this.calculateCGPA(student_id);
                this.selectedStudentId = student_id;
                this.showResult = !this.showResult;
            },

            print(){
                var prtContent = document.getElementById("printMe");
                var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
            },

            pdf(){
                var data = {
                    result : this.resultArray,
                    student_id: this.selectedStudentId,
                    gpa: this.gpa
                }

                axios.get('/result/pdf/make', {
                    params:{
                        result : this.resultArray,
                        student_id: this.selectedStudentId,
                        gpa: this.gpa
                    }
                });
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
                        if(subEntry.student_id == student_id){;
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

            },

            approveResult(result){
                console.log(result.id);
            },

            printTemplate(student_id){

            },

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
            this.getAuthUser();

        },

        watch: {
            year() {
                if (this.semester) {
                    this.fetchStudents();
                    this.getAllCourses();
                    this.fetchResults();
                }
            },

            semester() {
                if(this.year){
                    this.fetchStudents();
                    this.getAllCourses();
                    this.fetchResults();
                }
            }
        }
    }
</script>