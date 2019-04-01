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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::get('/Home', 'Admin\HomeController@admin')->middleware('admin');

Route::get('/Employees', 'Employee\EmployeesController@show');

Route::post('/Employees', 'Employee\EmployeesController@show')->name('employees');

Route::get('/Skills', 'Skill\SkillController@show');

Route::post('/Skills', 'Skill\SkillController@show')->name('skills');

Route::get('/Profile/{id}', 'Admin\ProfileController@show')->name('profile');

Route::post('/Profile/{id}',['as' => 'profile', 'uses' => 'Admin\ProfileController@show']);

Route::get('/AddEmployee', 'Employee\EmployeesController@addemployee');

Route::post('/employee/submit', 'Employee\EmployeesController@insertEmployee');

Route::get('autocomplete', 'Employee\EmployeesController@autocomplete')->name('autocomplete');

Route::get('/ViewEmployee/{id}', 'Employee\EmployeesController@fulldetail')->name('ViewEmployee');

Route::post('/employeeupdate/{id}', 'Employee\EmployeesController@updateemployee')->name('employeeupdate');

Route::get('/skill/submit/{id}/{skills}/{rate}/{skillname}', 'Skill\SkillController@insertnewskills')->name('skill/submit');

Route::get('/DeleteEmployee/{id}', 'Employee\EmployeesController@deleteemployee')->name('DeleteEmployee');

Route::get('/UpdateSkillRate/{id}/{rate}', 'Skill\SkillController@updateskillrate');

Route::get('DeleteSkill/{id}', 'Skill\SkillController@deleteskills');

Route::post('/Search', 'Skill\SkillController@showEmployeeSkill')->name('Search');

Route::get('/changepassword', 'Admin\ProfileController@Changepassword');

Route::post('updatepassword', ['as' => 'updatepassword', 'uses' => 'Admin\ProfileController@updatepassword']);

Route::post('/adminupdate/{id}', 'Admin\ProfileController@updateadmin')->name('adminupdate');

Route::get('/logout', 'Admin\LogoutController@logout');

// Employee
Route::post('/login', 'Auth\LoginController@employeeLogin')->name('login');

Route::get('/employeeresetpassword','UserEmployee\ResetController@showEmailForm')->name('employeeresetpassword');

Route::post('/employeepasswordtoken','UserEmployee\ResetController@sendPasswordResetToken');

Route::get('/reset/{url}','UserEmployee\ResetController@showPasswordResetForm');

Route::post('/resetpassword','UserEmployee\ResetController@resetRequest');

Route::get('employee/Home', 'UserEmployee\HomeController@employee')->middleware('employee');

Route::get('employee/changepassword', 'UserEmployee\ProfileController@Changepassword');

Route::post('employeeupdatepassword', ['as' => 'employeeupdatepassword', 'uses' => 'UserEmployee\ProfileController@updatepassword']);

Route::get('employee/logout', 'UserEmployee\LogoutController@logout');

Route::post('/skill/{id}', 'UserEmployee\SkillController@show')->name('employee/manageskill');

Route::get('/skill/{id}', 'UserEmployee\SkillController@show')->name('employee/manageskill');

Route::get('/UpdateRate/{id}/{rate}', 'UserEmployee\SkillController@updateskillrate');

Route::get('/Rate','UserEmployee\SkillController@errorrate');

Route::get('DeleteEmpSkill/{id}', 'UserEmployee\SkillController@deleteskills');

Route::get('empAutocomplete', 'UserEmployee\SkillController@autocomplete')->name('empAutocomplete');

Route::get('newskill/submit/{id}/{skills}/{rate}/{skillname}', 'UserEmployee\SkillController@insertnewskills')->name('newskill/submit');

Route::post('/profile/{id}', 'UserEmployee\ProfileController@show')->name('employee/profile');

Route::get('/profile/{id}', 'UserEmployee\ProfileController@show')->name('employee/profile');

Route::post('/employeeprofileupdate/{id}', 'UserEmployee\ProfileController@updateemployee')->name('employeeprofileupdate');




