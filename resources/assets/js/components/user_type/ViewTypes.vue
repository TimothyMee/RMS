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

            <tr v-for="(UserType, index) in UserTypes">

                <td>{{++index}}</td>
                <td>{{UserType.name}}</td>
                <td>{{UserType.description}}</td>
                <td class=""><a data-toggle="modal" :data-target='"#"+UserType.id'>...</a></td>

                <div class="modal fade" :id="UserType.id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">User Types</h4>
                                <label style="margin-left: 20px;">Edit?</label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" v-model="UserType.name" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" v-model="UserType.description" class="form-control" :disabled="!enabled">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" @click="">Close</button>
                                <button type="button" class="btn btn-primary"  @click="update(UserType)" :disabled="!enabled">Save changes</button>
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
                UserTypes: '',
                enabled: false
            }
        },

        methods: {
            fetchRole(){
                axios.get('/UserType/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.UserTypes = _response.data;
                        }
                    })
            },

            update(UserType){
                axios.post('/UserType/edit', UserType)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.fetchRole();
                            this.$notify({type: 'success', text: 'User Type update successful', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Updating User Type. unsuccessfully. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating User Type. unsuccessfully. Try again later</span>', speed:400});
                    })
            }
        },

        mounted(){
            this.fetchRole();
        }
    }
</script>