<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\DB;

//Events

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DevotionController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StorageController;



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

// Sitemap for SEO
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Fallback storage routes (when symlink is not available)
Route::get('/storage/member-photos/{filename}', [App\Http\Controllers\StorageController::class, 'memberPhoto'])->name('storage.member-photo');
Route::get('/storage/{path}', [App\Http\Controllers\StorageController::class, 'serve'])->where('path', '.*')->name('storage.serve');

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

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terms-of-use', function () {
    return view('terms-of-use');
})->name('terms-of-use');

Route::get('/story', function () {
    return view('story-enhanced');
})->name('story');

// Admin Story Images Management
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Birthday emails
    Route::post('/birthdays/send', [App\Http\Controllers\Admin\DashboardController::class, 'sendBirthdayEmails'])->name('birthdays.send');

    // Bulk Email
    Route::get('/bulk-email', [App\Http\Controllers\Admin\BulkEmailController::class, 'index'])->name('bulk-email.index');
    Route::post('/bulk-email/send', [App\Http\Controllers\Admin\BulkEmailController::class, 'send'])->name('bulk-email.send');

    // Calendar Events API
    Route::get('/calendar/events', [App\Http\Controllers\Admin\DashboardController::class, 'getCalendarEvents'])->name('calendar.events');

    // Audit Logs
    Route::get('/audit-logs', [App\Http\Controllers\Admin\AuditLogController::class, 'index'])->name('audit-logs.index');
    Route::get('/audit-logs/{auditLog}', [App\Http\Controllers\Admin\AuditLogController::class, 'show'])->name('audit-logs.show');
    Route::post('/audit-logs/cleanup', [App\Http\Controllers\Admin\AuditLogController::class, 'cleanup'])->name('audit-logs.cleanup');

    Route::get('/story-images', [App\Http\Controllers\StoryImageController::class, 'index'])->name('story-images.index');
    Route::post('/story-images', [App\Http\Controllers\StoryImageController::class, 'store'])->name('story-images.store');
    Route::delete('/story-images/{filename}', [App\Http\Controllers\StoryImageController::class, 'destroy'])->name('story-images.destroy');

    // Admin Stories Management
    Route::resource('stories', App\Http\Controllers\Admin\StoryController::class);
    Route::patch('/stories/{story}/toggle-featured', [App\Http\Controllers\Admin\StoryController::class, 'toggleFeatured'])->name('stories.toggle-featured');

    // Admin Devotions Management
    Route::resource('devotions', App\Http\Controllers\Admin\DevotionController::class);

    // Admin Events (ensure resource exists)
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);
    Route::get('events/{event}/registrations', [App\Http\Controllers\Admin\EventController::class, 'registrations'])->name('events.registrations');

    // Generic Image Upload (for editors/forms)
    Route::post('upload-image', [App\Http\Controllers\Admin\UploadController::class, 'image'])->name('upload.image');

    // Admin Resources Management (Utility Folder)
    Route::resource('resources', App\Http\Controllers\Admin\ResourceController::class);
    Route::post('resources/{resource}/toggle-active', [App\Http\Controllers\Admin\ResourceController::class, 'toggleActive'])->name('resources.toggle-active');
});

// Public Stories (Protected by Page Settings)
Route::middleware(['page.status:stories'])->group(function () {
    Route::get('/stories', [App\Http\Controllers\StoryController::class, 'index'])->name('stories.index');
    Route::get('/stories/{story}', [App\Http\Controllers\StoryController::class, 'show'])->name('story.show');
    Route::post('/stories/{story}/like', [App\Http\Controllers\StoryController::class, 'like'])->name('story.like');
});

// Public Resources (Utility Folder)
Route::get('/utility-folder', [App\Http\Controllers\ResourceController::class, 'index'])->name('resources.index');
Route::get('/resources/{resource}/download', [App\Http\Controllers\ResourceController::class, 'download'])->name('resources.download');
Route::get('/resources/{resource}/preview', [App\Http\Controllers\ResourceController::class, 'preview'])->name('resources.preview');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Public Gallery (Disabled)
// Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');

// Legacy story routes (redirect to new /stories routes)
Route::get('/story', function () {
    return redirect()->route('stories.index');
})->name('story');
Route::get('/story/{story}', function ($story) {
    return redirect()->route('story.show', $story);
});

