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

/**
* Tutor resource
*/
# Index page to show all tutors
Route::get('/tutors', 'TutorController@index')->name('tutors.index');

# Show form to create a new tutors
Route::get('/tutors/create', 'TutorController@create')->name('tutors.create');

# Process the form to create a new tutors
Route::post('/tutors', 'TutorController@store')->name('tutors.store');

# Show an individual tutors
Route::get('/tutors/{title}', 'TutorController@show')->name('tutors.show');

# Show form to edit a tutors
Route::get('/tutors/{id}/edit', 'TutorController@edit')->name('tutors.edit');

# Process form to edit a tutors
Route::put('/tutors/{id}', 'TutorController@update')->name('tutors.update');

# Get route to confirm deletion of tutors
Route::get('/tutors/{id}/delete', 'TutorController@delete')->name('tutors.destroy');

# Delete route to actually destroy the tutors
Route::delete('/tutors/{id}', 'TutorController@destroy')->name('tutors.destroy');

/**
* Subject resource
*/
# Index page to show all subjects
Route::get('/subjects', 'SubjectController@index')->name('subjects.index');

# Show form to create a new subjects
Route::get('/subjects/create', 'SubjectController@create')->name('subjects.create');

# Process the form to create a new subjects
Route::post('/subjects', 'SubjectController@store')->name('subjects.store');

# Show an individual subjects
Route::get('/subjects/{title}', 'SubjectController@show')->name('subjects.show');

# Show form to edit a subjects
Route::get('/subjects/{id}/edit', 'SubjectController@edit')->name('subjects.edit');

# Process form to edit a subjects
Route::put('/subjects/{id}', 'SubjectController@update')->name('subjects.update');

# Get route to confirm deletion of subjects
Route::get('/subjects/{id}/delete', 'SubjectController@delete')->name('subjects.destroy');

# Delete route to actually destroy the subjects
Route::delete('/subjects/{id}', 'SubjectController@destroy')->name('subjects.destroy');

/**
* Session resource
*/
# Index page to show all sessions
Route::get('/sessions', 'SessionController@index')->name('sessions.index');

# Show form to create a new sessions
Route::get('/sessions/create', 'SessionController@create')->name('sessions.create');

# Process the form to create a new sessions
Route::post('/sessions', 'SessionController@store')->name('sessions.store');

# Show an individual sessions
Route::get('/sessions/{title}', 'SessionController@show')->name('sessions.show');

# Show form to edit a sessions
Route::get('/sessions/{id}/edit', 'SessionController@edit')->name('sessions.edit');

# Process form to edit a sessions
Route::put('/sessions/{id}', 'SessionController@update')->name('sessions.update');

# Get route to confirm deletion of sessions
Route::get('/sessions/{id}/delete', 'SessionController@delete')->name('sessions.destroy');

# Delete route to actually destroy the sessions
Route::delete('/sessions/{id}', 'SessionController@destroy')->name('sessions.destroy');

/**
* Log viewer
*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

/**
* Authorizaiton resource
*/
Auth::routes();

/**
* Homepage
*/
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index')->middleware('auth');
