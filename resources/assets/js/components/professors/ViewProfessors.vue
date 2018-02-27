<template>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-box">
                <div class="card-body no-padding ">
                    <div class="doctor-profile">
                        <img src="" class="doctor-pic" alt="">
                        <div class="profile-usertitle">
                            <div class="doctor-name">Pooja Patel </div>
                            <div class="name-center"> Mathematics </div>
                        </div>
                        <p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
                        <div><p><i class="fa fa-phone"></i><a href="tel:(123)456-7890">  (123)456-7890</a></p> </div>
                        <div class="profile-userbuttons">
                            <a href="professor_profile.html" class="btn btn-circle deepPink-bgcolor btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-box">
                <div class="card-body no-padding ">
                    <div class="doctor-profile">
                        <img src="" class="doctor-pic" alt="">
                        <div class="profile-usertitle">
                            <div class="doctor-name">Pooja Patel </div>
                            <div class="name-center"> Mathematics </div>
                        </div>
                        <p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
                        <div><p><i class="fa fa-phone"></i><a href="tel:(123)456-7890">  (123)456-7890</a></p> </div>
                        <div class="profile-userbuttons">
                            <a href="professor_profile.html" class="btn btn-circle deepPink-bgcolor btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-box">
                <div class="card-body no-padding ">
                    <div class="doctor-profile">
                        <img src="" class="doctor-pic" alt="">
                        <div class="profile-usertitle">
                            <div class="doctor-name">Pooja Patel </div>
                            <div class="name-center"> Mathematics </div>
                        </div>
                        <p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
                        <div><p><i class="fa fa-phone"></i><a href="tel:(123)456-7890">  (123)456-7890</a></p> </div>
                        <div class="profile-userbuttons">
                            <a href="professor_profile.html" class="btn btn-circle deepPink-bgcolor btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-box">
                <div class="card-body no-padding ">
                    <div class="doctor-profile">
                        <img src="" class="doctor-pic" alt="">
                        <div class="profile-usertitle">
                            <div class="doctor-name">Pooja Patel </div>
                            <div class="name-center"> Mathematics </div>
                        </div>
                        <p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
                        <div><p><i class="fa fa-phone"></i><a href="tel:(123)456-7890">  (123)456-7890</a></p> </div>
                        <div class="profile-userbuttons">
                            <a href="professor_profile.html" class="btn btn-circle deepPink-bgcolor btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-box">
                <div class="card-body no-padding ">
                    <div class="doctor-profile">
                        <img src="" class="doctor-pic" alt="">
                        <div class="profile-usertitle">
                            <div class="doctor-name">Pooja Patel </div>
                            <div class="name-center"> Mathematics </div>
                        </div>
                        <p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
                        <div><p><i class="fa fa-phone"></i><a href="tel:(123)456-7890">  (123)456-7890</a></p> </div>
                        <div class="profile-userbuttons">
                            <a href="professor_profile.html" class="btn btn-circle deepPink-bgcolor btn-sm">Read More</a>
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

            }
        },

        methods: {
            fetchProfessors(){
                axios.post('/user/viewSpecificType', ['4'])
                    .then(response => {
                        console.log(response);
                        var _response = response.data;
                        if(_response.status === 0){
                           console.log(_response.data);
                        }
                    })
            }
        },

        mounted(){
            this.fetchProfessors();
        }
    }
</script>