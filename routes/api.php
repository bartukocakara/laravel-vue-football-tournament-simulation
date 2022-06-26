<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/teams', 'TeamController@index')->name('teams');
Route::get('/groups', 'GroupController@index')->name('groups');
Route::post('/generate', 'GenerateController@index')->name('generate');
Route::post('/matches', 'MatchController@index')->name('matches.index');

