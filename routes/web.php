<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBahariController;
use App\Http\Controllers\AdminNonBahariController;
use App\Http\Controllers\AdminSeniBudayaController;
use App\Http\Controllers\AdminKulinerController;
use App\Http\Controllers\AdminKerajinanKreatifController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminPenginapanController;
use App\Http\Controllers\AdminForumController;
use App\Http\Controllers\AdminCommentController;

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('tampilan.landingpage');
    })->name('home');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.landingpage');
    });
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/bahari', [HomeController::class, 'bahari'])->name('bahari');
Route::get('/bahari/{id}', [HomeController::class, 'showbahari'])->name('showbahari');

Route::get('/nonbahari', [HomeController::class, 'nonbahari'])->name('nonbahari');
Route::get('/nonbahari/{id}', [HomeController::class, 'shownonbahari'])->name('shownonbahari');

Route::get('/kuliner', [HomeController::class, 'kuliner'])->name('kuliner');
Route::get('/kuliner/{id}', [HomeController::class, 'showkuliner'])->name('showkuliner');

Route::get('/senibudaya', [HomeController::class, 'senibudaya'])->name('senibudaya');
Route::get('/senibudaya/{id}', [HomeController::class, 'showsenibudaya'])->name('showsenibudaya');

Route::get('/kerajinan', [HomeController::class, 'kerajinan'])->name('kerajinan');
Route::get('/kerajinan/{id}', [HomeController::class, 'showkerajinan'])->name('showkerajinan');

Route::get('/penginapan', [HomeController::class, 'penginapan'])->name('penginapan');
Route::get('/penginapan/{id}', [HomeController::class, 'showpenginapan'])->name('showpenginapan');

Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::post('/kontak/send', [HomeController::class, 'sendEmail'])->name('kontak.send');

Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/twit', [HomeController::class, 'twit'])->name('twit');



// Forum routes

