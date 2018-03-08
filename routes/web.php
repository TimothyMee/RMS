<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');*/

use Illuminate\Http\Request;

Route::get('/', function (){
   return redirect()->route('login');
});

Route::get('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('login', 'AuthController@postLogin')->name('auth.login');
Route::get('register', 'AuthController@registerStudent')->name('student.register');
Route::post('register', 'AuthController@postStudentRegistration')->name('register');


Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('test', 'HomeController@test');
    Route::get('auth', 'HomeController@auth');
    Route::get('pdf', 'HomeController@pdf');
    Route::post('saveThemeSetting', 'UserSettingController@add')->name('save_theme');

    Route::group(['prefix' => 'course'], function (){
        Route::get('add', 'CourseController@add')->name('course.add');
        Route::post('add', 'CourseController@postAdd')->name('course.postAdd');
        Route::get('edit', 'CourseController@edit')->name('course.edit');
        Route::post('edit', 'CourseController@postEdit');
        Route::get('view', 'CourseController@viewCourses');
        Route::post('view', 'CourseController@viewCourse');
        Route::get('index', 'CourseController@index')->name('course.index');
        Route::group(['prefix' => 'registration'],function(){
            Route::get('view', 'CourseRegisteredController@viewRegistrations');
            Route::post('view', 'CourseRegisteredController@viewRegistration');
            Route::post('view-selected', 'CourseRegisteredController@viewSelectedRegistration');
        });
    });

    Route::group(['prefix' => 'result'], function (){
        Route::post('add', 'ResultController@add');
        Route::post('edit', 'ResultController@edit');
        Route::post('delete', 'ResultController@delete');
        Route::post('view', 'ResultController@viewResult');
        Route::get('view', 'ResultController@viewResults');
        Route::get('index', 'ResultController@index')->name('result.index');
        Route::get('edit', 'ResultController@editIndex')->name('result.edit');
        Route::get('openView', 'ResultController@openView')->name('result.view');
        Route::post('view-selected', 'ResultController@viewSelectedResult');
        Route::group(['prefix' => 'Settings'], function(){
            Route::get('view', 'ResultController@viewResultSetting');
            Route::post('edit', 'ResultController@editResultSetting');
        });
        Route::group(['prefix' => 'status'], function (){
           Route::post('update', 'ResultController@updateStatus');
        });

        Route::group(['prefix' => 'pdf'], function (){
           /*Route::get('index', function (){
               return '<form method="post" action="/result/pdf/make">'.csrf_field().'<input type="Submit"></form>';
           });*/
           Route::get('make', 'PdfController@make');
        });
    });

    Route::group(['prefix' => 'UserType'], function(){
        Route::post('add', 'UserTypeController@add');
        Route::post('edit', 'UserTypeController@edit');
        Route::get('view', 'UserTypeController@viewTypes');
        Route::post('view', 'UserTypeController@viewType');
        Route::get('index', 'UserTypeController@index')->name('UserType.index');
    });

    Route::group(['prefix' => 'student'], function(){
        Route::get('add', 'StudentController@add')->name('student.add');
        Route::post('add', 'StudentController@postAdd');
        Route::get('edit', 'StudentController@edit')->name('student.edit');
        Route::post('edit', 'StudentController@postEdit');
        Route::post('view', 'StudentController@viewStudent');
        Route::get('view', 'StudentController@viewStudents');
        Route::get('index', 'StudentController@index')->name('student.index');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::post('add', 'UserController@add');
        Route::post('edit', 'UserController@edit');
        Route::get('view', 'UserController@viewUsers');
        Route::post('view', 'UserController@viewUser');
        Route::post('viewSpecificType', 'UserController@viewSpecificUserType');
        Route::get('index', 'UserController@index')->name('user.index');
        Route::get('password', 'UserController@openPasswordPage')->name('user.password');
        Route::post('password', 'UserController@changePassword');
    });

    Route::group(['prefix' => 'professor'], function(){
        Route::post('add', 'ProfessorController@postAdd')->name('create.professor');
        Route::get('add', 'ProfessorController@add')->name('professor.add');
        Route::get('edit', 'ProfessorController@edit')->name('professor.edit');
        Route::post('edit', 'ProfessorController@postEdit');
        Route::get('index', 'ProfessorController@index')->name('professor.index');
    });

    Route::group(['prefix' => 'admin'], function(){
        Route::post('add', 'AdminController@postAdd');
        Route::get('add', 'AdminController@add')->name('admin.add');
        Route::get('edit', 'AdminController@edit')->name('admin.edit');
        Route::post('edit', 'AdminController@postEdit');
        Route::get('index', 'AdminController@index')->name('admin.index');
    });

    Route::group(['prefix' => 'department'], function(){
        Route::get('add', 'DepartmentController@add')->name('department.add');
        Route::post('add', 'DepartmentController@postAdd');
//        Route::get('edit', 'DepartmentController@edit')->name('department.edit');
        Route::post('edit', 'DepartmentController@postEdit');
//        Route::post('view', 'DepartmentController@viewDepartment');
        Route::get('view', 'DepartmentController@viewDepartments');
        Route::get('index', 'DepartmentController@index')->name('department.index');
    });

    Route::group(['prefix' => 'student'],  function (){
        Route::get('home', 'HomeController@studentHome')->name('student.home');
        Route::get('loggedIn', 'HomeController@collectAuthUser');
        Route::group(['prefix' => 'registration'], function (){
            Route::post('add', 'CourseRegisteredController@add');
            Route::post('edit', 'CourseRegisteredController@edit');
            Route::get('view', 'CourseRegisteredController@viewRegistrations');
            Route::post('view', 'CourseRegisteredController@viewRegistration');
            Route::post('view-selected', 'CourseRegisteredController@viewSelectedRegistrationForStudents');
            Route::get('edit', 'CourseRegisteredController@editIndex')->name('course-registration.edit');
            Route::get('new', 'CourseRegisteredController@newRegistration')->name('course-registration.new');
        });
        Route::get('view-selected-result', 'ResultController@viewForStudent')->name('student-view-result');
        Route::get('profile', 'StudentController@viewStudentProfile')->name('student-profile');


    });
    /*Route::get('/', function () {
        return view('welcome');
    })->name('home');*/
});

