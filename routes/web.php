<?php

use App\Livewire\Details;
use App\Livewire\Genres;
use App\Models\User;
use App\Livewire\HomePage;
use App\Livewire\TopRated;
use App\Livewire\NewReleases;
use App\Livewire\Search;
use App\Livewire\DisplayMovies;
use App\Livewire\DisplaySeries;
use App\Livewire\TrendingMovies;
use App\Livewire\TrendingSeries;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Media\MediaController;
use App\Http\Controllers\Google\GoogleController;
use App\Http\Controllers\Download\DownloadController;

Route::get('/', HomePage::class)->name('home');

Route::get('/movies', DisplayMovies::class)->name('movies.page');
Route::get('/series', DisplaySeries::class)->name('series.page');
Route::get('/new-releases', NewReleases::class)->name('new.releases');
Route::get('/top-rated', TopRated::class)->name('rated.page');
Route::get('/trending-movies', TrendingMovies::class)->name('trending.movies');
Route::get('/trending-series', TrendingSeries::class)->name('trending.series');
Route::get('/search', [MoviesController::class, 'search'])->name('search');

Route::get('/tag/{genre}', Genres::class)->name('genre');

Route::get('/contact-us', [PageController::class, 'contact_us'])->name('contact.page');

Route::get('/release-year', [MediaController::class, 'year'])->name('year.page');

// Auth
Route::get('/sign-up', [AuthController::class, 'register_page'])->name('register.page')->middleware('loggedin');
Route::get('/sign-in', [AuthController::class, 'login_page'])->name('login')->middleware('loggedin');
Route::get('/reset-password', [AuthController::class, 'forgot_password_page'])->name('forgot.password')->middleware('loggedin');

Route::post('/comment/{name}/{id}', [CommentController::class, 'comment'])->name('comment');
Route::post('/reply/{name}/{id}/{comment_id}/{comment_name}', [ReplyController::class, 'reply'])->name('reply');

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

Route::get('/profile', [AuthController::class, 'profile_page'])->name('user.profile')->middleware('auth.user');
Route::get('/my-watchlist', [AuthController::class, 'watchlist_page'])->name('my.watchlist')->middleware('auth.user');

Route::get('/download-movie/{name}', [DownloadController::class, 'downloadMovie'])->name('download.movie');

Route::get('/download-seasons/{name}/S0{season}/E0{episode}', [DownloadController::class, 'downloadSeason'])->name('download');

Route::get('/delete-account', function () {
    $user = auth()->user(); // Get the currently authenticated user.

    if ($user) {
        $user->delete(); // Delete the logged-in user's account.
        auth()->logout(); // Log the user out after account deletion.
        Auth::logoutOtherDevices($user->password);

        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }

    return redirect()->route('home')->with('error', 'Unable to delete account.');
})->name('account.delete')->middleware('auth');

Route::get('/{name}', Details::class)->name('movie.details');
