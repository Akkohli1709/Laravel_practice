<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;


route::resource('user',UserController::class); // Route for User Controller
route::resource('user.address',AddressController::class)->scoped(['addresses' => 'slug']); //Route for Address Controller

