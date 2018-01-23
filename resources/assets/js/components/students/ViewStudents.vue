<template>
    <div>
        <notifications position="top center" />
        <table class="tbl-typical">
            <tr>
                <th><div>#</div></th>
                <th><div>Name</div></th>
                <th><div>Identification No.</div></th>
                <th><div>Telephone</div></th>
                <th><div>...</div></th>
            </tr>

            <tr v-for="(student, index) in students">
                <td>{{++index}}</td>
                <td>{{student.firstname}} {{student.lastname}}</td>
                <td>{{student.identification_no}}</td>
                <td>{{student.tel_no}}</td>
                <td><a data-toggle="modal" :data-target='"#"+student.firstname'>...</a></td>

                <div class="modal fade" :id="student.firstname" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{student.firstname}} Profile</h4>
                                <label style="margin-left: 20px;">Edit?</label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">First name</label>
                                        <input type="text" v-model="student.firstname" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last name</label>
                                        <input type="text" v-model="student.lastname" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Middle name</label>
                                        <input type="text" v-model="student.middlename" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telephone</label>
                                        <input type="text" v-model="student.tel_no" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" v-model="student.email" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Identification No</label>
                                        <input type="text" v-model="student.identification_no" class="form-control" :disabled="!enabled">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" @click="">Close</button>
                                <button type="button" class="btn btn-primary"  @click="update(student)" :disabled="!enabled">Save changes</button>
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
                students: '',
                enabled: false
            }
        },

        methods: {
            fetchStudents(){
                axios.get('/student/view')
                    .then(response => {
                        if(response.status === 200){
                            this.students = response.data;
                        }
                    })
            },

            update(student){
                axios.post('/student/edit', student)
                    .then(response => {
                        this.fetchStudents();
                        this.$notify({type: 'success', text: 'Student update successful', speed:400});
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating Student\'s info. unsuccessfully. Try again later</span>', speed:400});
                    })
            }

        },

        mounted(){
            this.fetchStudents();
        }
    }
</script>