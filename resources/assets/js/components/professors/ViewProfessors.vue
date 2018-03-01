<template>
    <div class="row">
        <div class="col-md-4"  v-for="professor in professors">
            <div class="card card-box">
                <div class="card-body no-padding ">
                    <div class="doctor-profile">
                        <img :src="'/images/'+professor.image" class="doctor-pic" alt="">
                        <div class="profile-usertitle">
                            <div class="doctor-name">{{professor.lastname}} {{professor.firstname}}</div>
                            <div class="name-center">
                                <span v-for="department in departments">
                                    <span v-if="department.id == professor.department_id">
                                        {{department.name}}
                                    </span>
                                </span>
                            </div>
                        </div>
                        <p>{{professor.address}}</p>
                        <div><p><i class="fa fa-phone"></i><a :href="'tel:'+professor.tel_no">  {{professor.tel_no}}</a></p> </div>
                        <div class="profile-userbuttons">
                            <a href="#" class="btn btn-circle deepPink-bgcolor btn-sm">Read More</a>
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
                professors : '',
                departments:'',
            }
        },

        methods: {
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
            fetchDepartments(){
                axios.get('/department/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.departments = _response.data;
                        }
                    })
            },
        },

        mounted(){
            this.fetchProfessors();
            this.fetchDepartments();
        }
    }
</script>