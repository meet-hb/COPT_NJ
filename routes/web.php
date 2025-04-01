<?php

$admin_url = 'coptnj-admin';

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TherapyController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SettingController;

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

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('front.appointment');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/our-practice', [FrontController::class, 'ourpractice'])->name('front.our-practice');
Route::get('/our-locations', [FrontController::class, 'ourlocations'])->name('front.our-locations');
Route::get('/our-team', [FrontController::class, 'ourteam'])->name('front.our-team');
Route::get('/team-detail/{id}', [FrontController::class, 'ourteamop'])->name('front.team-detail');
Route::get('/career', [FrontController::class, 'career'])->name('front.career');
Route::get('/blog', [FrontController::class, 'healthBlog'])->name('front.health-blog');
Route::get('/blog-details/{id}', [FrontController::class, 'blogDetails'])->name('front.blog_details');

Route::get('/privacy-policy', [FrontController::class, 'privacyPolicy'])->name('front.privacy_policy');
Route::get('/terms-and-conditions', [FrontController::class, 'termsAndConditions'])->name('front.terms_and_conditions');
Route::get('/sitemap', [FrontController::class, 'siteMap'])->name('front.sitemap');

Route::view('/areas-we-serve', 'front.areas-we-serve')->name('front.areas_we_serve');
Route::view('/teletherapy', 'front.teletherapy')->name('front.teletherapy');

Route::post('/contactop', [FrontController::class, 'contactUs'])->name('contactus');

Route::post('/blogRequestFormSubmit', [FrontController::class, 'blogRequestFormSubmit'])->name('blogRequestFormSubmit');

Route::post('/leavecomment', [FrontController::class, 'leaveComment'])->name('leavecomment');

Route::get('/faq', [FrontController::class, 'faq'])->name('front.faq');

Route::get('/how-we-treat/{therapy_name}', [FrontController::class, 'viewTherapyTreatment'])->name('front.howWeTreat');

Route::get('/what-we-treat/{treatment_name}', [FrontController::class, 'viewTreatmentNames'])->name('front.whatWeTreat');

Route::get('/patient-info', [FrontController::class, 'patientInfo'])->name('front.patientInfo');
Route::view('/direct-access', 'front.direct-access')->name('front.directAccess');
Route::view('/insurance-info', 'front.insurance-info')->name('front.insuranceInfo');
Route::get('/refer-a-friend', [FrontController::class, 'refererAFriend'])->name('front.referAFriend');

Route::view('/knee-balance-and-walking', 'front.knee-balance-and-walking')->name('front.knee-balance-and-walking');

Route::view('/back', 'front.back')->name('front.back');
Route::view('/head-and-neck', 'front.head-and-neck')->name('front.head-and-neck');
Route::view('/shoulder', 'front.shoulder')->name('front.shoulder');
Route::view('/hip', 'front.hip')->name('front.hip');
Route::view('/elbow-wrist-and-hand', 'front.elbow-wrist-and-hand')->name('front.elbow-wrist-hand');
Route::view('/foot-and-ankle', 'front.foot-and-ankle')->name('front.foot-and-ankle');
Route::get('/location-details/{location}', [FrontController::class, 'loctionDetails'])->name('front.location-details');

Route::post('/send-mail', [FrontController::class, 'sendmail'])->middleware('throttle:3,10')->name('appointment.store');
Route::get('/login', function () {
    // Clear all session data
    // Session::flush();
    // Redirect to the home page or any other desired location
    return redirect('/coptnj-admin/login');
})->name('logout');


Route::any($admin_url . '/login', function () {
    return view('admin.login');
})->name('login');

Route::any($admin_url . '/login/authenticate', [AdminController::class, 'validateLogin'])->name('admin.validateLogin');

