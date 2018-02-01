<template>
    <div>
        <notifications position="top center" />
        <div class="row">
            <div class="col-md-12">
                <table class="tbl-typical">
                    <tr>
                        <th align=""><h4>Edit Result</h4></th>
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
                    <tr v-for="results in allResults">
                        <span v-for="student in students">
                            <span v-if="student.id == results.student_id">
                                <td><a href="#" @click="viewResultForm(results)">{{student.firstname}} &emsp; {{student.identification_no}}</a></td>
                            </span>
                        </span>
                    </tr>
                </table>

                <table class="tbl-typical" v-show="resultEditor">
                    <tr>
                        <th>Course</th>
                        <th>C.A.</th>
                        <th>Exams</th>
                        <th><label style="margin-left: 20px;">Edit?</label><switches v-model="edit" color="blue" style="margin-left:10px;"></switches></th>
                    </tr>
                    <tr v-for="result in resultArray">
                        <span v-for="courseDetails in listOfCourses">
                            <td v-if="courseDetails.id == result.course_id.course_id">
                                {{courseDetails.course_code}}
                            </td>
                        </span>
                        <td>
                            <input type="text" class="form-control" v-model="result.C_A" placeholder="Enter C.A. scores" :disabled="!edit">
                        </td>

                        <td>
                            <input type="text" class="form-control" v-model="result.Exam" placeholder="Enter Exam scores" :disabled="!edit">
                        </td>
                    </tr>
                </table>
                <button class="btn btn-success" style="margin:20px; float:right;" @click.prevent="updateResult" v-show="resultEditor" :disabled="!edit">
                    <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                </button>

            </div>

        </div>
    </div>
</template>
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
                allResults : '',
                resultArray: '',
                edit:false,
                focused_student_id:'',

                resultDetails: {},
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
                        if(_response.status === 0){
                            this.listOfCourses =  _response.data;
                        }
                    })
            },

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
                            this.allResults = _response.data;
                            console.log(this.allResults);
                        }
                    })
            },

            viewResultForm(results){
                this.resultEditor = !this.resultEditor;
                this.resultArray = '';
                this.resultArray = JSON.parse(results.results);
                this.focused_student_id = results.student_id;

            },

            updateResult(){
                this.resultDetails.semester = this.semester;
                this.resultDetails.year = this.year;
                this.resultDetails.results = JSON.stringify(this.resultArray);
                this.resultDetails.student_id = this.focused_student_id;

                console.log(this.resultDetails);
                axios.post('/result/edit', this.resultDetails)
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.$notify({type: 'success', text: 'Result updated sucessfully', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Updating of result unsuccessfully. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating of result unsuccessfully. Try again later</span>', speed:400});
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
                    this.fetchResults()
                }
            },

            semester() {
                if(this.year){
                    this.fetchResults()
                }
            }
        }
    }
</script>