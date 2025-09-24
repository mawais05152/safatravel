<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () { return view('home');})->name('home');
Route::get('hajj-packages', function () { return view('hajj-packages.index');})->name('hajj-packages');
Route::get('umrah-packages', function () { return view('umrah.index');})->name('umrah-packages');
Route::get('december-umrah-packages', function () { return view('december-umrah.index');})->name('december-umrah-packages');
Route::get('ramadan-umrah-packages', function () { return view('ramadan-umrah.index');})->name('ramadan-umrah-packages');
Route::get('easter-umrah-packages', function () { return view('easter-umrah.index');})->name('easter-umrah-packages');
Route::get('umrah-packages-2026', function () { return view('umrah-packages-2026.index');})->name('umrah-packages-2026');
Route::get('about.html', function () { return view('about-us.index');})->name('about');
Route::get('contact', function () { return view('contact.index');})->name('contact');
Route::get('beat-my-quote', function () { return view('beat-my-quote.index');})->name('beat-my-quote');
Route::get('enquire-now', function () { return view('hajj-packages.partials.enquire-now');})->name('enquire-now');
Route::get('terms-and-conditions', function () { return view('terms-and-conditions.index');})->name('terms-and-conditions');
Route::get('privacy-and-policy', function () { return view('privacy-and-policy.index');})->name('privacy-and-policy');
Route::post('home/enquiry', [HomeController::class, 'enquiry'])->name('home.enquiry');


