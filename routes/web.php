<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\Internship;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/internships/create', [InternshipController::class, 'create'])->name('internships.create');
    Route::post('/internships/store', [InternshipController::class, 'store'])->name('internships.store');
    Route::get('/internships/{id}', [InternshipController::class, 'internshipDetail'])->name('internship.detail');
    Route::get('/internship/{id}/edit', [InternshipController::class, 'edit'])->name('internship.edit');
    Route::put('/internship/{id}', [InternshipController::class, 'update'])->name('internship.update');
    Route::delete('/internships/{id}', [InternshipController::class, 'destroy'])->name('internships.destroy');
    Route::get('/applicants', [InternshipController::class, 'showMyApplications'])->name('my.applicants');
    Route::delete('/applications/{id}', [InternshipController::class, 'deleteApplication'])->name('application.delete');
});


//for auth

Route::middleware([UserMiddleware::class])->group(function () {
    Route::get('/home', [InternshipController::class, 'home'])->name('home');
    Route::get('/internships-details', [InternshipController::class, 'internshipView'])->name('internship.view');

    Route::get('/internshipMore/{id}', [InternshipController::class, 'internshipMore'])->name('internship.more');
    Route::post('/internships/{id}/apply', [InternshipController::class, 'applyWithCv'])->name('internship.apply');
    Route::get('/my-applications', [InternshipController::class, 'myApplications'])->name('applications.my');
    Route::get('/cv/view/{filename}', [InternshipController::class, 'viewCv'])->name('cv.view');
    Route::delete('/applications/{id}', [InternshipController::class, 'destroyApplication'])->name('applications.destroy');




    //for nav bar
    Route::get('/form', [InternshipController::class, 'view'])->name('form.view');
    Route::get('/about', [InternshipController::class, 'about'])->name('about.view');
    Route::get('/contact', [InternshipController::class, 'contact'])->name('contact.view');
    Route::get('/search-internships', [InternshipController::class, 'searchInternships'])->name('search.internships');


    //for footer
    Route::get('/community', [InternshipController::class, 'community'])->name('community.view');
    Route::get('/services', [InternshipController::class, 'services'])->name('services.view');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
