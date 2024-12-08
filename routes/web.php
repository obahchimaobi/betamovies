<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Google\GoogleController;
use App\Http\Controllers\Media\MediaController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\ReplyController;
use App\Livewire\DisplayMovies;
use App\Livewire\DisplaySeries;
use App\Livewire\HomePage;
use App\Livewire\NewReleases;
use App\Livewire\Search;
use App\Livewire\TopRated;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::get('/', HomePage::class)->name('home');

Route::get('/movies', DisplayMovies::class)->name('movies.page');
Route::get('/series', DisplaySeries::class)->name('series.page');
Route::get('/new-releases', NewReleases::class)->name('new.releases');
Route::get('/details', [MediaController::class, 'details'])->name('details');
Route::get('/details2', [MediaController::class, 'details2'])->name('details2');
Route::get('/top-rated', TopRated::class)->name('rated.page');

Route::get('/contact-us', [PageController::class, 'contact_us'])->name('contact.page');

Route::get('/release-year', [MediaController::class, 'year'])->name('year.page');
Route::get('/search', Search::class)->name('search');

// Auth
Route::get('/sign-up', [AuthController::class, 'register_page'])->name('register.page');
Route::get('/sign-in', [AuthController::class, 'login_page'])->name('login');
Route::get('/reset-password', [AuthController::class, 'forgot_password_page'])->name('forgot.password');

Route::post('/comment/{name}/{id}', [CommentController::class, 'comment'])->name('comment');
Route::post('/reply/{name}/{id}/{comment_id}/{comment_name}', [ReplyController::class, 'reply'])->name('reply');

// Route::get('/email/verify', function() {
//     return view('auth.verify-email');
// })->name('email.verify');
// Route::get('/resend-code', function () {
//     return view('auth.resend-code');
// })->name('resend-code');

Route::get('/email/verify/{email}/{hash}', function ($email, $hash) {
    $user = User::where('email', $email)->firstOrFail();

    if (! hash_equals(sha1($user->otp), $hash)) {
        abort(403, 'Invalid verification link.');
    }

    if ($user->email_verified_at) {
        return redirect()->route('login')->with('error', 'Your email is already verified.');
    }

    // $user->update(['email_verified_at' => now()]);
    $user->email_verified_at = now();
    $user->save();

    return redirect()->route('login')->with('success', 'Your email has been successfully verified.');
})->middleware('signed')->name('verify.otp');

// Signup and Login with google
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('/logout', function () {
    Auth::logout();

    return redirect()->route('home');
})->name('logout');

Route::get('/profile', [AuthController::class, 'profile_page'])->name('user.profile')->middleware('auth');
Route::get('/my-watchlist', [AuthController::class, 'watchlist_page'])->name('my.watchlist')->middleware('auth');

Route::get('/{name}', [MoviesController::class, 'show'])->name('movie.details');