// umrah Packages
Route::get('umrah/10-nights-3-star-december-package', function () { return view('umrah.packages.10-nights-3-star-december-package');})->name('umrah/10-nights-3-star-december-package');
Route::get('umrah/10-nights-3-star-package', function () { return view('umrah.packages.10-nights-3-star-package');})->name('umrah/10-nights-3-star-package');
Route::get('umrah/10-nights-3-star-ramadan-package', function () { return view('umrah.packages.10-nights-3-star-ramadan-package');})->name('umrah/10-nights-3-star-ramadan-package');
Route::get('umrah/10-nights-4-star-hajj-package', function () { return view('umrah.packages.10-nights-4-star-hajj-package');})->name('umrah/10-nights-4-star-hajj-package');
Route::get('umrah/10-nights-4-star-ramadan-package', function () { return view('umrah.packages.10-nights-4-star-ramadan-package');})->name('umrah/10-nights-4-star-ramadan-package');
Route::get('umrah/10-nights-4-star-umrah-deal', function () { return view('umrah.packages.10-nights-4-star-umrah-deal');})->name('umrah/10-nights-4-star-umrah-deal');
Route::get('umrah/10-nights-5-star-package', function () { return view('umrah.packages.10-nights-5-star-package');})->name('umrah/10-nights-5-star-package');
Route::get('umrah/10-nights-5-star-umrah-deal', function () { return view('umrah.packages.10-nights-5-star-umrah-deal');})->name('umrah/10-nights-5-star-umrah-deal');
Route::get('umrah/10-nights-cheapest-umrah-deal', function () { return view('umrah.packages.10-nights-cheapest-umrah-deal');})->name('umrah/10-nights-cheapest-umrah-deal');
Route::get('umrah/12-nights-3-star-package', function () { return view('umrah.packages.12-nights-3-star-package');})->name('umrah/12-nights-3-star-package');
Route::get('umrah/12-nights-4-star-easter-package', function () { return view('umrah.packages.12-nights-4-star-easter-package');})->name('umrah/12-nights-4-star-easter-package');
Route::get('umrah/12-nights-5-star-december-package', function () { return view('umrah.packages.12-nights-5-star-december-package');})->name('umrah/12-nights-5-star-december-package');
Route::get('umrah/12-nights-5-star-package', function () { return view('umrah.packages.12-nights-5-star-package');})->name('umrah/12-nights-5-star-package');
Route::get('umrah/12-nights-5-star-ramadan-package', function () { return view('umrah.packages.12-nights-5-star-ramadan-package');})->name('umrah/12-nights-5-star-ramadan-package');
Route::get('umrah/12-nights-december-package', function () { return view('umrah.packages.12-nights-december-package');})->name('umrah/12-nights-december-package');
Route::get('umrah/12-nights-umrah-with-clock-tower-hotel', function () { return view('umrah.packages.12-nights-umrah-with-clock-tower-hotel');})->name('umrah/12-nights-umrah-with-clock-tower-hotel');
Route::get('umrah/14-nights-3-star-december-package', function () { return view('umrah.packages.14-nights-3-star-december-package');})->name('umrah/14-nights-3-star-december-package');
Route::get('umrah/14-nights-3-star-easter-package', function () { return view('umrah.packages.14-nights-3-star-easter-package');})->name('umrah/14-nights-3-star-easter-package');
Route::get('umrah/14-nights-3-star-package', function () { return view('umrah.packages.14-nights-3-star-package');})->name('umrah/14-nights-3-star-package');
Route::get('umrah/14-nights-3-star-ramadan-package', function () { return view('umrah.packages.14-nights-3-star-ramadan-package');})->name('umrah/14-nights-3-star-ramadan-package');
Route::get('umrah/14-nights-4-star-december-package', function () { return view('umrah.packages.14-nights-4-star-december-package');})->name('umrah/14-nights-4-star-december-package');
Route::get('umrah/14-nights-4-star-package', function () { return view('umrah.packages.14-nights-4-star-package');})->name('umrah/14-nights-4-star-package');
Route::get('umrah/14-nights-4-star-ramadan-package', function () { return view('umrah.packages.14-nights-4-star-ramadan-package');})->name('umrah/14-nights-4-star-ramadan-package');
Route::get('umrah/14-nights-5-star-december-package', function () { return view('umrah.packages.14-nights-5-star-december-package');})->name('umrah/14-nights-5-star-december-package');
Route::get('umrah/14-nights-5-star-easter-package', function () { return view('umrah.packages.14-nights-5-star-easter-package');})->name('umrah/14-nights-5-star-easter-package');
Route::get('umrah/14-nights-5-star-package', function () { return view('umrah.packages.14-nights-5-star-package');})->name('umrah/14-nights-5-star-package');
Route::get('umrah/14-nights-5-star-ramadan-package', function () { return view('umrah.packages.14-nights-5-star-ramadan-package');})->name('umrah/14-nights-5-star-ramadan-package');
Route::get('umrah/14-nights-easter-package', function () { return view('umrah.packages.14-nights-easter-package');})->name('umrah/14-nights-easter-package');
Route::get('umrah/5-nights-4-star-december-package', function () { return view('umrah.packages.5-nights-4-star-december-package');})->name('umrah/5-nights-4-star-december-package');
Route::get('umrah/5-nights-4-star-package', function () { return view('umrah.packages.5-nights-4-star-package');})->name('umrah/5-nights-4-star-package');
Route::get('umrah/7-nights-3-star-december-package', function () { return view('umrah.packages.7-nights-3-star-december-package');})->name('umrah/7-nights-3-star-december-package');
Route::get('umrah/7-nights-3-star-easter-package', function () { return view('umrah.packages.7-nights-3-star-easter-package');})->name('umrah/7-nights-3-star-easter-package');
Route::get('umrah/7-nights-3-star-package', function () { return view('umrah.packages.7-nights-3-star-package');})->name('umrah/7-nights-3-star-package');
Route::get('umrah/7-nights-3-star-ramadan-package', function () { return view('umrah.packages.7-nights-3-star-ramadan-package');})->name('umrah/7-nights-3-star-ramadan-package');
Route::get('umrah/7-nights-4-star-december-package', function () { return view('umrah.packages.7-nights-4-star-december-package');})->name('umrah/7-nights-4-star-december-package');
Route::get('umrah/7-nights-4-star-easter-package', function () { return view('umrah.packages.7-nights-4-star-easter-package');})->name('umrah/7-nights-4-star-easter-package');
Route::get('umrah/7-nights-4-star-package', function () { return view('umrah.packages.7-nights-4-star-package');})->name('umrah/7-nights-4-star-package');
Route::get('umrah/7-nights-4-star-ramadan-package', function () { return view('umrah.packages.7-nights-4-star-ramadan-package');})->name('umrah/7-nights-4-star-ramadan-package');
Route::get('umrah/7-nights-5-star-december-package', function () { return view('umrah.packages.7-nights-5-star-december-package');})->name('umrah/7-nights-5-star-december-package');
Route::get('umrah/7-nights-5-star-easter-package', function () { return view('umrah.packages.7-nights-5-star-easter-package');})->name('umrah/7-nights-5-star-easter-package');
Route::get('umrah/7-nights-5-star-package', function () { return view('umrah.packages.7-nights-5-star-package');})->name('umrah/7-nights-5-star-package');
Route::get('umrah/7-nights-5-star-ramadan-package', function () { return view('umrah.packages.7-nights-5-star-ramadan-package');})->name('umrah/7-nights-5-star-ramadan-package');
Route::get('umrah/7-nights-economy-umrah-deal', function () { return view('umrah.packages.7-nights-economy-umrah-deal');})->name('umrah/7-nights-economy-umrah-deal');
Route::get('umrah/special-12-nights-family-umrah-deal', function () { return view('umrah.packages.special-12-nights-family-umrah-deal');})->name('umrah/special-12-nights-family-umrah-deal');

