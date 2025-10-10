<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MemberController;

//Events

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DevotionController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\CommitteeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    // Redirect admins to admin dashboard
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/story', [StoryController::class, 'index'])->name('story');
Route::get('/story/{story}', [StoryController::class, 'show'])->name('story.show');

Route::get('/devotions', [DevotionController::class, 'index'])->name('devotions.index');
Route::get('/devotions/{devotion}', [DevotionController::class, 'show'])->name('devotions.show');

Route::get('/committee', [CommitteeController::class, 'index'])->name('committee.index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Email Subscriber
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');

Route::get('/register/member', [MemberController::class, 'create'])
    ->name('choir.register.form');

Route::post('/register/member', [MemberController::class, 'store'])
    ->name('members.store');

//events

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}.ics', [EventController::class, 'ics'])->name('events.ics');

Route::post('/events/{event}/register', [EventRegistrationController::class, 'store'])
    ->name('events.register');

Route::get('/tickets/verify/{code}', [TicketController::class, 'verify'])->name('tickets.verify');
Route::get('/tickets/pdf/{code}', [TicketController::class, 'pdf'])->name('tickets.pdf');


Route::get('/register/thank-you', function () {
    return view('registration-thankyou');
})->name('choir.register.thankyou');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Events Management
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);
    Route::get('events/{event}/registrations', [App\Http\Controllers\Admin\EventController::class, 'registrations'])->name('events.registrations');

    // Registrations Management
    Route::get('registrations', [App\Http\Controllers\Admin\RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('registrations/{registration}', [App\Http\Controllers\Admin\RegistrationController::class, 'show'])->name('registrations.show');
    Route::delete('registrations/{registration}', [App\Http\Controllers\Admin\RegistrationController::class, 'destroy'])->name('registrations.destroy');
    Route::get('registrations/export/csv', [App\Http\Controllers\Admin\RegistrationController::class, 'export'])->name('registrations.export');

    // Members Management
    Route::get('members', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('members.index');
    Route::get('members/{member}', [App\Http\Controllers\Admin\MemberController::class, 'show'])->name('members.show');
    Route::delete('members/{member}', [App\Http\Controllers\Admin\MemberController::class, 'destroy'])->name('members.destroy');
    Route::get('members/export/csv', [App\Http\Controllers\Admin\MemberController::class, 'export'])->name('members.export');

    // Contacts Management
    Route::get('contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::patch('contacts/{contact}/read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('contacts.read');
    Route::patch('contacts/{contact}/unread', [App\Http\Controllers\Admin\ContactController::class, 'markAsUnread'])->name('contacts.unread');

    // Profile Management
    Route::get('profile', function () {
        return view('admin.profile', ['user' => auth()->user()]);
    })->name('profile');

    // Admin Users Management
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

require __DIR__.'/auth.php';
