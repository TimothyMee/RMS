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
                                <label class="control-label col-md-3"> Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="department.name" data-required="1" placeholder="enter department name" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">College Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" v-model="department.college_name" data-required="1" placeholder="enter college name" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Head Of Department
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select name="" id="" v-model="department.HOD" class="form-control">
                                        <option :value="professor.id" v-for="professor in professors">
                                            {{professor.lastname}} {{professor.firstname}}
                                        </option>
                                    </select>
                                </div>
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
                professors:'',
                department:{},
            }
        },

        mounted(){

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

            create(){
                axios.post('/department/add', this.department)
                    .then(response => {
                        var _response = response.data;
                        if(_response.status == 0){
                            this.$notify({type: 'success', text: 'Department added successfully', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed:400});
                    })
            },
        },

        mounted(){
            this.fetchProfessors();
        }
    }
</script>