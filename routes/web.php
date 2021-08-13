<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
use Illuminate\Support\Facades\Route;
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['prefix'=>'frontend'], function (){
    //front end controllers that don't require login

    Route::get(
        '/',[\App\Http\Controllers\FrontendController::class,'index']
    );
    Route::get('macros', [\App\Http\Controllers\FrontendController::class, 'macros'])->name('macros');

    Route::get('/check/finish', 'Install\CheckController@finish')->name('check.finish');

// contact us
    Route::get('/contact-us', 'ContactController@index')->name('contact.index');
    Route::post('/contact-us/send', 'ContactController@sendMail')->name('contact.send');

// courses
    Route::get('/courses', 'CourseController@getCourses')->name('course.get');
    Route::get('/courses/tag/{tag}', 'CourseController@getCourses')->name('course.tag.get');

// set a cookie if there is a ref_id attached to the request
    Route::get('/courses/{id}/learn', 'CourseController@show')->name('course.show')->middleware('affiliateCookie');

// course search
    Route::get('/search/courses', 'SearchController@autocompleteCourse');
    Route::get('/search/authors', 'SearchController@autocompleteAuthor');


//course review
    Route::get('/courses/{course}/reviews', 'User\ReviewController@getReviews');

// lessons
    Route::get('/{course}/learn/{lesson}', 'LessonController@show')->name('lesson.show');

// course payment
    Route::get('/payment/course/{course}/checkout', 'Payments\StripePaymentController@checkout')->name('courses.checkout');
    Route::post('/courses/charge', 'Payments\StripePaymentController@charge')->name('courses.charge');
    Route::post('/courses/charge/paypal', 'Payments\PayPalPaymentController@charge')->name('courses.charge.paypal');
    Route::get('/courses/charge/paypal', 'Payments\PayPalPaymentController@paymentStatus')->name('courses.charge.paypal.status');
    Route::post('/courses/charge/razorpay', 'Payments\RazorpayPaymentController@charge')->name('courses.charge.razorpay');

    Route::post('/courses/charge/braintree', 'Payments\BraintreeController@charge')->name('courses.charge.braintree');
    Route::post('/courses/charge/omise', 'Payments\OmisePaymentController@charge')->name('courses.charge.omise');


// site pages
    Route::get('/page/{page}', 'BlogController@showPage')->name('pages.show');
    Route::get('/blog', 'BlogController@getPosts')->name('blog.index');
    Route::get('/blog/category/{category}', 'BlogController@getPostsByCategory')->name('blog.category.index');
    Route::get('/blog/{blog}', 'BlogController@showPost')->name('posts.show');

// coupon
    Route::post('/courses/coupon', 'Payments\StripePaymentController@applyCoupon')->name('course.coupon.apply');

// user's public profile page
    Route::get('/user/{user}', 'ProfileController@show')->name('user.public.profile');
});
