
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Switches from 'vue-switches'
import Notifications from 'vue-notification'

Vue.use(Notifications);
Vue.component('switches', Switches);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**/

Vue.component('view-users', require('./components/users/ViewUsers.vue'));
Vue.component('add-user', require('./components/users/CreateUser.vue'));
Vue.component('change-password', require('./components/users/ChangePassword.vue'));

Vue.component('view-students', require('./components/students/ViewStudents.vue'));
Vue.component('add-students', require('./components/students/CreateStudents.vue'));

Vue.component('view-departments', require('./components/departments/ViewDepartments.vue'));
Vue.component('add-department', require('./components/departments/CreateDepartment.vue'));

Vue.component('view-roles', require('./components/roles/ViewRoles.vue'));
Vue.component('add-role', require('./components/roles/CreateRole.vue'));

Vue.component('view-courses', require('./components/courses/ViewCourses.vue'));
Vue.component('add-course', require('./components/courses/CreateCourse.vue'));

Vue.component('view-registration', require('./components/course-registration/ViewRegistration.vue'));
Vue.component('new-registration', require('./components/course-registration/NewRegistration.vue'));

Vue.component('create-result', require('./components/results/createResult.vue'));
Vue.component('view-result', require('./components/results/ViewResult.vue'));
Vue.component('edit-result', require('./components/results/EditResult.vue'));




const app = new Vue({
    el: '#app'
});
