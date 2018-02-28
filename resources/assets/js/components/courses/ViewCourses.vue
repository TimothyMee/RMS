<template>
    <div class="row">
        <div v-for="course in courses" class="col-lg-3 col-md-6 col-12 col-sm-6">
            <div class="blogThumb">
                <div class="thumb-center"><img class="img-responsive" alt="course" :src="'/images/'+course.image"></div>
                <div class="course-box">
                    <h4>{{course.name}}</h4>
                    <div class="text-muted">
                        <span class="m-r-10">{{course.course_code}}</span>
                        <a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
                    </div>
                    <p><span><i class="ti-alarm-clock"></i> Duration: 1 Semester</span></p>
                    <p>
                        <span>
                            <i class="ti-user"></i>
                            Professor:
                                <span v-for="professor in professors">
                                    <span v-if="professor.id == course.professor_id">{{professor.lastname}} {{professor.firstname}}</span>
                                </span>
                        </span>
                    </p>
                    <!--<p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>-->
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read More</button>
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
                professors:''
            }
        },

        methods: {
            fetchView(){
                axios.get('/course/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.courses = _response.data;
                        }
                    })
            },
            fetchProfessors(){
                axios.post('/user/viewSpecificType', ['4'])
                    .then(response => {
                        console.log(response);
                        var _response = response.data;
                        if(_response.status === 0){
                            this.professors = _response.data[0];
                        }
                    })
            },
        },

        mounted(){
            this.fetchProfessors();
            this.fetchView();
        }
    }
</script>