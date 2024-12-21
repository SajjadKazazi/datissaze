<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('home');
//projects

Route::get('/pages/{slug}',[\App\Http\Controllers\Front\PageController::class,'get'])->name('front.single.pages');

Route::get('/teams/{slug}',[\App\Http\Controllers\Front\StaffCategoryController::class,'get'])->name('front.index.team');

Route::get('/projects',[\App\Http\Controllers\Front\PortfolioController::class,'index'])->name('front.index.projects');
Route::get('/projects/{slug}',[\App\Http\Controllers\Front\PortfolioController::class,'get'])->name('front.single.projects');

Route::get('/services',[\App\Http\Controllers\Front\ServiceController::class,'index'])->name('front.index.services');
Route::get('/services/{slug}',[\App\Http\Controllers\Front\ServiceController::class,'get'])->name('front.single.services');


Route::get('/news',[\App\Http\Controllers\Front\NewsController::class,'index'])->name('front.index.news');
//
Route::get('news/{slug}', [\App\Http\Controllers\Front\NewsController::class, 'get'])->name('front.single.news');

Route::get('/articles',[\App\Http\Controllers\Front\ArticleController::class,'index'])->name('front.index.articles');
//
Route::get('articles/{slug}', [\App\Http\Controllers\Front\ArticleController::class, 'get'])->name('front.single.articles');

//Route::get('/news/category/{slug}',[\App\Http\Controllers\Front\CategoryNewsController::class,'single'])->name('front.single.news.category');

Route::get('/contact',[\App\Http\Controllers\Front\ContactController::class , 'view'])->name('front.contact.view');
Route::post('/contact',[\App\Http\Controllers\Front\ContactController::class , 'store'])->name('front.contact.store');

Route::get('/resume',[\App\Http\Controllers\Front\ResumeController::class , 'view'])->name('front.resume.view');
Route::post('/resume',[\App\Http\Controllers\Front\ResumeController::class , 'store'])->name('front.resume.store');


Route::get('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin_login');
Route::post('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'post_login'])->name('admin_login_post');


Route::get('search',[\App\Http\Controllers\Front\SearchController::class,'search'])->name('search');

require __DIR__ . '/auth.php';

Route::get('/clear-cache', function () {
//    if(\auth()->id() == 1) {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";

});
Route::name('admin.')->prefix('admin')->middleware(['role:admin'])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin_dashboard');
    Route::get('file-manager', [\App\Http\Controllers\Admin\DashboardController::class, 'fileManager'])->name('admin_file_manager');

    //sliders
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    //cooperators
    Route::resource('cooperators', \App\Http\Controllers\Admin\CooperatorController::class);
    //portfolios
    Route::resource('portfolios', \App\Http\Controllers\Admin\PortfolioController::class);

    Route::resource('news/categories', \App\Http\Controllers\Admin\CategoryNewsController::class)->names('news.categories');

    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);

    Route::resource('articles/categories', \App\Http\Controllers\Admin\CategoryArticlesController::class)->names('articles.categories');

    Route::resource('articles', \App\Http\Controllers\Admin\ArticlesController::class);



    //services
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);

    Route::resource('staffs/categories', \App\Http\Controllers\Admin\StaffCategoryController::class,['as' => 'Staffs']);

    //staffs
    Route::resource('staffs', \App\Http\Controllers\Admin\StaffController::class);

    //contacts
    Route::get('contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::delete('contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy']);

    //resumes
    Route::get('resumes', [\App\Http\Controllers\Admin\ResumeController::class, 'index'])->name('resumes.index');
    Route::post('resumes/download/{resume}', [\App\Http\Controllers\Admin\ResumeController::class, 'download'])->name('resumes.download');
    Route::post('resumes/download/pic/{resume}', [\App\Http\Controllers\Admin\ResumeController::class, 'download_pic'])->name('resumes.download.pic');

    Route::delete('resumes/{resume}', [\App\Http\Controllers\Admin\ResumeController::class, 'destroy']);

    //pages
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);

    //menus

    Route::resource('menus', \App\Http\Controllers\Admin\MenuController::class);

    ///settings

    Route::get('/settings/general', [\App\Http\Controllers\Admin\SettingController::class, 'general_settings'])->name('general_settings');
    Route::post('/settings/general', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('general_settings_save');

    Route::get('/settings/mainPage', [\App\Http\Controllers\Admin\SettingController::class, 'mainPage'])->name('mainPage_settings');
    Route::post('/settings/mainPage', [\App\Http\Controllers\Admin\SettingController::class, 'update_mainPage'])->name('mainPage_settings_save');

    Route::get('/settings/communication', [\App\Http\Controllers\Admin\SettingController::class, 'communication'])->name('communication_settings');
    Route::post('/settings/communication', [\App\Http\Controllers\Admin\SettingController::class, 'update_communication'])->name('communication_settings_save');

    Route::get('/settings/DefaultText', [\App\Http\Controllers\Admin\SettingController::class, 'DefaultText'])->name('DefaultText_settings');
    Route::post('/settings/DefaultText', [\App\Http\Controllers\Admin\SettingController::class, 'DefaultText_communication'])->name('communication_DefaultText_save');

    //news
});
Route::get('pass',function(){
    dd(bcrypt('Mina@2024#'));
});
