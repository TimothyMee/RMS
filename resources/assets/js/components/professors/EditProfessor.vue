<template>
    <div>
        <modal name="myModal" :draggable="true" :scrollable="true" @before-open="beforeOpen" :adaptive="true" height="auto">

            <div class="page-title">
                <span class="col-md-2"><img :src="'/images/'+data.image" class="doctor-pic" alt=""> {{data.lastname}} {{data.firstname}}</span>
                <span style="" class="col-md-2 col-md-offset-6"><label class=""><h5>Edit?</h5></label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches></span>
                <button class="btn btn-danger btn-xs" @click="$modal.hide('myModal')" style="float: right;"><span aria-hidden="true">&times;</span></button>
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
                            <div class="page-title">All Professor List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/home">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a class="parent-item" href="#">Professor</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">All Professor List</li>
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
                                                    <header>All Professor List</header>
                                                    <div class="tools">
                                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                    </div>
                                                </div>
                                                <div class="card-body ">
                                                    <div class="table-scrollable">
                                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">


                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th> Roll No </th>
                                                                <th> Name </th>
                                                                <th> Department </th>
                                                                <th> Mobile </th>
                                                                <th> Email </th>
                                                                <th>Appointment Date</th>
                                                                <th> Action </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr class="odd gradeX" v-for="(professor, index) in professors">
                                                                <td class="patient-img">
                                                                    <img :src="'/images/'+professor.image" alt="">
                                                                </td>
                                                                <td class="left">{{++index}}</td>
                                                                <td>{{professor.lastname}} {{professor.firstname}}</td>
                                                                <td class="left">
                                                                    <span v-for="department in departments">
                                                                        <span v-if="department.id == professor.department_id">{{department.name}}</span>
                                                                    </span>
                                                                </td>
                                                                <td><a :href="'tel:'+ professor.tel_no">
                                                                    {{professor.tel_no}} </a></td>
                                                                <td><a :href="'mailto:'+professor.email">
                                                                    {{professor.email}}</a></td>
                                                                <td class="left">{{professor.created_at}}</td>
                                                                <td>
                                                                    <a class="btn btn-primary btn-xs" id="modal_launcher" @click="launch(professor)">
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
                professors : '',
                enabled: false,
                data:'',
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

            update(professor){
                axios.post('/professor/edit', professor)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.$notify({type: 'success', text: 'Professor update successful', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Updating Professor\'s info. unsuccessfully. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating Professor\'s info. unsuccessfully. Try again later</span>', speed:400});
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

            launch(data){
                this.$modal.show('myModal' ,data);
            },

            beforeOpen (event) {
                this.data = event.params;
            }
        },

        mounted(){
            this.fetchDepartments();
            this.fetchProfessors();
        }
    }
</script>