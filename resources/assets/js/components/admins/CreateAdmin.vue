<template>
    <div class="row">
        <notifications position="center" />
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
                                    <input type="text" v-model="admin.firstname" data-required="1" placeholder="enter first name" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Middle Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="admin.middlename" data-required="1" placeholder="enter first name" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Last Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="admin.lastname" data-required="1" placeholder="enter last name" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Identification No
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="admin.identification_no" data-required="1" placeholder="enter ID no" class="form-control input-height" /> </div>
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
                                        <input tydpe="text" class="form-control input-height" v-model="admin.email" placeholder="Email Address"> </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Password
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="password" v-model="admin.password" data-required="1" placeholder="enter Password" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Confirm Password
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="password" v-model="admin.cPassword" data-required="1" placeholder="Reenter your password" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Departments
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" v-model="admin.department_id">
                                        <option value="">Select...</option>
                                        <option :value="department.id" v-for="department in departments">
                                            {{department.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Gender
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" v-model="admin.gender">
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
                                    <input v-model="admin.tel_no" type="text" placeholder="mobile number" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Birth Date
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="date" class="form-control" v-model="admin.DOB"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Address
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <textarea v-model="admin.address" placeholder="address" class="form-control-textarea" rows="5" ></textarea>
                                </div>
                            </div>
                            <div>
                                <label class="control-label col-md-3">Admin Type
                                    <span class="required"> * </span>
                                </label>
                                <select name="" id="" v-model="admin.user_type">
                                    <option value="" selected>Admin Type</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="offset-md-3 col-md-9">
                                        <button type="submit" class="btn btn-info" @click.prevent="create()">Submit</button>
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
                admin:{},
                departments:'',
            }
        },

        mounted(){

        },

        methods: {
            create(){
                axios.post('/admin/add', this.admin)
                    .then(response => {
                        var _response = response.data;
                        if(_response.status == 0){
                            this.$notify({type: 'success', text: 'Admin added successfully', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed:400});
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
            this.fetchDepartments();
        }
    }
</script>