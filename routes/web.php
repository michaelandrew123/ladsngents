<?php

use Illuminate\Support\Facades\Route;

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

Route::get('add-post/', 'PostController@addPost');
Route::get('add-comment/{id}', 'PostController@addComment');
Route::get('get-comments/{id}', 'PostController@getCommentsByPost');
Route::get('add-roles/', 'RoleController@addRole');
Route::get('add-users/', 'RoleController@AddUser');
Route::get('roles-by-user/{id}', 'RoleController@getAllRolesByUser');
Route::get('users-by-role/{id}', 'RoleController@getAllUserByRole');