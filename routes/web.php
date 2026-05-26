<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/member-image/{path}', [MemberController::class, 'image'])
    ->where('path', '.*')->name('member.image');
