<template>
    <div>
        <notifications position="top center" />
        <table class="tbl-typical">
            <tr>
                <th><div>#</div></th>
                <th><div>Name</div></th>
                <th><div>College</div></th>
                <th><div>...</div></th>
            </tr>
            <tr v-for="(department, index) in departments">

                <td>{{++index}}</td>
                <td>{{department.name}}</td>
                <td>{{department.college_name}}</td>
                <td class=""><a data-toggle="modal" :data-target='"#"+department.id'>...</a></td>


                <div class="modal fade" :id="department.id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Departments</h4>
                                <label style="margin-left: 20px;">Edit?</label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" v-model="department.name" class="form-control" :disabled=!enabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">College Name </label>
                                        <input type="text" v-model="department.college_name" class="form-control" :disabled=!enabled>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" @click="">Close</button>
                                <button type="button" class="btn btn-primary"  @click="update(department)" :disabled="!enabled">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </tr>

        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                departments: '',
                enabled: false
            }
        },

        methods: {
            update(department){
                axios.post('/department/edit', department)
                    .then(response => {
                        this.fetchDepartments();
                        this.$notify({type: 'success', text: 'Department update successful', speed:400});
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating Department\'s info. unsuccessfully. Try again later</span>', speed:400});
                    })
            },

            fetchDepartments(){
                axios.get('/department/view')
                    .then(response => {
                        if(response.status === 200){
                            this.departments = response.data;
                        }
                    })
            }
        },

        mounted(){
            this.fetchDepartments();
        }
    }
</script>