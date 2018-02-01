<template>
    <div style="margin-left:auto; margin-right:auto;">
        <notifications position="top center" />
        <form action="">
            <div class="row col-md-6" style="margin-left: auto; margin-right:auto;">
               <!-- <div class="form-group col-md-12">
                    <label for="">Old Password:</label>
                    <input type="password" class="form-control form-control-xs" v-model="password.old_password">
                </div>-->
                <div class="form-group col-md-12">
                    <label class="">New Password:</label>
                    <input type="password" class="form-control form-control-xs" v-model="password.new_password">
                </div>
                <div class="form-group col-md-12">
                    <label class="">Confirm New Password:</label>
                    <input type="password" class="form-control form-control-xs" v-model="c_new_password">
                    <label v-show="validation">{{validation}}</label>
                </div>
                <div class="form-group">
                    <br>
                    <button class="btn btn-success" style="margin-left:20px; margin-right:20px;" @click.prevent="changePassword">
                        <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                    </button>
                    <button class="btn btn-danger" @click.prevent="password = {}">Clear</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                password:{},
                c_new_password:'',
                validation:''
            }
        },

        mounted(){

        },

        methods: {
            changePassword(){
                if(this.password.new_password == this.c_new_password){
                    axios.post('/user/password', this.password)
                        .then(response => {
                            var _response = response.data;
                            if(_response.status === 0){
                                this.$notify({type: 'success', text: 'Password Changed successfully', speed:400});
                            }
                            else{
                                this.$notify({type: 'error', text: '<span style="color: white">Password Change Unsuccessful. Check old password and try again later</span>', speed:400});
                            }
                        })
                        .catch(error =>{
                            this.$notify({type: 'error', text: '<span style="color: white">Password Change Unsuccessful. Check old password and try again later</span>', speed:400});
                        })
                }
                else {
                    this.$notify({type: 'error', text: '<span style="color: white">Passwords don\'t match</span>'});
                }
            }
        },

        watch: {
            c_new_password (){
                if(this.password.new_password){
                    if(this.password.new_password == this.c_new_password){
                        this.$notify({type: 'success', text: 'Passwords match', speed:400});
                    }else{
                        this.$notify({type: 'error', text: '<span style="color: white">Passwords don\'t match</span>'});
                    }
                }
            }
        }
    }
</script>