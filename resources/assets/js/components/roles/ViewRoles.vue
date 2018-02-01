<template>
    <div>
        <notifications position="top center" />
        <table class="tbl-typical">
            <tr>
                <th><div>#</div></th>
                <th><div>Name</div></th>
                <th><div>Description</div></th>
                <th><div>...</div></th>
            </tr>

            <tr v-for="(role, index) in roles">

                <td>{{++index}}</td>
                <td>{{role.name}}</td>
                <td>{{role.description}}</td>
                <td class=""><a data-toggle="modal" :data-target='"#"+role.id'>...</a></td>

                <div class="modal fade" :id="role.id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Roles</h4>
                                <label style="margin-left: 20px;">Edit?</label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" v-model="role.name" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" v-model="role.description" class="form-control" :disabled="!enabled">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" @click="">Close</button>
                                <button type="button" class="btn btn-primary"  @click="update(role)" :disabled="!enabled">Save changes</button>
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
                roles: '',
                enabled: false
            }
        },

        methods: {
            fetchRole(){
                axios.get('/role/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.roles = _response.data;
                        }
                    })
            },

            update(role){
                axios.post('/role/edit', role)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.fetchRole();
                            this.$notify({type: 'success', text: 'Role update successful', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Updating Role. unsuccessfully. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating Role. unsuccessfully. Try again later</span>', speed:400});
                    })
            }
        },

        mounted(){
            this.fetchRole();
        }
    }
</script>