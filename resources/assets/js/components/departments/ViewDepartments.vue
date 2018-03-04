<template>
    <div>
        <modal name="myModal" :draggable="true" :scrollable="true" @before-open="beforeOpen" :adaptive="true" height="auto">

            <div class="page-title">
                <button class="btn btn-danger btn-xs" @click="$modal.hide('myModal')" style="float: right;"><span aria-hidden="true">&times;</span></button>
                <span class="col-md-2">{{data.name}}</span>
                <span style="" class="col-md-2 col-md-offset-6"><label class=""><h5>Edit?</h5></label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches></span>
            </div>
            <hr>

            <div class="container">
                <div class="row">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" v-model="data.name" class="form-control" :disabled=!enabled>
                    </div>
                    <div class="form-group">
                        <label for="">College Name </label>
                        <input type="text" v-model="data.college_name" class="form-control" :disabled=!enabled>
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
                            <div class="page-title">All Departments List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/home">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a class="parent-item" href="#">Departments</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">All Departments List</li>
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
                                                    <header>All Departments List</header>
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
                                                                <th> College </th>
                                                                <th> Head Of Department </th>
                                                                <th> Action </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr class="odd gradeX" v-for="(department, index) in departments">
                                                                <td class="patient-img">
                                                                    <img src="" alt="">
                                                                </td>
                                                                <td class="left">{{++index}}</td>
                                                                <td>{{department.name}}</td>
                                                                <td>{{department.college_name}}</td>
                                                                <td>
                                                                    <span v-for="professor in professors">
                                                                        <span v-if="professor.id == department.HOD">
                                                                            {{professor.lastname}} {{professor.firstname}}
                                                                        </span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-primary btn-xs" id="modal_launcher" @click="launch(department)">
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
                professors: '',
                enabled: false,
                data:'',
            }
        },

        methods: {
            update(department){
                axios.post('/department/edit', department)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.$notify({type: 'success', text: 'Department update successful', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Updating Department\'s info. unsuccessfully. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating Department\'s info. unsuccessfully. Try again later</span>', speed:400});
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