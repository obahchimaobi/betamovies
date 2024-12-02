<?php

use App\Http\Controllers\Media\MediaController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Year\YearController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/movies', [MediaController::class, 'movies'])->name('movies.page');
Route::get('/series', [MediaController::class, 'series'])->name('series.page');
Route::get('/new-releases', [MediaController::class, 'new_releases'])->name('new.releases');
Route::get('/details', [MediaController::class, 'details'])->name('details');
Route::get('/details2', [MediaController::class, 'details2'])->name('details2');

Route::get('/contact-us', [PageController::class, 'contact_us'])->name('contact.page');

Route::get('/release-year', [YearController::class, 'year'])->name('year.page');