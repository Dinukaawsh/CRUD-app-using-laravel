<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('contacts',[App\Http\Controllers\ContactController::class,'contact']);

Route::post('save_contacts',[App\Http\Controllers\ContactController::class,'savecontact']);

Route::delete('delete_contacts/{id}',[App\Http\Controllers\ContactController::class,'deletecontact']);

Route::get('get_contacts/{id}', [App\Http\Controllers\ContactController::class, 'getcontacts']);

Route::put('update_contacts/{id}', [App\Http\Controllers\ContactController::class, 'updatecontact']);
