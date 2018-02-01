<template>
    <div>
        <notifications position="top center" />
        <table class="table tbl-typical">
            <div class="col-md-12">
                <th class="col-md-1">#</th>
                <th class="col-md-4">Name</th>
                <th class="col-md-3">Identification No</th>
                <th class="col-md-3">Telephone</th>
                <th class="col-md-1">...</th>
            </div>

            <div v-for="(user, index) in users">
                <div class="col-md-12">
                    <td class="col-md-1">{{++index}}</td>
                    <td class="col-md-4">{{user.firstname}} {{user.lastname}}</td>
                    <td class="col-md-3">{{user.identification_no}}</td>
                    <td class="col-md-3" v-if="user.tel_no">{{user.tel_no}}</td>
                    <td class="col-md-3" v-else>080########</td>
                    <td class="col-md-1"><a data-toggle="modal" :data-target='"#"+user.firstname'>...</a></td>
                </div>

                <div class="modal fade" :id="user.firstname" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{user.firstname}} Profile</h4>
                                <label style="margin-left: 20px;">Edit?</label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">First name</label>
                                        <input type="text" v-model="user.firstname" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last name</label>
                                        <input type="text" v-model="user.lastname" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Middle name</label>
                                        <input type="text" v-model="user.middlename" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telephone</label>
                                        <input type="text" v-model="user.tel_no" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" v-model="user.email" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Identification No</label>
                                        <input type="text" v-model="user.identification_no" class="form-control" :disabled="!enabled">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" @click="">Close</button>
                                <button type="button" class="btn btn-primary"  @click="update(user)" :disabled="!enabled">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: '',
                enabled: false
            }
        },

        methods: {
            fetchUsers(){
                axios.get('/user/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.users = _response.data;
                        }
                    })
            },

            update(user){
                axios.post('/user/edit', user)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.fetchUsers();
                            this.$notify({type: 'success', text: 'Staff update successful', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Updating Staff\'s info. unsuccessfully. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating Staff\'s info. unsuccessfully. Try again later</span>', speed:400});
                    })
            }

        },

        mounted(){
            this.fetchUsers();
        }
    }
</script>