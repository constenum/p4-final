<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**
* Student resource
*/
# Index page to show all students
Route::get('/students', 'StudentController@index')->name('students.index');

# Show form to create a new students
Route::get('/students/create', 'StudentController@create')->name('students.create');

# Process the form to create a new students
Route::post('/students', 'StudentController@store')->name('students.store');

# Show an individual students
Route::get('/students/{title}', 'StudentController@show')->name('students.show');

# Show form to edit a students
Route::get('/students/{id}/edit', 'StudentController@edit')->name('students.edit');

# Process form to edit a students
Route::put('/students/{id}', 'StudentController@update')->name('students.update');

# Get route to confirm deletion of students
Route::get('/students/{id}/delete', 'StudentController@delete')->name('students.destroy');

# Delete route to actually destroy the students
Route::delete('/students/{id}', 'StudentController@destroy')->name('students.destroy');
