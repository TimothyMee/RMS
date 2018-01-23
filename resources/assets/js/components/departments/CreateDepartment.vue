<template>
    <div style="margin-left:auto; margin-right:auto;">
        <notifications position="top center" />
        <form action="">
            <div class="row">
                <div class="form-group">
                    <label for="">Department's Name:</label>
                    <input type="text" class="form-control form-control-xs" v-model="department.name">
                </div>

                <div class="form-group">
                    <label for="">Department's College:</label>
                    <input type="text" class="form-control form-control-xs" v-model="department.college_name">
                </div>

                <div class="form-group">
                    <br>
                    <button class="btn btn-success" style="margin-left:20px; margin-right:20px;" @click.prevent="create">
                        <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                    </button>
                    <button class="btn btn-danger" @click.prevent="department = {}">Clear</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                department:{}
            }
        },

        mounted(){

        },

        methods: {
            create(){
                axios.post('/department/add', this.department)
                    .then(response => {
                        this.$notify({type: 'success', text: 'Department creation successful', speed:400});
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Creating department. unsuccessfully. Try again later</span>', speed:400});
                    })
            }
        }
    }
</script>