// Devotions (Protected by Page Settings)
Route::middleware(['page.status:devotions'])->group(function () {
    Route::get('/devotions', [DevotionController::class, 'index'])->name('devotions.index');
    Route::get('/devotions/{devotion}', [DevotionController::class, 'show'])->name('devotions.show');
});

// Committee (Protected by Page Settings)
Route::middleware(['page.status:committee'])->group(function () {
    Route::get('/committee', [CommitteeController::class, 'index'])->name('committee.index');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Email Subscriber
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');

// Legacy registration routes (deprecated) -> Redirect to new join/member
Route::match(['get','post'],'/register/member', function() {
    return redirect()->route('registration.member');
})->name('choir.register.form');

// New Registration Routes
Route::get('/join/member', [RegistrationController::class, 'showMemberForm'])->name('registration.member');
Route::post('/join/member', [RegistrationController::class, 'storeMember'])->name('registration.member.store');

Route::get('/join/friendship', [RegistrationController::class, 'showFriendshipForm'])->name('registration.friendship');
Route::post('/join/friendship', [RegistrationController::class, 'storeFriendship'])->name('registration.friendship.store');

Route::get('/registration/success', [RegistrationController::class, 'success'])->name('registration.success');

// Remind registration code
Route::get('/registration/remind-code', [RegistrationController::class, 'showRemindCodeForm'])->name('registration.remind-code');
Route::post('/registration/remind-code', [RegistrationController::class, 'sendRemindCode'])->name('registration.remind-code.send');

// Download ID Card by member code
Route::get('/download/id-card', [RegistrationController::class, 'showDownloadIdCardForm'])->name('download.id-card');
Route::post('/download/id-card', [RegistrationController::class, 'downloadIdCard'])->name('download.id-card.submit');

// Member Portal - View profile, card, and edit
Route::get('/member-portal', [RegistrationController::class, 'showMemberPortal'])->name('member.portal');
Route::post('/member-portal', [RegistrationController::class, 'accessMemberPortal'])->name('member.portal.access');
Route::get('/member-portal/{member}', [RegistrationController::class, 'viewMemberPortal'])->name('member.portal.view');
Route::get('/member-portal/{member}/edit', [RegistrationController::class, 'editMemberPortal'])->name('member.portal.edit');
Route::post('/member-portal/{member}/edit', [RegistrationController::class, 'updateMemberPortal'])->name('member.portal.update');

// Language switcher
Route::get('/lang/{locale}', function ($locale) {
    $available = ['en', 'rw'];
    if (in_array($locale, $available)) {
        session(['app_locale' => $locale]);
    }
    return back();
})->name('lang.switch');

// PDF Downloads
Route::get('/member/{member}/id-card/download', function(\App\Models\Member $member) {
    return \App\Services\PdfService::downloadMemberIdCard($member);
})->name('member.id-card.download');

Route::get('/member/{member}/id-card/view', function(\App\Models\Member $member) {
    return \App\Services\PdfService::streamMemberIdCard($member);
})->name('member.id-card.view');

Route::get('/member/{member}/confirmation/download', function(\App\Models\Member $member) {
    return \App\Services\PdfService::downloadRegistrationConfirmation($member);
})->name('member.confirmation.download');

Route::get('/member/{member}/confirmation/view', function(\App\Models\Member $member) {
    return \App\Services\PdfService::streamRegistrationConfirmation($member);
})->name('member.confirmation.view');

// Events (Protected by Page Settings)
Route::middleware(['page.status:events'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}.ics', [EventController::class, 'ics'])->name('events.ics');

    Route::get('/events/{event}/register', [EventRegistrationController::class, 'create'])->name('events.register');
    Route::post('/events/{event}/register', [EventRegistrationController::class, 'store'])
        ->name('events.register.store');
});

Route::get('/tickets/verify/{code?}', [TicketController::class, 'verify'])->name('tickets.verify');
Route::get('/tickets/pdf/{code?}', [TicketController::class, 'pdf'])->name('tickets.pdf');

// Test QR code route
Route::get('/test-qr', function () {
    $registration = \App\Models\EventRegistration::first();
    if ($registration) {
        $qrCode = \App\Services\QrCodeService::generateTicketQr($registration->registration_code);
        return view('test-qr', ['qrCode' => $qrCode, 'registration' => $registration]);
    }
    return 'No registration found';
});


Route::get('/register/thank-you', function () {
    return view('registration-thankyou');
})->name('choir.register.thankyou');

// Test email route (remove in production)
// Route::get('/test-email', function () {
//     try {
//         \Illuminate\Support\Facades\Mail::raw('Test email from God\'s Family Choir', function($message) {
//             $message->to('test@example.com')->subject('Test Email');
//         });
//         return response('Email sent successfully! Check storage/logs/laravel.log for the email content.');
//     } catch (\Exception $e) {
//         return response('Email failed: ' . $e->getMessage(), 500);
//     }
// });

// Contact form with basic rate limiting to reduce spam (3 submissions per minute per IP)
Route::post('/contact', [ContactController::class, 'submit'])
    ->middleware('throttle:3,1')
    ->name('contact.submit');

// Shop Routes
Route::middleware(['page.status:shop'])->group(function () {
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/search', [ShopController::class, 'search'])->name('shop.search');
    Route::get('/shop/albums/{album}', [ShopController::class, 'show'])->name('shop.show');
    Route::get('/shop/albums/{album}/purchase', [ShopController::class, 'purchase'])->name('shop.purchase');
    Route::post('/shop/albums/{album}/purchase', [ShopController::class, 'processPurchase'])->name('shop.process-purchase');
    Route::get('/shop/download/{downloadCode}', [ShopController::class, 'download'])->name('shop.download');
    Route::post('/shop/download/{downloadCode}', [ShopController::class, 'processDownload'])->name('shop.process-download');
    Route::post('/shop/verify-purchase', [ShopController::class, 'verifyPurchase'])->name('shop.verify-purchase');
});

// Payment gateway routes (to be implemented with actual payment integration)
Route::get('/shop/payment/stripe/{purchase}', function() {
    return view('shop.payment.stripe');
})->name('shop.payment.stripe');

Route::get('/shop/payment/paypal/{purchase}', function() {
    return view('shop.payment.paypal');
})->name('shop.payment.paypal');

Route::get('/shop/payment/mobile/{purchase}', function() {
    return view('shop.payment.mobile');
})->name('shop.payment.mobile');

// IremboPay Payment Routes
Route::get('/payments/irembopay/initialize/{purchase}', [PaymentController::class, 'initializeIremboPay'])->name('payments.irembopay.initialize');
Route::get('/payments/irembopay/form/{purchase}', [PaymentController::class, 'showIremboPayForm'])->name('payments.irembopay.form');
Route::post('/payments/irembopay/callback', [PaymentController::class, 'handleIremboPayCallback'])->name('payments.irembopay.callback');
Route::get('/payments/irembopay/return', [PaymentController::class, 'handleIremboPayReturn'])->name('payments.irembopay.return');
Route::get('/payments/irembopay/status/{purchase}', [PaymentController::class, 'checkPaymentStatus'])->name('payments.irembopay.status');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::get('system/health', function () {
        try {
            DB::connection()->getPdo();
            DB::select('select 1');

            return response()->json([
                'ok' => true,
                'database' => true,
                'checked_at' => now()->toIso8601String(),
            ]);
        } catch (\Throwable $th) {
            report($th);

            return response()->json([
                'ok' => false,
                'database' => false,
                'message' => config('app.debug') ? $th->getMessage() : 'Database connection failed.',
                'checked_at' => now()->toIso8601String(),
            ], 503);
        }
    })->name('system.health');

    // Notifications
    Route::get('notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('notifications/{notification}/read', [App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('notifications/read-all', [App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    Route::delete('notifications/{notification}', [App\Http\Controllers\Admin\NotificationController::class, 'destroy'])->name('notifications.destroy');

    // Events Management
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);
    Route::get('events/{event}/registrations', [App\Http\Controllers\Admin\EventController::class, 'registrations'])->name('events.registrations');

    // Registrations Management
    Route::get('registrations', [App\Http\Controllers\Admin\RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('registrations/{registration}', [App\Http\Controllers\Admin\RegistrationController::class, 'show'])->name('registrations.show');
    Route::delete('registrations/{registration}', [App\Http\Controllers\Admin\RegistrationController::class, 'destroy'])->name('registrations.destroy');
    Route::get('registrations/export/csv', [App\Http\Controllers\Admin\RegistrationController::class, 'export'])->name('registrations.export');

    // Members Management
    Route::get('members/export/csv', [App\Http\Controllers\Admin\MemberController::class, 'export'])->name('members.export');
    Route::resource('members', App\Http\Controllers\Admin\MemberController::class);

    // Contacts Management
    Route::get('contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');
    Route::get('contacts/{contact}/attachment', [App\Http\Controllers\Admin\ContactController::class, 'downloadAttachment'])->name('contacts.attachment');
    Route::delete('contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::patch('contacts/{contact}/read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('contacts.read');
    Route::patch('contacts/{contact}/unread', [App\Http\Controllers\Admin\ContactController::class, 'markAsUnread'])->name('contacts.unread');

    // Profile Management
    Route::get('profile', function () {
        return view('admin.profile', ['user' => auth()->user()]);
    })->name('profile');

    // Admin Users Management
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

    // Committees Management
    Route::resource('committees', App\Http\Controllers\Admin\CommitteeController::class);

    // Stories Management
    Route::resource('stories', App\Http\Controllers\Admin\StoryController::class);

    // Contributions Management
    Route::get('contributions/export', [App\Http\Controllers\Admin\ContributionController::class, 'export'])->name('contributions.export');

    // Visitors Analytics
    Route::get('visitors', [App\Http\Controllers\Admin\VisitorController::class, 'index'])->name('visitors.index');
    Route::post('contributions/toggle', [App\Http\Controllers\Admin\ContributionController::class, 'togglePayment'])->name('contributions.toggle');
    Route::post('contributions/target', [App\Http\Controllers\Admin\ContributionController::class, 'setTarget'])->name('contributions.target');
    Route::get('contributions/targets', [App\Http\Controllers\Admin\ContributionTargetController::class, 'index'])->name('contributions.targets');
    Route::resource('contributions', App\Http\Controllers\Admin\ContributionController::class);

    // Contribution Targets
    Route::resource('contribution-targets', App\Http\Controllers\Admin\ContributionTargetController::class);

    // Songs
    Route::resource('songs', App\Http\Controllers\Admin\SongController::class);
    Route::post('songs/{song}/toggle-featured', [App\Http\Controllers\Admin\SongController::class, 'toggleFeatured'])->name('songs.toggle-featured');

    // Meetings Management
    Route::resource('meetings', App\Http\Controllers\Admin\MeetingController::class);
    Route::post('meetings/{meeting}/send-invitations', [App\Http\Controllers\Admin\MeetingController::class, 'sendInvitations'])->name('meetings.send-invitations');

    // Albums Management (Shop)
    Route::resource('albums', App\Http\Controllers\Admin\AlbumController::class);
    Route::post('albums/{album}/toggle-featured', [App\Http\Controllers\Admin\AlbumController::class, 'toggleFeatured'])->name('albums.toggle-featured');
    Route::post('albums/{album}/toggle-active', [App\Http\Controllers\Admin\AlbumController::class, 'toggleActive'])->name('albums.toggle-active');

    // Page Settings Management
    Route::get('page-settings', [App\Http\Controllers\Admin\PageSettingsController::class, 'index'])->name('page-settings.index');
    Route::get('page-settings/{pageSetting}/edit', [App\Http\Controllers\Admin\PageSettingsController::class, 'edit'])->name('page-settings.edit');
    Route::patch('page-settings/{pageSetting}', [App\Http\Controllers\Admin\PageSettingsController::class, 'update'])->name('page-settings.update');

    // Site Settings Management (Global Coming Soon Mode)
    Route::get('site-settings', [App\Http\Controllers\Admin\SiteSettingsController::class, 'index'])->name('site-settings.index');
    Route::put('site-settings', [App\Http\Controllers\Admin\SiteSettingsController::class, 'update'])->name('site-settings.update');

    // Gallery Management
    Route::resource('galleries', App\Http\Controllers\Admin\GalleryController::class);
    Route::post('galleries/{gallery}/toggle-featured', [App\Http\Controllers\Admin\GalleryController::class, 'toggleFeatured'])->name('galleries.toggle-featured');
    Route::post('galleries/{gallery}/toggle-active', [App\Http\Controllers\Admin\GalleryController::class, 'toggleActive'])->name('galleries.toggle-active');
});

Route::fallback(function () {
    return response()->view('errors.missing', [], 404);
});

require __DIR__.'/auth.php';
