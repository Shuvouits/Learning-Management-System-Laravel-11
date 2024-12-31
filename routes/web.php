<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminInstructorController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\instructor\CourseController;
use App\Http\Controllers\instructor\CourseSectionController;
use App\Http\Controllers\instructor\InstructorController;
use App\Http\Controllers\instructor\InstructorProfileController;
use App\Http\Controllers\instructor\LectureController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);

Route::get('/course-details/{slug}', [FrontendController::class, 'view'])->name('course-details');
Route::get('/category/{slug}', [FrontendController::class, 'courseCategory'])->name('course-category');
Route::get('/course/{category}/{subcategory}', [FrontendController::class, 'courseSubcategory'])->name('course-subcategory');
Route::get('/all-category', [FrontendController::class, 'allCategory'])->name('all-category');

Route::get('/instructor/{name}/{id}', [FrontendController::class, 'instructor'])->name('instructor');

/* wishlist controller  */

Route::get('/wishlist/all', [WishlistController::class, 'allWishlist']);

Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist']);

/* Cart Controller */
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/all', [CartController::class, 'cartAll']);
Route::get('/fetch/cart', [CartController::class, 'fetchCart']);
Route::post('/remove/cart', [CartController::class, 'removeCart']);


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  */



/* Admin Route   */


Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');



Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'destroy'])
    ->name('logout');

    /*  control Profile */

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [ProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [ProfileController::class, 'passwordSetting'])->name('passwordSetting');

    /*  control Category & Subcategory  */

    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);

    /* control instructor  */
    Route::resource('instructor', AdminInstructorController::class);
    Route::post('/update-status', [AdminInstructorController::class, 'updateStatus'])->name('instructor.status');
    Route::get('/instructor-active-list', [AdminInstructorController::class, 'instructorActive'])->name('instructor.active');







});

/*   Instructor Route  */

Route::get('/instructor/login', [InstructorController::class, 'login'])->name('instructor.login');
Route::get('/instructor/register', [InstructorController::class, 'register'])->name('instructor.register');
Route::post('/instructor/register', [InstructorController::class, 'create'])->name('instructor.register');

Route::middleware(['auth', 'verified', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', [InstructorController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [InstructorController::class, 'destroy'])
        ->name('logout');

    Route::get('/profile', [InstructorProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [InstructorProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [InstructorProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [InstructorProfileController::class, 'passwordSetting'])->name('passwordSetting');

    Route::resource('course', CourseController::class);
    Route::get('/get-subcategories/{categoryId}', [CategoryController::class, 'getSubcategories']);

    Route::resource('course-section', CourseSectionController::class);
    Route::resource('lecture', LectureController::class);

   // Route::get('/course-section/{id}', [CourseSectionController::class, 'index'])->name('course-section');

});

Route::middleware(['auth', 'verified', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [UserController::class, 'destroy'])
    ->name('logout');

    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [UserProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [UserProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [UserProfileController::class, 'passwordSetting'])->name('passwordSetting');

    /* Wishlist controller */

    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist-data', [WishlistController::class, 'getWishlist']);
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');


});


/*

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});  */

require __DIR__.'/auth.php';
