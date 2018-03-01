<template>
    <div class="row">
        <notifications position="center" />
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Result Filling</header>
                </div>
                <div class="card-body" id="bar-parent">
                    <div class="col-md-12">
                        <table class="tbl-typical">
                            <tr>
                                <td>
                                    Year:
                                    <input type="text" class="form-control" v-model="year" placeholder="2017/2018">
                                </td>

                                <td>
                                    Semester:
                                    <select name="" id="" class="form-control" v-model="semester">
                                        <option value="" selected>Semester</option>
                                        <option value="1st">First Semester</option>
                                        <option value="2nd">Second Semester</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <hr>

                        <table class="tbl-typical col-md-4">
                            <tr>
                                <th>Students</th>
                            </tr>
                            <tr v-for="courseRegisteredDetails in registeredCourses">
                                <span v-for="student in students">
                                    <span v-if="student.id == courseRegisteredDetails.student_id">
                                        <td><a @click="viewResultForm(courseRegisteredDetails.student_id)">{{student.firstname}} &emsp; {{student.identification_no}}</a></td>
                                    </span>
                                </span>
                            </tr>
                        </table>
                        <br><br>
                        <table class="tbl-typical" v-show="resultEditor">
                            <tr>
                                <th>Course</th>
                                <th>C.A.</th>
                                <th>Exams</th>
                            </tr>
                            <tr v-for="result in resultDetails.results">
                        <span v-for="courseDetails in listOfCourses">
                            <td v-if="courseDetails.id == result.course_id.course_id">
                                {{courseDetails.course_code}}
                            </td>
                        </span>
                                <td>
                                    <input type="text" class="form-control" v-model="result.C_A" placeholder="Enter C.A. scores">
                                </td>
                                <td>
                                    <input type="text" class="form-control" v-model="result.Exam" placeholder="Enter Exam scores">
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-success" style="margin:20px; float:right;" @click.prevent="submitResult" v-show="resultEditor">
                            <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<!--<template>
    <div>
        <notifications position="top center" />
        <div class="row">
            <div class="col-md-12">
                <table class="tbl-typical">
                    <tr>
                        <th align=""><h4>Result Filling</h4></th>
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

                <hr>

                <table class="tbl-typical col-md-4">
                    <tr>
                        <th>Students</th>
                    </tr>
                    <tr v-for="courseRegisteredDetails in registeredCourses">
                        <span v-for="student in students">
                            <span v-if="student.id == courseRegisteredDetails.student_id">
                                <td><a @click="viewResultForm(courseRegisteredDetails.student_id)">{{student.firstname}} &emsp; {{student.identification_no}}</a></td>
                            </span>
                        </span>
                    </tr>
                </table>

                <table class="tbl-typical" v-show="resultEditor">
                    <tr>
                        <th>Course</th>
                        <th>C.A.</th>
                        <th>Exams</th>
                    </tr>
                    <tr v-for="result in resultDetails.results">
                        <span v-for="courseDetails in listOfCourses">
                            <td v-if="courseDetails.id == result.course_id.course_id">
                                {{courseDetails.course_code}}
                            </td>
                        </span>
                        <td>
                            <input type="text" class="form-control" v-model="result.C_A" placeholder="Enter C.A. scores">
                        </td>
                        <td>
                            <input type="text" class="form-control" v-model="result.Exam" placeholder="Enter Exam scores">
                        </td>
                    </tr>
                </table>
                <button class="btn btn-success" style="margin:20px; float:right;" @click.prevent="submitResult" v-show="resultEditor">
                    &lt;!&ndash;<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">&ndash;&gt; Save
                </button>

            </div>

        </div>
    </div>
</template>-->
<script>
    export default {
        data(){
            return {
                students :'',
                resultEditor:false,
                listOfCourses:{},
                semester:'',
                year:'',
                params :{},
                registeredCourses: '',
                allCourse:'',
                resultDetails: {
                    results:'',
                    student_id:'',
                },
            }
        },

        methods: {
            fetchStudents(){
                axios.get('/student/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.students = _response.data;
                        }
                    })
            },

            getCourses(){
                axios.get('/course/view')
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.listOfCourses =  _response.data;
                        }
                    })
            },

            getRegisteredCourses(){
                this.params = {
                    semester: this.semester,
                    year: this.year,
                }
              axios.post('/course/registration/view-selected', this.params)
                  .then(response =>{
                      var _response = response.data;
                      if(_response.status === 0){
                          this.registeredCourses = _response.data;

                          var results = [];
                          this.registeredCourses.forEach( entry=>{
                              var courses = JSON.parse(entry.courses);
                              courses.forEach( courseEntry => {
                                  results.push({course_reg_id: entry.id, student_id: entry.student_id, course_id: courseEntry, C_A: '', Exam: ''});
                              });
                          });
                          this.allCourse = results;
                      }else{


                      }
                  })
            },

            viewResultForm(student_id){
                this.resultEditor = !this.resultEditor;
                this.resultDetails.student_id  = student_id;

                var result = [];
                var course_reg_id;
                this.allCourse.forEach( entry => {
                    if(entry.student_id == student_id){
                       result.push(entry);
                       course_reg_id = entry.course_reg_id;
                    }
                });

                this.resultDetails.results = result;
                this.resultDetails.course_reg_id = course_reg_id;
            },

            submitResult(){
                this.resultDetails.semester = this.params.semester;
                this.resultDetails.year = this.params.year;

                axios.post('/result/add', this.resultDetails)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.$notify({type: 'success', text: 'Result entered sucessfully', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Entering of result unsuccessfully. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Entering of result unsuccessfully. Try again later</span>', speed:400});
                    })
            }
        },

        mounted(){
            this.fetchStudents();
            this.getCourses();
        },

        watch: {
            year() {
                if (this.semester) {
                    this.getRegisteredCourses()
                }
            },

            semester() {
                if(this.year){
                    this.getRegisteredCourses()
                }
            }
        }
    }
</script>