Route::any($admin_url . '/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::any($admin_url . '/profile', [AdminController::class, 'profile'])->name('admin.profile');

Route::get($admin_url . '/treatments', [TreatmentController::class, 'treatments'])->name('admin.treatments');
Route::post($admin_url . '/treatment_list', [TreatmentController::class, 'treatmentList'])->name('admin.treatmentList');
Route::get($admin_url . '/treatment_add', [TreatmentController::class, 'treatmentAdd'])->name('admin.treatmentAdd');
Route::post($admin_url . '/treatment_add', [TreatmentController::class, 'treatmentAddOp'])->name('admin.treatmentAddOp');
Route::post($admin_url . '/treatment_delete', [TreatmentController::class, 'treatmentDelete'])->name('admin.treatmentDelete');
Route::get($admin_url . '/treatment_edit/{id}', [TreatmentController::class, 'treatmentEdit'])->name('admin.treatmentEdit');
Route::post($admin_url . '/treatment_edit', [TreatmentController::class, 'treatmentEditOp'])->name('admin.treatmentEditOp');

Route::get($admin_url . '/therapys', [TherapyController::class, 'therapys'])->name('admin.therapys');
Route::post($admin_url . '/therapy_list', [TherapyController::class, 'therapyList'])->name('admin.therapyList');
Route::get($admin_url . '/therapy_add', [TherapyController::class, 'therapyAdd'])->name('admin.therapyAdd');
Route::post($admin_url . '/therapy_add', [TherapyController::class, 'therapyAddOp'])->name('admin.therapyAddOp');
Route::post($admin_url . '/therapy_delete', [TherapyController::class, 'therapyDelete'])->name('admin.therapyDelete');
Route::get($admin_url . '/therapy_edit/{id}', [TherapyController::class, 'therapyEdit'])->name('admin.therapyEdit');
Route::post($admin_url . '/therapy_edit', [TherapyController::class, 'therapyEditOp'])->name('admin.therapyEditOp');

Route::get($admin_url . '/therapy_details', [TherapyController::class, 'therapyDetails'])->name('admin.therapyDetails');
Route::post($admin_url . '/therapy_detail_list', [TherapyController::class, 'therapyDetailList'])->name('admin.therapyDetailList');
Route::get($admin_url . '/therapy_detail_add', [TherapyController::class, 'therapyDetailAdd'])->name('admin.therapyDetailAdd');
Route::post($admin_url . '/therapy_detail_add', [TherapyController::class, 'therapyDetailAddOp'])->name('admin.therapyDetailAddOp');
Route::post($admin_url . '/therapy_detail_delete', [TherapyController::class, 'therapyDetailDelete'])->name('admin.therapyDetailDelete');
Route::get($admin_url . '/therapy_detail_edit/{id}', [TherapyController::class, 'therapyDetailEdit'])->name('admin.therapyDetailEdit');
Route::post($admin_url . '/therapy_detail_edit', [TherapyController::class, 'therapyDetailEditOp'])->name('admin.therapyDetailEditOp');

Route::get($admin_url . '/blog_details', [BlogController::class, 'BlogDetails'])->name('admin.BlogDetails');
Route::post($admin_url . '/blog_detail_list', [BlogController::class, 'BlogDetailList'])->name('admin.BlogDetailList');
Route::get($admin_url . '/blog_detail_add', [BlogController::class, 'BlogDetailAdd'])->name('admin.BlogDetailAdd');
Route::post($admin_url . '/blog_detail_add', [BlogController::class, 'BlogDetailAddOp'])->name('admin.BlogDetailAddOp');
Route::post($admin_url . '/blog_detail_delete', [BlogController::class, 'BlogDetailDelete'])->name('admin.BlogDetailDelete');
Route::get($admin_url . '/blog_detail_edit/{id}', [BlogController::class, 'BlogDetailEdit'])->name('admin.BlogDetailEdit');
Route::post($admin_url . '/blog_detail_edit', [BlogController::class, 'BlogDetailEditOp'])->name('admin.BlogDetailEditOp');

Route::get($admin_url . '/teams', [TeamController::class, 'teams'])->name('admin.TeamDetails');
Route::post($admin_url . '/team_list', [TeamController::class, 'teamList'])->name('admin.teamList');
Route::get($admin_url . '/team_add', [TeamController::class, 'teamAdd'])->name('admin.teamAdd');
Route::post($admin_url . '/team_add', [TeamController::class, 'teamAddOp'])->name('admin.teamAddOp');
Route::get($admin_url . '/team_edit/{id}', [TeamController::class, 'teamedit'])->name('admin.teamedit');
Route::post($admin_url . '/team_edit', [TeamController::class, 'teameditOp'])->name('admin.teameditOp');
Route::post($admin_url . '/team_delete', [TeamController::class, 'teamDelete'])->name('admin.teamDelete');
Route::post($admin_url . '/team/update-position', [TeamController::class, 'updatePosition'])->name('admin.teamUpdatePosition');

Route::get($admin_url . '/faqs', [FaqController::class, 'faqs'])->name('admin.faq');
Route::post($admin_url . '/faq_list', [FaqController::class, 'faqList'])->name('admin.faqList');
Route::get($admin_url . '/faq_add', [FaqController::class, 'faqAdd'])->name('admin.faqAdd');
Route::post($admin_url . '/faq_add', [FaqController::class, 'faqAddOp'])->name('admin.faqAddOp');
Route::post($admin_url . '/faq_delete', [FaqController::class, 'faqDelete'])->name('admin.faqDelete');


Route::get($admin_url . '/terms', [SettingController::class, 'terms'])->name('admin.terms');
Route::get($admin_url . '/privacy', [SettingController::class, 'privacy'])->name('admin.privacy');
Route::post($admin_url . '/privacy', [SettingController::class, 'privacyOP'])->name('admin.privacyDetailOp');
Route::post($admin_url . '/terms', [SettingController::class, 'termsOP'])->name('admin.termsDetailOp');
