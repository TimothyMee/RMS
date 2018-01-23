<template>
    <div>
        <notifications position="top center" />
        <div class="row">
            <div class="col-md-12">
                <table class="tbl-typical">
                    <tr>
                        <th align=""><h4>Edit Registration</h4></th>
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
                    <tr v-for="course in allRegisteredCourses">
                        <span v-for="student in students">
                            <span v-if="student.id == course.student_id">
                                <td><a href="#" @click="viewCourseForm(course)">{{student.firstname}} &emsp; {{student.identification_no}}</a></td>
                            </span>
                        </span>
                    </tr>
                </table>

                <table class="tbl-typical" v-show="courseEditor">
                    <tr>
                        <th>Course</th>
                        <th><label style="margin-left: 20px;">Edit?</label><switches v-model="edit" color="blue" style="margin-left:10px;"></switches></th>
                        <th v-show="edit"><h6 style="float:right;">Add Courses &emsp;<a class="fa fa-plus-circle" @click="addCourse"></a></h6></th>
                    </tr>
                    <tr v-for="courses in courseArray">
                        <td>
                            <span v-for="courseDetails in listOfCourses">
                                <span v-if="courses.course_id == courseDetails.id">{{courseDetails.course_code}}</span>
                            </span>
                        </td>

                        <td v-show="edit">
                            <label for="">

                            </label>
                            <select name="" id="" v-model="courses.course_id" class="form-control">
                                <option :value="courseDetails.id" v-for="courseDetails in listOfCourses"> {{courseDetails.name}} || {{courseDetails.course_code}}</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-success" style="margin:20px; float:right;" @click.prevent="updateCourses" v-show="edit" :disabled="!edit">
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
                courseEditor:false,
                listOfCourses:{},
                semester:'',
                year:'',
                params :{},
                allRegisteredCourses : '',
                courseArray: '',
                edit:false,
                focused_student_id:'',

                registrationDetails: {},
            }
        },

        methods: {
            fetchStudents(){
                axios.get('/student/view')
                    .then(response => {
                        if(response.status === 200){
                            this.students = response.data;
                        }
                    })
            },

            getCourses(){
                axios.get('/course/view')
                    .then(response => {
                        if (response.status === 200){
                            this.listOfCourses =  response.data;
                        }
                    })
            },

            fetchCourses(){
                var params = {
                    semester: this.semester,
                    year: this.year,
                }
                this.courseArray = [];
                axios.post('/course/registration/view-selected', params)
                    .then(response => {
                        if(response.status === 200){
                            this.allRegisteredCourses = response.data;
                            console.log(this.allRegisteredCourses);
                        }
                    })
            },

            viewCourseForm(courses){
                this.courseEditor = !this.courseEditor;
                this.courseArray = '';
                this.courseArray = JSON.parse(courses.courses);
                this.focused_student_id = courses.student_id;

            },

            addCourse(){
                this.courseArray.push({course_id: ''});
            },

            updateCourses(){
                this.registrationDetails.semester = this.semester;
                this.registrationDetails.year = this.year;
                this.registrationDetails.courses = JSON.stringify(this.courseArray);
                this.registrationDetails.student_id = this.focused_student_id;

                console.log(this.resultDetails);
                axios.post('/course/registration/edit', this.registrationDetails)
                    .then(response => {
                        this.$notify({type: 'success', text: 'Course registration updated sucessfully', speed:400});
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating of course registration unsuccessfully. Try again later</span>', speed:400});
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
                    this.fetchCourses()
                }
            },

            semester() {
                if(this.year){
                    this.fetchCourses()
                }
            }
        }
    }
</script>