// Hajj Packages
Route::get('hajj/10-nights-3-star-package', function () { return view('hajj-packages.packages.10-nights-3-star-package');})->name('hajj/10-nights-3-star-package');
Route::get('hajj/10-nights-4-star-hajj', function () { return view('hajj-packages.packages.10-nights-4-star-hajj');})->name('hajj/10-nights-4-star-hajj');
Route::get('hajj/10-nights-4-star-package', function () { return view('hajj-packages.packages.10-nights-4-star-package');})->name('hajj/10-nights-4-star-package');
Route::get('hajj/12-nights-5-star-package', function () { return view('hajj-packages.packages.12-nights-5-star-package');})->name('hajj/12-nights-5-star-package');
Route::get('hajj/14-nights-3-star-hajj', function () { return view('hajj-packages.packages.14-nights-3-star-hajj');})->name('hajj/14-nights-3-star-hajj');
Route::get('hajj/14-nights-3-star-hajj', function () { return view('hajj-packages.packages.14-nights-3-star-hajj');})->name('hajj/14-nights-3-star-hajj');
Route::get('hajj/14-nights-4-star-hajj', function () { return view('hajj-packages.packages.14-nights-4-star-hajj');})->name('hajj/14-nights-4-star-hajj');
Route::get('hajj/14-nights-5-star-package', function () { return view('hajj-packages.packages.14-nights-5-star-package');})->name('hajj/14-nights-5-star-package');
Route::get('hajj/2-3-weeks-hajj-package', function () { return view('hajj-packages.packages.2-3-weeks-hajj-package');})->name('hajj/2-3-weeks-hajj-package');
Route::get('hajj/2-3-weeks-non-shifting-hajj-package', function () { return view('hajj-packages.packages.2-3-weeks-non-shifting-hajj-package');})->name('hajj/2-3-weeks-non-shifting-hajj-package');
Route::get('hajj/4-weeks-hajj-package', function () { return view('hajj-packages.packages.4-weeks-hajj-package');})->name('hajj/4-weeks-hajj-package');
Route::get('hajj/5-nights-4-star-hajj', function () { return view('hajj-packages.packages.5-nights-4-star-hajj');})->name('hajj/5-nights-4-star-hajj');
Route::get('hajj/5-star-hajj-package', function () { return view('hajj-packages.packages.5-star-hajj-package');})->name('hajj/5-star-hajj-package');
Route::get('hajj/7-nights-3-star-hajj', function () { return view('hajj-packages.packages.7-nights-3-star-hajj');})->name('hajj/7-nights-3-star-hajj');
Route::get('hajj/7-nights-3-star-package', function () { return view('hajj-packages.packages.7-nights-3-star-package');})->name('hajj/7-nights-3-star-package');
Route::get('hajj/7-nights-5-star-package', function () { return view('hajj-packages.packages.7-nights-5-star-package');})->name('hajj/7-nights-5-star-package');
