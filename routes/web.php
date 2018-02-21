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

    Route::group(['prefix' => 'course'], function (){
        Route::post('add', 'CourseController@add');
        Route::post('edit', 'CourseController@edit');
        Route::get('view', 'CourseController@viewCourses');
        Route::post('view', 'CourseController@viewCourse');
        Route::get('index', 'CourseController@index')->name('course.index');
        Route::group(['prefix' => 'registration'], function (){
            Route::post('add', 'CourseRegisteredController@add');
            Route::post('edit', 'CourseRegisteredController@edit');
            Route::get('view', 'CourseRegisteredController@viewRegistrations');
            Route::post('view', 'CourseRegisteredController@viewRegistration');
            Route::post('view-selected', 'CourseRegisteredController@viewSelectedRegistration');
            Route::get('edit', 'CourseRegisteredController@editIndex')->name('course-registration.edit');
            Route::get('new', 'CourseRegisteredController@newRegistration')->name('course-registration.new');
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
    });

    Route::group(['prefix' => 'UserType'], function(){
        Route::post('add', 'UserTypeController@add');
        Route::post('edit', 'UserTypeController@edit');
        Route::get('view', 'UserTypeController@viewRoles');
        Route::post('view', 'UserTypeController@viewRole');
        Route::get('index', 'UserTypeController@index')->name('UserType.index');
    });

    Route::group(['prefix' => 'student'], function(){
        Route::post('add', 'StudentController@add');
        Route::post('edit', 'StudentController@edit');
        Route::post('view', 'StudentController@viewStudent');
        Route::get('view', 'StudentController@viewStudents');
        Route::get('index', 'StudentController@index')->name('student.index');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::post('add', 'UserController@add');
        Route::post('edit', 'UserController@edit');
        Route::get('view', 'UserController@viewUsers');
        Route::post('view', 'UserController@viewUsers');
        Route::get('index', 'UserController@index')->name('user.index');
        Route::get('password', 'UserController@openPasswordPage')->name('user.password');
        Route::post('password', 'UserController@changePassword');
    });

    Route::group(['prefix' => 'department'], function(){
        Route::post('add', 'DepartmentController@add');
        Route::post('edit', 'DepartmentController@edit');
        Route::post('view', 'DepartmentController@viewDepartment');
        Route::get('view', 'DepartmentController@viewDepartments');
        Route::get('index', 'DepartmentController@index')->name('department.index');
    });


    Route::group(['prefix' => 'student'],  function (){
        Route::get('home', 'HomeController@studentHome')->name('student.home');
    });
    /*Route::get('/', function () {
        return view('welcome');
    })->name('home');*/
});

