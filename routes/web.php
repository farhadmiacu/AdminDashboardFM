<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.layouts.dashboard.index');
});
