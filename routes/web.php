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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// branch
Route::get('/branch/destroy/{id}', 'BranchController@destroy')->name('branch/destroy');
Route::get('/branch/create', 'BranchController@create')->name('branch/create');
Route::post('/branch/store', 'BranchController@store')->name('branch/store');
Route::get('/branch/index', 'BranchController@index')->name('branch/index');
// component category
Route::get('/componentCategory/destroy/{id}', 'ComponentCategoryController@destroy')->name('componentCategory/destroy');
Route::get('/componentCategory/create', 'ComponentCategoryController@create')->name('componentCategory/create');
Route::post('/componentCategory/store', 'ComponentCategoryController@store')->name('componentCategory/store');
Route::get('/componentCategory/index', 'ComponentCategoryController@index')->name('componentCategory/index');
// department
Route::get('/department/destroy/{id}', 'DepartmentController@destroy')->name('department/destroy');
Route::get('/department/create', 'DepartmentController@create')->name('department/create');
Route::post('/department/store', 'DepartmentController@store')->name('department/store');
Route::get('/department/index', 'DepartmentController@index')->name('department/index');
// duty
Route::get('/duty/destroy/{id}', 'DutyController@destroy')->name('duty/destroy');
Route::get('/duty/create', 'DutyController@create')->name('duty/create');
Route::post('/duty/store', 'DutyController@store')->name('duty/store');
Route::get('/duty/index', 'DutyController@index')->name('duty/index');
// employee
Route::get('/employee/destroy/{id}', 'EmployeeController@destroy')->name('employee/destroy');
Route::get('/employee/{id}/detail', 'EmployeeController@detail')->name('employee/detail');
Route::get('/employee/create', 'EmployeeController@create')->name('employee/create');
Route::post('/employee/store', 'EmployeeController@store')->name('employee/store');
Route::get('/employee/index', 'EmployeeController@index')->name('employee/index');
// mutation
Route::post('/mutation/store', 'MutationController@store')->name('mutation/store');
// position
Route::get('/position/destroy/{id}', 'PositionController@destroy')->name('position/destroy');
Route::get('/position/create', 'PositionController@create')->name('position/create');
Route::post('/position/store', 'PositionController@store')->name('position/store');
Route::get('/position/index', 'PositionController@index')->name('position/index');
// pr
Route::post('/pr/store', 'PrController@store')->name('pr/store');
Route::get('/pr/index', 'PrController@index')->name('pr/index');
