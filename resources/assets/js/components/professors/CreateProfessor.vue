<template>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Basic Information</header>
                </div>
                <div class="card-body" id="bar-parent">
                    <form action="#" id="form_sample_1" class="form-horizontal">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3">First Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="professor.firstname" data-required="1" placeholder="enter first name" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Middle Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="professor.middlename" data-required="1" placeholder="enter first name" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Last Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="professor.lastname" data-required="1" placeholder="enter last name" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Email
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" class="form-control input-height" v-model="professor.email" placeholder="Email Address"> </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Password
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="password" v-model="professor.password" data-required="1" placeholder="enter Password" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Confirm Password
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="professor.cPassword" data-required="1" placeholder="Reenter your password" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Departments
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" v-model="professor.department">
                                        <option value="">Select...</option>
                                        <option value="Category 1">Computer</option>
                                        <option value="Category 2">Mechanical</option>
                                        <option value="Category 3">Mathematics</option>
                                        <option value="Category 4">Commerce</option>
                                        <option value="Category 5">Music</option>
                                        <option value="Category 6">Science</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Gender
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" v-model="professor.gender">
                                        <option value="">Select...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Mobile No.
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input v-model="professor.tel_no" type="text" placeholder="mobile number" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Birth Date
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group date form_date " data-date="" data-date-format="D, d MM yyyy" data-link-field="dtp_input5" data-link-format="yyyy-mm-dd">
                                        <input class="form-control input-height" size="16" placeholder="date of Birth" type="text">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                    <input type="hidden" id="dtp_input5" v-model="professor.DOB" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Address
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <textarea v-model="professor.address" placeholder="address" class="form-control-textarea" rows="5" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Profile Picture
                                </label>
                                <div class="compose-editor">
                                    <input type="file" class="default"  multiple>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="offset-md-3 col-md-9">
                                        <button type="submit" class="btn btn-info" @click="create()">Submit</button>
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                professor:{}
            }
        },

        mounted(){

        },

        methods: {
            create(){
                axios.post('/professor/add', this.professor)
                    .then(response => {
                        var _response = response.data;
                        if(_response.status == 0){
                            this.$notify({type: 'success', text: 'Course added sucessfully', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed:400});
                    })
            }
        }
    }
</script>