Route::get('forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('forum/create', [ForumController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('forum', [ForumController::class, 'store'])->name('forum.store');
Route::get('forum/{forum}/edit', [ForumController::class, 'edit'])->name('forum.edit');
Route::put('forum/{forum}', [ForumController::class, 'update'])->name('forum.update');
Route::post('/forum/{forum}/like', [LikeController::class, 'like'])->name('forum.like')->middleware('auth');
Route::post('/forums/{forum}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
// Admin routes


Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.landingpage');

    Route::get('user', [AuthController::class, 'user'])->name('user');

    Route::resource('user', AdminUserController::class)->only(['index', 'destroy']);

    Route::get('gallery', [AdminGalleryController::class, 'index'])->name('admin.gallery.index');
    Route::post('gallery', [AdminGalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('gallery/create', [AdminGalleryController::class, 'create'])->name('admin.gallery.create');
    Route::delete('gallery/{id}', [AdminGalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    Route::get('gallery/{id}/edit', [AdminGalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::put('gallery/{id}', [AdminGalleryController::class, 'update'])->name('admin.gallery.update');

    Route::get('bahari', [AdminBahariController::class, 'index'])->name('admin.bahari.index');
    Route::post('bahari', [AdminBahariController::class, 'store'])->name('admin.bahari.store');
    Route::get('admin/bahari/create', [AdminBahariController::class, 'create'])->name('admin.bahari.create');
    Route::delete('bahari/{id}', [AdminBahariController::class, 'destroy'])->name('admin.bahari.destroy');
    Route::get('bahari/{id}/edit', [AdminBahariController::class, 'edit'])->name('admin.bahari.edit');
    Route::put('bahari/{id}', [AdminBahariController::class, 'update'])->name('admin.bahari.update');

    Route::get('nonbahari', [AdminNonBahariController::class, 'index'])->name('admin.nonbahari.index');
    Route::post('nonbahari', [AdminNonBahariController::class, 'store'])->name('admin.nonbahari.store');
    Route::get('nonbahari/create', [AdminNonBahariController::class, 'create'])->name('admin.nonbahari.create');
    Route::delete('nonbahari/{id}', [AdminNonBahariController::class, 'destroy'])->name('admin.nonbahari.destroy');
    Route::get('nonbahari/{id}/edit', [AdminNonBahariController::class, 'edit'])->name('admin.nonbahari.edit');
    Route::put('nonbahari/{id}', [AdminNonBahariController::class, 'update'])->name('admin.nonbahari.update');

    Route::get('senibudaya', [AdminSeniBudayaController::class, 'index'])->name('admin.senibudaya.index');
    Route::post('senibudaya', [AdminSeniBudayaController::class, 'store'])->name('admin.senibudaya.store');
    Route::get('senibudaya/create', [AdminSeniBudayaController::class, 'create'])->name('admin.senibudaya.create');
    Route::delete('senibudaya/{id}', [AdminSeniBudayaController::class, 'destroy'])->name('admin.senibudaya.destroy');
    Route::get('senibudaya/{id}/edit', [AdminSeniBudayaController::class, 'edit'])->name('admin.senibudaya.edit');
    Route::put('senibudaya/{id}', [AdminSeniBudayaController::class, 'update'])->name('admin.senibudaya.update');

    Route::get('kuliner', [AdminKulinerController::class, 'index'])->name('admin.kuliner.index');
    Route::post('kuliner', [AdminKulinerController::class, 'store'])->name('admin.kuliner.store');
    Route::get('kuliner/create', [AdminKulinerController::class, 'create'])->name('admin.kuliner.create');
    Route::delete('kuliner/{id}', [AdminKulinerController::class, 'destroy'])->name('admin.kuliner.destroy');
    Route::get('kuliner/{id}/edit', [AdminKulinerController::class, 'edit'])->name('admin.kuliner.edit');
    Route::put('kuliner/{id}', [AdminKulinerController::class, 'update'])->name('admin.kuliner.update');
   
    Route::get('kerajinankreatif', [AdminKerajinanKreatifController::class, 'index'])->name('admin.kerajinankreatif.index');
    Route::post('kerajinankreatif', [AdminKerajinanKreatifController::class, 'store'])->name('admin.kerajinankreatif.store');
    Route::get('kerajinankreatif/create', [AdminKerajinanKreatifController::class, 'create'])->name('admin.kerajinankreatif.create');
    Route::delete('kerajinankreatif/{id}', [AdminKerajinanKreatifController::class, 'destroy'])->name('admin.kerajinankreatif.destroy');
    Route::get('kerajinankreatif/{id}/edit', [AdminKerajinanKreatifController::class, 'edit'])->name('admin.kerajinankreatif.edit');
    Route::put('kerajinankreatif/{id}', [AdminKerajinanKreatifController::class, 'update'])->name('admin.kerajinankreatif.update');

    Route::get('penginapan', [AdminPenginapanController::class, 'index'])->name('admin.penginapan.index');
    Route::post('penginapan', [AdminPenginapanController::class, 'store'])->name('admin.penginapan.store');
    Route::get('penginapan/create', [AdminPenginapanController::class, 'create'])->name('admin.penginapan.create');
    Route::delete('penginapan/{id}', [AdminPenginapanController::class, 'destroy'])->name('admin.penginapan.destroy');
    Route::get('penginapan/{id}/edit', [AdminPenginapanController::class, 'edit'])->name('admin.penginapan.edit');
    Route::put('penginapan/{id}', [AdminPenginapanController::class, 'update'])->name('admin.penginapan.update');

    Route::get('forums', [AdminForumController::class, 'index'])->name('admin.forum.index');
    Route::delete('forums/{id}', [AdminForumController::class, 'destroy'])->name('admin.forum.destroy');

    Route::get('comments', [AdminCommentController::class, 'index'])->name('admin.comment.index');
    Route::delete('comments/{id}', [AdminCommentController::class, 'destroy'])->name('admin.comment.destroy');
});