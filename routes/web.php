<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home');});
Route::get('hajj-packages', function () { return view('hajj-packages.index');})->name('hajj-packages');
Route::get('umrah-packages', function () { return view('umrah.index');})->name('umrah-packages');
Route::get('december-umrah-packages', function () { return view('december-umrah.index');})->name('december-umrah-packages');
Route::get('ramadan-umrah-packages', function () { return view('ramadan-umrah.index');})->name('ramadan-umrah-packages');
Route::get('about', function () { return view('about-us.index');})->name('about');
Route::get('contact', function () { return view('contact.index');})->name('contact');
