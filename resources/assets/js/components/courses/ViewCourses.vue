<template>
    <div>
        <notifications position="top center" />
        <table class="table tbl-typical">
            <tr>
                <th class="">#</th>
                <th class="">Name</th>
                <th class="">Course Code</th>
                <th class="">Unit</th>
                <th class="">...</th>
        </tr>

            <tr v-for="(course, index) in courses">

                <td class="">{{++index}}</td>
                <td class="">{{course.name}}</td>
                <td class="">{{course.course_code}}</td>
                <td class="">{{course.unit}}</td>
                <td class=""><a data-toggle="modal" :data-target='"#"+course.id'>...</a></td>


                <div class="modal fade" :id="course.id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Course</h4>
                                <label style="margin-left: 20px;">Edit?</label><switches v-model="enabled" color="blue" style="margin-left:10px;"></switches>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Course name</label>
                                        <input type="text" v-model="course.name" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last name</label>
                                        <input type="text" v-model="course.course_code" class="form-control" :disabled="!enabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Middle name</label>
                                        <input type="text" v-model="course.unit" class="form-control" :disabled="!enabled">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" @click="">Close</button>
                                <button type="button" class="btn btn-primary"  @click="update(course)" :disabled="!enabled">Save changes</button>
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
                courses: '',
                enabled: false
            }
        },

        methods: {
            fetchView(){
                axios.get('/course/view')
                    .then(response => {
                        if(response.status === 200){
                            this.courses = response.data;
                        }
                    })
            },
            update(course){
                axios.post('/course/edit', course)
                    .then(response => {
                        this.fetchView();
                        this.$notify({type: 'success', text: 'Course update successful', speed:400});
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Updating course. unsuccessfully. Try again later</span>', speed:400});
                    })
            }
        },

        mounted(){
            this.fetchView();
        }
    }
</script>