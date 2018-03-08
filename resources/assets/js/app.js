
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Switches from 'vue-switches'
import Notifications from 'vue-notification'
import VModal from 'vue-js-modal'
import Print from 'vue-print-nb'



Vue.use(VModal);
Vue.use(Notifications);
Vue.component('switches', Switches);
Vue.use(Print);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('view-users', require('./components/users/ViewUsers.vue'));
Vue.component('add-user', require('./components/users/CreateUser.vue'));
Vue.component('change-password', require('./components/users/ChangePassword.vue'));

Vue.component('view-students', require('./components/students/ViewStudents.vue'));
Vue.component('add-student', require('./components/students/CreateStudents.vue'));
Vue.component('edit-students', require('./components/students/EditStudents.vue'));


Vue.component('view-departments', require('./components/departments/ViewDepartments.vue'));
Vue.component('add-department', require('./components/departments/CreateDepartment.vue'));
Vue.component('edit-departments', require('./components/departments/EditDepartment.vue'));

Vue.component('view-types', require('./components/user_type/ViewTypes.vue'));
Vue.component('add-type', require('./components/user_type/CreateType.vue'));

Vue.component('view-courses', require('./components/courses/ViewCourses.vue'));
Vue.component('add-course', require('./components/courses/CreateCourse.vue'));
Vue.component('edit-courses', require('./components/courses/EditCourses.vue'));


Vue.component('new-registration', require('./components/course-registration/NewRegistration.vue'));
Vue.component('view-registration', require('./components/course-registration/ViewRegistration.vue'));

Vue.component('create-result', require('./components/results/createResult.vue'));
Vue.component('view-result', require('./components/results/ViewResult.vue'));
Vue.component('edit-result', require('./components/results/EditResult.vue'));
Vue.component('student-view-result', require('./components/results/ViewResultForStudent.vue'));

Vue.component('view-professors', require('./components/professors/ViewProfessors.vue'));
Vue.component('add-professor', require('./components/professors/CreateProfessor.vue'));
Vue.component('edit-professors', require('./components/professors/EditProfessor.vue'));

Vue.component('view-admin', require('./components/admins/ViewAdmin.vue'));
Vue.component('add-admin', require('./components/admins/CreateAdmin.vue'));
Vue.component('edit-admins', require('./components/admins/EditAdmin.vue'));




const app = new Vue({
    el: '#app'
});
