<template>
    <div class="row">

        <div class="col-md-4" v-for="admin in admins">
                <div class="card card-box" v-for="admin in admin">
                    <div class="card-body no-padding ">
                        <div class="doctor-profile">
                            <img :src="'/images/'+admin.image" class="doctor-pic" alt="">
                            <div class="profile-usertitle">
                                <div class="doctor-name">{{admin.lastname}} {{admin.firstname}}</div>
                                <div class="name-center">
                                     <span v-for="user_type in user_types">
                                        <span v-if="user_type.id == admin.user_type">{{user_type.name}}</span>
                                    </span>
                                </div>
                            </div>
                            <p>{{admin.address}}</p>
                            <div><p><i class="fa fa-phone"></i><a :href="'tel:'+admin.tel_no">  {{admin.tel_no}}</a></p> </div>
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
                admins : '',
                user_types:'',
            }
        },

        methods: {
            fetchAdmin(){
                axios.post('/user/viewSpecificType', ['1','2'])
                    .then(response => {
                        console.log(response);
                        var _response = response.data;
                        if(_response.status === 0){
                            this.admins = _response.data;
                        }
                    })
            },
            fetchUserType(){
                axios.get('/UserType/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.user_types = _response.data;
                        }
                    })
            },
        },

        mounted(){
            this.fetchAdmin();
            this.fetchUserType();
        }
    }
</script>