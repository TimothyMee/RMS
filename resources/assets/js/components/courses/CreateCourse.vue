<template>
    <div style="margin-left:auto; margin-right:auto;">
        <form action="">
            <div class="row">
                <div class="form-group">
                    <label for="">Course Name:</label>
                    <input type="text" class="form-control form-control-xs" v-model="course.name">
                </div>
                <div class="form-group">
                    <label for="">Course Code:</label>
                    <input type="text" class="form-control form-control-xs" v-model="course.course_code">
                </div>
                <div class="form-group">
                    <label class="">Unit:</label>
                    <input type="integer" class="form-control form-control-xs" v-model="course.unit">
                </div>
                <div class="form-group">
                    <br>
                    <button class="btn btn-success" style="margin-left:20px; margin-right:20px;" @click.prevent="create">
                        <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                    </button>
                    <button class="btn btn-danger" @click.prevent="course = {}">Clear</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                course:{}
            }
        },

        mounted(){

        },

        methods: {
            create(){
                axios.post('/course/add', this.course)
                    .then(response => {
                        var _response = response.data;
                        if(_response.status == 0){
                            this.$notify({type: 'success', text: 'Course added successfully', speed:400});
                        }
                        else{
                            this.$notify({type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed:400});
                        }
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Process unsuccessfully.Check if course exists and try again later</span>', speed:400});
                    })
            }
        }
    }
</script>