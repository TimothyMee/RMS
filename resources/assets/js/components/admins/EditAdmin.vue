<template>
    <div>
        <modal name="myModal" :draggable="true" :scrollable="true" @before-open="beforeOpen" :adaptive="true" height="auto">

            <div class="page-title">
                <button class="btn btn-danger btn-xs" @click="$modal.hide('myModal')" style="float: right;"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2"><img :src="'/images/'+data.image" class="doctor-pic" alt=""> {{data.lastname}} {{data.firstname}}</span>
                <span style="" class="col-md-2 col-md-offset-6"><label class=""><h5>Edit?</h5></label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches></span>
            </div>
            <hr>

            <div class="container">
                <div class="row">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" v-model="data.firstname" class="form-control" :disabled=!enabled>
                    </div>
                    <div class="form-group">
                        <label for="">Second Name </label>
                        <input type="text" v-model="data.middlename" class="form-control" :disabled=!enabled>
                    </div>
                    <div class="form-group">
                        <label for="">Last Name </label>
                        <input type="text" v-model="data.lastname" class="form-control" :disabled=!enabled>
                    </div>
                    <div class="form-group">
                        <label for="">Email </label>
                        <input type="text" v-model="data.email" class="form-control" :disabled=!enabled>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">User Type:
                            <span v-for="user_type in user_types">
                                <span v-if="user_type.id == data.user_type">{{user_type.name}}</span>
                            </span>
                        </label>
                        <select name="" id="" v-model="newUserType" v-show="enabled" class="form-control">
                            <option value="">Admin Type</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Telephone </label>
                        <input type="text" v-model="data.tel_no" class="form-control" :disabled=!enabled>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Address</label>
                        <textarea name="" id="" cols="40" rows="10" v-model="data.address" class="form-control" :disabled=!enabled></textarea>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-default"  @click="$modal.hide('myModal')">Close</button>
                        <button type="button" class="btn btn-primary"  @click="update(data)" :disabled="!enabled">Save changes</button>
                    </div>
                </div>
            </div>

        </modal>
        <div class="page-content-wrapper">
            <div class="page-content">
                <notifications position="center" />
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">All Admin List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/home">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a class="parent-item" href="#">Admin</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">All Admin List</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-line">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li class="nav-item"><a href="#tab1" class="nav-link active"  data-toggle="tab" >List View</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active fontawesome-demo" id="tab1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-box">
                                                <div class="card-head">
                                                    <header>All Admin List</header>
                                                    <div class="tools">
                                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                    </div>
                                                </div>
                                                <div class="card-body ">
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                        <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th> Roll No </th>
                                                            <th> Name </th>
                                                            <th> Type </th>
                                                            <th> Mobile </th>
                                                            <th> Email </th>
                                                            <th>Appointment Date</th>
                                                            <th> Action </th>
                                                        </tr>
                                                        </thead>
                                                            <tbody v-for="(seperateTypes,index1) in admins">
                                                                <span v-show="false">{{++index1}}</span>
                                                                <tr v-for="(admin,index2) in seperateTypes" class="odd gradeX">
                                                                    <td class="patient-img">
                                                                        <img :src="'/images/'+admin.image" alt="">
                                                                    </td>
                                                                    <td class="left">{{++index2 * index1}}</td>
                                                                    <td>{{admin.lastname}} {{admin.firstname}}</td>
                                                                    <td class="left">
                                                                        <span v-for="user_type in user_types">
                                                                            <span v-if="user_type.id == admin.user_type">{{user_type.name}}</span>
                                                                        </span>
                                                                    </td>
                                                                    <td><a :href="'tel:'+ admin.tel_no">
                                                                        {{admin.tel_no}} </a></td>
                                                                    <td><a :href="'mailto:'+admin.email">
                                                                        {{admin.email}}</a></td>
                                                                    <td class="left">{{admin.created_at}}</td>
                                                                    <td>
                                                                        <a class="btn btn-primary btn-xs" id="modal_launcher" @click="launch(admin)">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>

                                                                        <button class="btn btn-danger btn-xs">
                                                                            <i class="fa fa-trash-o "></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end page content -->
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
                departments: '',
                admins : '',
                enabled: false,
                data:'',
                user_types:'',
                newUserType:'',
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
                            console.log(this.admins[0][0]);
                        }
                    })
            },

            update(admin){
                admin.user_type = this.newUserType;
                axios.post('/admin/edit', admin)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.$notify({type: 'success', text: 'Admin update successful', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Updating Admin\'s info. unsuccessfully. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating Admin\'s info. unsuccessfully. Try again later</span>', speed:400});
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

            fetchUserType(){
                axios.get('/UserType/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.user_types = _response.data;
                        }
                    })
            },

            launch(data){
                this.$modal.show('myModal' ,data);
            },

            beforeOpen (event) {
                this.data = event.params;
            }
        },

        mounted(){
            this.fetchDepartments();
            this.fetchUserType();
            this.fetchAdmin();
        }
    }
</script>