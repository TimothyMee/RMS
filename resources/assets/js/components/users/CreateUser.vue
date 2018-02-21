<template>
    <div>
        <form action="">
            <div class="row">
                <div class="form-group">
                    <label for="">Firstname:</label>
                    <input type="text" class="form-control form-control-xs" v-model="user.firstname">
                </div>
                <div class="form-group">
                    <label class="">Middlename:</label>
                    <input type="text" class="form-control form-control-xs" v-model="user.middlename">
                </div>
                <div class="form-group">
                    <label class="">Lastname:</label>
                    <input type="text" class="form-control form-control-xs" v-model="user.lastname">
                </div>
                <div class="form-group">
                    <label class="">Identification No:</label>
                    <input type="text" class="form-control form-control-xs" v-model="user.identification_no">
                </div>
                <div class="form-group">
                    <label class="">Telephone:</label>
                    <input type="text" class="form-control form-control-xs" v-model="user.tel_no">
                </div>
                <div class="form-group">
                    <label class="">Email:</label>
                    <input type="email" class="form-control form-control-xs" v-model="user.email">
                </div>

                <div class="form-group">
                    <label class="">Department:</label>
                    <select name="" id="" class="form-control form-control-xs" v-model="user.department_id" v-if="departments.length">
                        <option v-for="department in departments" :value=department.id>{{department.name}}</option>
                    </select>
                    <span v-else="" style="color:red">
                        No Existing Department... Please Create a Department First
                    </span>
                </div>

                <div class="form-group" style="margin-left: 30px;">
                    <label class="">User Types:</label>
                    <select name="" id="" class="form-control form-control-xs" v-model="user.user_type" v-if="userTypes.length">
                        <option v-for="userType in userTypes" :value=userType.id v-if="userType.id == 1 || userType.id == 2">{{userType.name}}</option>
                    </select>
                    <span v-else="" style="color:red">
                        No Existing Role... Please Create a User Type First
                    </span>
                </div>

                <div class="form-group">
                    <br>
                    <button class="btn btn-success" style="margin-left:20px; margin-right:20px;" @click.prevent="create">
                        <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                    </button>
                    <button class="btn btn-danger" @click.prevent="user = {}">Clear</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                departments:'',
                userTypes: ''
            }
        },

        mounted(){
            this.fetchDepartments();
            this.fetchRoles();
        },

        methods: {
            fetchDepartments(){
                axios.get('/department/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0)
                        {
                            this.departments = _response.data;
                        }
                        else{

                        }
                    })
            },

            fetchRoles(){
                axios.get('/UserType/view')
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0)
                        {
                            this.userTypes = _response.data;
                        }
                        else{

                        }
                    })
            },

            create(){
                axios.post('/user/add', this.user)
                    .then(response => {
                        var _response = response.data;
                        if(_response.status === 0){
                            this.$notify({type: 'success', text: 'Staff creation successful', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Creating staff unsuccessfully. Check if user exists and try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Creating staff unsuccessfully. Check if user exists and try again later</span>', speed:400});
                    })
            }
        }
    }
</script>