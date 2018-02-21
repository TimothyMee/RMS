<template>
    <div style="margin-left:auto; margin-right:auto;">
        <notifications position="top center" />
        <form action="">
            <div class="row">
                <div class="form-group">
                    <label for="">User Type:</label>
                    <input type="text" class="form-control form-control-xs" v-model="user_type.name">
                </div>
                <div class="form-group">
                    <label class="">Description:</label>
                    <textarea name="" id="" class="form-control form-control-xs" cols="30" rows="10" v-model="user_type.description"></textarea>
                </div>
                <div class="form-group">
                    <br>
                    <button class="btn btn-success" style="margin-left:20px; margin-right:20px;" @click.prevent="create">
                        <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                    </button>
                    <button class="btn btn-danger" @click.prevent="user_type = {}">Clear</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user_type:{}
            }
        },

        mounted(){

        },

        methods: {
            create(){
                axios.post('/UserType/add', this.user_type)
                    .then(response => {
                        var _response = response.data;
                        if (_response.status === 0){
                            this.$notify({type: 'success', text: 'Creation of role.. successfully', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Unsuccessful role creation. Try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Unsuccessful role creation. Try again later</span>', speed:400});
                    })
            }
        }
    }
</script>