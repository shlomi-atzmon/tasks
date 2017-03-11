<?php

Route::resource('tasks', 'TaskController');

Route::get('/', function() {
  return View::make('master');
});
