<template>
    <div>
        <form action="">
            <div class="row">
                <div class="form-group">
                    <label for="">Firstname:</label>
                    <input type="text" class="form-control form-control-xs" v-model="student.firstname">
                </div>
                <div class="form-group">
                    <label class="">Middlename:</label>
                    <input type="text" class="form-control form-control-xs" v-model="student.middlename">
                </div>
                <div class="form-group">
                    <label class="">Lastname:</label>
                    <input type="text" class="form-control form-control-xs" v-model="student.lastname">
                </div>
                <div class="form-group">
                    <label class="">Identification No:</label>
                    <input type="text" class="form-control form-control-xs" v-model="student.identification_no">
                </div>
                <div class="form-group">
                    <label class="">Telephone:</label>
                    <input type="text" class="form-control form-control-xs" v-model="student.tel_no">
                </div>
                <div class="form-group">
                    <label class="">Email:</label>
                    <input type="email" class="form-control form-control-xs" v-model="student.email">
                </div>
                <div class="form-group col-md-10">
                    <label class="">Department:</label>
                    <select name="" id="" class="form-control form-control-xs" v-model="student.department_id" v-if="departments.length">
                        <option v-for="department in departments" :value=department.id>{{department.name}}</option>
                    </select>
                    <span v-else="" style="color:red">
                        No Existing Department... Please Create a Department First
                    </span>
                </div>
                <div class="form-group">
                    <br>
                    <button class="btn btn-success" style="margin-left:20px; margin-right:20px;" @click.prevent="create">
                        <!--<img src="/assets/loaders/Spinner.svg" alt="loading" v-if="loading">--> Save
                    </button>
                    <button class="btn btn-danger" @click.prevent="student = {}">Clear</button>
                </div>
            </div>
        </form>
       <!-- <form action="">
            <div class="row">
                <div class="form-group">
                    <label class="">Name:</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </form>-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                student: {},
                departments:''
            }
        },

        mounted(){
            this.fetchDepartments();
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

            create(){
                axios.post('/student/add', this.student)
                    .then(response => {
                        this.$notify({type: 'success', text: 'Student creation successful', speed:400});
                    })
                    .catch(error =>{
                        this.$notify({type: 'error', text: '<span style="color: white">Creating student unsuccessfully. Check if user exists and try again later</span>', speed:400});
                    })
            }
        }
    }
</script>