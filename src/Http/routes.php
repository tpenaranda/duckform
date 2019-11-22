<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'FormController@getAllForms');
Route::get('/{formIdentifier}', 'FormController@getForm');
Route::get('/{formIdentifier}/submits', 'FormController@getAllFormSubmits');
Route::get('/{formIdentifier}/submits/{submitToken}', 'FormController@getFormSubmit');
