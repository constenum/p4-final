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
Route::get('/students', 'StudentController@index')->name('students.index')->middleware('auth');

# Show form to create a new student
Route::get('/students/create', 'StudentController@create')->name('students.create')->middleware('auth');

# Process the form to create a new student
Route::post('/students', 'StudentController@store')->name('students.store')->middleware('auth');

# Show an individual student
Route::get('/students/{id}', 'StudentController@show')->name('students.show')->middleware('auth');

# Show form to edit a student
Route::get('/students/{id}/edit', 'StudentController@edit')->name('students.edit')->middleware('auth');

# Process form to edit a student
Route::put('/students/{id}', 'StudentController@update')->name('students.update')->middleware('auth');

# Get route to confirm deletion of student
Route::get('/students/{id}/delete', 'StudentController@delete')->name('students.destroy')->middleware('auth');

# Delete route to actually destroy the student
Route::delete('/students/{id}', 'StudentController@destroy')->name('students.destroy')->middleware('auth');

/**
* Tutor resource
*/
# Index page to show all tutors
Route::get('/tutors', 'TutorController@index')->name('tutors.index')->middleware('auth');

# Show form to create a new tutor
Route::get('/tutors/create', 'TutorController@create')->name('tutors.create')->middleware('auth');

# Process the form to create a new tutor
Route::post('/tutors', 'TutorController@store')->name('tutors.store')->middleware('auth');

# Show an individual tutor
Route::get('/tutors/{id}', 'TutorController@show')->name('tutors.show')->middleware('auth');

# Show form to edit a tutor
Route::get('/tutors/{id}/edit', 'TutorController@edit')->name('tutors.edit')->middleware('auth');

# Process form to edit a tutor
Route::put('/tutors/{id}', 'TutorController@update')->name('tutors.update')->middleware('auth');

# Get route to confirm deletion of tutor
Route::get('/tutors/{id}/delete', 'TutorController@delete')->name('tutors.destroy')->middleware('auth');

# Delete route to actually destroy the tutor
Route::delete('/tutors/{id}', 'TutorController@destroy')->name('tutors.destroy')->middleware('auth');

/**
* Subject resource
*/
# Index page to show all subjects
Route::get('/subjects', 'SubjectController@index')->name('subjects.index')->middleware('auth');

# Show form to create a new subject
Route::get('/subjects/create', 'SubjectController@create')->name('subjects.create')->middleware('auth');

# Process the form to create a new subject
Route::post('/subjects', 'SubjectController@store')->name('subjects.store')->middleware('auth');

# Show an individual subject
Route::get('/subjects/{id}', 'SubjectController@show')->name('subjects.show')->middleware('auth');

# Show form to edit a subject
Route::get('/subjects/{id}/edit', 'SubjectController@edit')->name('subjects.edit')->middleware('auth');

# Process form to edit a subject
Route::put('/subjects/{id}', 'SubjectController@update')->name('subjects.update')->middleware('auth');

# Get route to confirm deletion of subject
Route::get('/subjects/{id}/delete', 'SubjectController@delete')->name('subjects.destroy')->middleware('auth');

# Delete route to actually destroy the subject
Route::delete('/subjects/{id}', 'SubjectController@destroy')->name('subjects.destroy')->middleware('auth');

/**
* Session resource
*/
# Index page to show all sessions
Route::get('/sessions', 'SessionController@index')->name('sessions.index')->middleware('auth');

# Show form to create a new session manually
Route::get('/sessions/create', 'SessionController@create')->name('sessions.create')->middleware('auth');

# Process the form to create a new session manually
Route::post('/sessions', 'SessionController@store')->name('sessions.store')->middleware('auth');

# Show an individual session
Route::get('/sessions/{id}', 'SessionController@show')->name('sessions.show')->middleware('auth');

# Show form to edit a session
Route::get('/sessions/{id}/edit', 'SessionController@edit')->name('sessions.edit')->middleware('auth');

# Process form to edit a session
Route::put('/sessions/{id}', 'SessionController@update')->name('sessions.update')->middleware('auth');

# Get route to confirm deletion of session
Route::get('/sessions/{id}/delete', 'SessionController@delete')->name('sessions.destroy')->middleware('auth');

# Delete route to actually destroy the session
Route::delete('/sessions/{id}', 'SessionController@destroy')->name('sessions.destroy')->middleware('auth');

/**
* Log viewer
*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth');

/**
* Authorizaiton resource
*/
Auth::routes();

/**
* Home resource
*/
# Index page to show open sessions for logged in user
Route::get('/home', 'HomeController@index')->name('index');
Route::get('/', 'HomeController@index')->middleware('auth');

# Show form to create a new session
Route::get('/home/create', 'HomeController@create')->name('create')->middleware('auth');

# Process the form to create a new session
Route::post('/home', 'HomeController@store')->name('store')->middleware('auth');

# Process session end directly without form
Route::get('/home/{id}', 'HomeController@update')->name('update')->middleware('auth');
