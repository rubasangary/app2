<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobsAdController;
use App\Http\Controllers\AdsMenuController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ImagePostController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SaveThisAdController;
use App\Http\Controllers\FrontendAdsController;
use App\Http\Controllers\sendMessageController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\Blogger\BlogController;
use App\Http\Controllers\UserHomePageController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Blogger\ForumController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\JobAdminController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminListingAdsController;
use App\Http\Controllers\Blogger\BloggerController;
use App\Http\Controllers\Blogger\CommentController;
use App\Http\Controllers\Admin\ForumAdminController;
use App\Http\Controllers\Admin\AdsCatogoryController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Blogger\ForumUserController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\JobSubCategoryController;

// route::middleware([
//     'auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function(){
//         route::get('user/dashboard', function(){
//             return view('user.dashboard');
//         })->name('dashboard');
//     });



Route::get('/', [BlogController::class, 'HomePage'])->name('home');

Route::get('auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('google-auth');
Route::get('auth/google/callback', [SocialLoginController::class, 'CallbackGoogle']);

Route::get('tamil-bloggers/{menuItem_slug}', [blogController::class, 'viewCategoryPost'])->name('category-post');
Route::get('tamil-bloggers/{category_slug}/{post_slug}', [blogController::class, 'viewPost'])->name('view-post');

// user info public view
Route::get('/{slug}/info', [SettingsController::class, 'viewUserInfo'])->name('userinfo-view');

//Cintact page
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
// Route::post('/contact', [ContactController::class, 'submit'])->middleware('throttle:contact')->name('contact.submit');
Route::middleware('throttle:contact', 'auth')->post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Forum
Route::get('/ஊர்-புதினம்', [ForumController::class, 'index'])->name('forum');
Route::get('/forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
Route::post('/ஊர்-புதினம்', [ForumController::class, 'store'])->name('forum.store')->middleware('auth');

Route::get('/user/ஊர்-புதினம்', [ForumUserController::class, 'userPage'])->name('forum.userPage')->middleware('auth');
Route::get('user/ஊர்-புதினம்/{forum}/edit', [ForumUserController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('user/ஊர்-புதினம்/{forum}', [ForumUserController::class, 'update'])->name('forum.update')->middleware('auth');
Route::get('/user/ஊர்-புதினம்/{forum}', [ForumUserController::class, 'userShow'])->name('forum.userShow')->middleware('auth', 'isUser');
Route::delete('/user/ஊர்-புதினம்/{id}', [ForumUserController::class, 'destroy'])->name('forum.user.destroy')->middleware('auth');

Route::post('user/{user}/follow', [FollowerController::class, 'follow'])->name('user.follow')->middleware('auth');
Route::post('user/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('user.unfollow')->middleware('auth');

// Forum comments
Route::post('/ஊர்-புதினம்/{forum}/comments', [CommentController::class, 'store'])->name('forum.comments.store')->middleware('auth');


// User
Route::prefix('user')->middleware(['auth', 'isUser'])->group (function () {

    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/account', [ProfileController::class, 'index'])->name('account');

    Route::get('ads/create', [AdvertisementController::class, 'create'])->name('user.create');
    Route::post('ads/store', [AdvertisementController::class, 'store']);
    Route::get('ads/display', [AdvertisementController::class, 'display'])->name('user.display');
    Route::get('edit/{id}', [AdvertisementController::class, 'edit'])->name('seller.edit');
    Route::put('ads/update/{id}', [AdvertisementController::class, 'update'])->name('ads.update');
    Route::delete('ads/{id}/delete', [AdvertisementController::class, 'destroy'])->name('ads.destroy');

    // Get pending ads in the user dashboard
    Route::get('ad-pending', [AdvertisementController::class, 'pendingAds'])->name('pending.ad');

    // Report this ad
    Route::post('/report-this-ad', [ComplainController::class, 'store'])->name('report.ad');

    //Save this ad + user dashboard
    Route::post('/ad/save', [SaveThisAdController::class, 'saveAd']);
    Route::post('/ad/remove', [SaveThisAdController::class, 'removeAd'])->name('ad.remove');
    Route::get('/saved-ads', [SaveThisAdController::class, 'getMyads'])->name('saved.ad');

    //Jobs listing for user
    Route::get('job-ad-form', [JobsAdController::class, 'create'])->name('jobs.form');
    Route::post('add-job/store', [JobsAdController::class, 'store']);
    Route::get('job-ad-display', [JobsAdController::class, 'index'])->name('jobs.display');
    Route::get('job-edit/{id}', [JobsAdController::class, 'edit'])->name('jobs.edit');
    Route::put('job/update/{id}', [JobsAdController::class, 'update'])->name('jobs.update');
    Route::delete('jobs/{id}/delete', [JobsAdController::class, 'destroy'])->name('jobs.destroy');

    //User pending job
    Route::get('job-pending', [JobsAdController::class, 'userPendingJobs'])->name('user.PendingJobs');

    // Settings
    Route::get('/settings', [SettingsController::class, 'settings'])->name('settings'); // profile
    Route::get('/edit-settings', [SettingsController::class, 'editSettings'])->name('edit-settings');
    Route::put('/update-socialLinks', [SettingsController::class, 'socialLinks'])->name('social-Links');
    Route::put('/update-personal-information', [SettingsController::class, 'personalInfo'])->name('personal-info');
    Route::get('/upload-image', [SettingsController::class, 'showUploadForm'])->name('showUploadForm');
    Route::post('/crop-image', [SettingsController::class, 'cropImageUploadAjax'])->name('crop-image');

});


Route::prefix('admin23')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin-dashboard', [DashboardController::class, 'index']);

//post Catogories
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/add-category', [CategoryController::class, 'create']);
Route::post('/add-category', [CategoryController::class, 'store']);
Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
Route::get('delete-category/{category_id}', [CategoryController::class, 'destory']);

//post routes
Route::get('posts', [PostController::class, 'index']);
Route::get('add-post', [PostController::class, 'create']);
Route::post('add-post', [PostController::class, 'store']);
Route::get('post/{post_id}', [PostController::class, 'edit']);
Route::put('update-post/{post_id}', [PostController::class, 'update']);
Route::get('delete-post/{post_id}', [PostController::class, 'destroy']);

//manage all posts
Route::get('all-posts', [AdminPostController::class, 'index'])->name('all-posts');
Route::get('pending-posts', [AdminPostController::class, 'pendingPosts'])->name('pending-posts');
Route::get('post-now/{id}', [AdminPostController::class, 'postNow'])->name('post-now');
Route::post('setFeaturedPost/{id}', [AdminPostController::class, 'featurePost'])->name('setFeaturedPost');
Route::delete('delete-post/{id}', [AdminPostController::class, 'destroy'])->name('delete-post');

// Users - New UserController made inside Admin folder
Route::get('users', [UserController::class, 'index']);
Route::get('user/{user_id}', [UserController::class, 'edit']);
Route::put('update-user/{user_id}', [UserController::class, 'update']);


Route::get('adscategory', [AdsCatogoryController::class, 'index']);
Route::get('add-adscategory', [AdsCatogoryController::class, 'create']);
Route::post('add-adscategory', [AdsCatogoryController::class, 'store']);
Route::get('edit-adscategory/{category_id}', [AdsCatogoryController::class, 'edit']);
Route::put('update-adscategory/{category_id}', [AdsCatogoryController::class, 'update']);
Route::get('delete-adscategory/{category_id}', [AdsCatogoryController::class, 'destroy']);


Route::get('subcategory', [SubcategoryController::class, 'index']);
Route::get('add-subcategory', [SubcategoryController::class, 'create']);
Route::post('add-subcategory', [SubcategoryController::class, 'store']);
Route::get('edit-subcategory/{subcategory_id}', [SubcategoryController::class, 'edit']);
Route::post('delete-subcategory/{subcategory_id}', [SubcategoryController::class, 'destroy']);
Route::put('update-subcategory/{subcategory_id}', [SubcategoryController::class, 'update']);


Route::get('childcategory', [ChildCategoryController::class, 'index']);
Route::get('add-childcategory', [ChildCategoryController::class, 'create']);
Route::post('add-childcategory', [ChildCategoryController::class, 'store']);
Route::post('delete-childcategory/{childcategory_id}', [ChildCategoryController::class, 'destroy']);
Route::get('edit-childcategory/{childcategory_id}', [ChildCategoryController::class, 'edit']);
Route::put('edit-childcategory/{childcategory_id}', [ChildCategoryController::class, 'update']);

//Jobs listing admin
Route::get('jobs-category', [JobCategoryController::class, 'index']);
Route::get('add-jobscategory', [JobCategoryController::class, 'create']);
Route::post('add-jobscategory', [JobCategoryController::class, 'store']);
Route::get('edit-jobscategory/{jobscategory_id}', [JobCategoryController::class, 'edit']);
Route::put('update-jobscategory/{jobscategory_id}', [JobCategoryController::class, 'update']);

Route::get('jobs-subcategory', [JobSubCategoryController::class, 'index']);
Route::get('add-jobsubcategory', [JobSubCategoryController::class, 'create']);
Route::post('add-jobsubcategory', [JobSubCategoryController::class, 'store']);
Route::get('edit-jobsubcategory/{jobsubcategory_id}', [JobSubCategoryController::class, 'edit']);
Route::put('update-jobsubcategory/{jobsubcategory_id}', [JobCategoryController::class, 'update']);

// Admin listing of all ads
Route::get('published-ads', [AdminListingAdsController::class, 'publishedAds'])->name('all.published.ads');
Route::get('unpublished-ads', [AdminListingAdsController::class, 'unpublishedAds'])->name('all.unpublished.ads');
Route::get('published-now/{id}', [AdminListingAdsController::class, 'publishNow'])->name('publish.now');

// Jobs Listings
Route::get('show-jobs', [JobAdminController::class, 'jobs'])->name('admin.showJobs');
Route::get('pending-jobs', [JobAdminController::class, 'pendingJobs'])->name('admin.pendingJobs');
Route::get('publish-job/{id}', [JobAdminController::class, 'publishJobNow'])->name('publish.job');

// Reported ads listing
Route::get('reported-ads', [ComplainController::class, 'reportedAds'])->name('all.reported.ads');
Route::post('reported-ads/{id}', [ComplainController::class, 'destroy'])->name('complain.delete');
Route::delete('remove-complain/{ad_id}', [ComplainController::class, 'remove'])->name('complain.remove');

// Forum Deletes
Route::get('/forum', [ForumAdminController::class, 'index'])->name('admin.forum');
Route::delete('/forum/{id}', [ForumAdminController::class, 'destroy'])->name('admin.forum.destroy');

});

// Frontend ads filter
Route::get('farmers-market/{subcategorySlug}', [FrontendAdsController::class, 'findSubcategoryFarm'])->name('farmersFilter');

Route::get('vehicles/{subcategorySlug}', [FrontendAdsController::class, 'findSubcategoryVehicles'])->name('vehiclesFilter');
Route::get('vehicle-sale/{id}/{Slug}', [FrontendAdsController::class, 'vehicleShow'])->name('vehicle');
Route::get('property/{subcategorySlug}', [FrontendAdsController::class, 'findSubcategoryProperty'])->name('propertyFilter');
Route::get('fashion/{subcategorySlug}', [FrontendAdsController::class, 'findSubcategoryFashion'])->name('fashionFilter');
Route::get('sportswear-and-equipments/{subcategorySlug}', [FrontendAdsController::class, 'findSubcategorySports'])->name('sportsFilter');
Route::get('phones-tablets-and-appliances/{subcategorySlug}', [FrontendAdsController::class, 'findSubcategoryElectronics'])->name('electronicsFilter');
Route::get('homeware/{subcategorySlug}', [FrontendAdsController::class, 'findSubcategoryHomeware'])->name('homewareFilter');

Route::get('/buy-and-sell-in-sri-lanka/{id}/{slug}', [FrontendAdsController::class, 'showUserProduct'])->name('product.show');

// Ads Menu
Route::get('farmers-market', [AdsMenuController::class, 'farmersMenu'])->name('farmers-market');
Route::get('vehicles', [AdsMenuController::class, 'vehiclesMenu'])->name('vehicles');
Route::get('property', [AdsMenuController::class, 'propertyMenu'])->name('property');
Route::get('fashion', [AdsMenuController::class, 'fashionMenu'])->name('fashion');
Route::get('sportswear-and-equipments', [AdsMenuController::class, 'sportsMenu'])->name('sports');
Route::get('phones-tablets-and-appliances', [AdsMenuController::class, 'electronicsMenu'])->name('electronics');
Route::get('homeware', [AdsMenuController::class, 'homewareMenu'])->name('homeware');


// Bloggers
Route::prefix('blog')->middleware(['auth', 'isBlogger'])->group(function () {

Route::get('/create-post', [BloggerController::class, 'writePost'])->name('blogger.create.post');
Route::get('/share-post', [BloggerController::class, 'sharePost'])->name('blogger.share.post');
Route::get('/view-post', [BloggerController::class, 'viewPost'])->name('blogger.view.posts');
Route::post('/write-post', [BloggerController::class, 'storePost']);
Route::post('/share-post', [BloggerController::class, 'storeSharedPost']);

//Image sharing
Route::get('/post-image', [ImagePostController::class, 'PostImage'])->name('post.image');
Route::post('/store-image', [ImagePostController::class, 'storeImage']);

});

// Messaging
Route::post('/send/message', [sendMessageController::class, 'store'])->middleware('auth');
Route::get('message', [sendMessageController::class, 'index'])->name('messages')->middleware('auth');
Route::get('/users', [sendMessageController::class, 'chatWithThisUser'])->middleware('auth');
Route::get('/message/user/{id}', [sendMessageController::class, 'showMessages'])->middleware('auth');
Route::post('/start-conversation', [sendMessageController::class, 'startConversation'])->middleware('auth');


//Jobs listing all users
Route::get('jobs-search-in-sri-lanka', [JobsController::class, 'jobSearch'])->name('srilanka.jobs');
Route::get('jobs-sri-lanka/{slug}', [JobsController::class, 'JobFilter'])->name('job.filter');
Route::get('job-search-sri-lanka/{id}', [JobsController::class, 'showJob'])->name('job.show');

// Show shared images
Route::get('/show-images', [ImagePostController::class, 'index'])->name('show.image');

// All users Home Page
Route::get('/{user:slug}', [UserHomePageController::class, 'showblogs'])->name('user.showblogs');
Route::get('/{user:slug}/ஊர்-புதினம்', [UserHomePageController::class, 'showforum'])->name('user.showforum');
Route::get('/{user:slug}/images', [UserHomePageController::class, 'showImage'])->name('user.showImage');
Route::get('/{user:slug}/products', [UserHomePageController::class, 'showProduct'])->name('user.showProduct');
Route::get('/{user:slug}/jobs', [UserHomePageController::class, 'userJobs'])->name('user.showJobs');



