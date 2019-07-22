<?php
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>em';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Config Clear:
Route::get('/config-clear', function() {
    $exitCode = Artisan::call('config:clear');
    return '<h1>Config Cleared</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
// Website
Route::get('/', ['uses' => 'HomeController@index']);
Route::get('/gallery/{id}/view', 'HomeController@gallery_detail')->name('gallery_detail');
Route::get('getDataSlideshow', 'HomeController@getDataSlideshow');

// Account
Route::get('/login', ['uses' => 'AdminController@index'])->name('login');
Route::post('/doLogin', ['uses' => 'AdminController@doLogin']);
Route::get('/register', ['uses' => 'AdminController@register'])->name('register');
Route::post('/doRegister', ['uses' => 'AdminController@doRegister']);

Route::get('/registration/activate/{code}', [
    'as' => 'activate', 'uses' => 'PPDBController@activate'
]);


// API
Route::get('/getStudentData', ['uses' => 'StudentController@getStudentData']);
Route::get('getAttendanceData/{id}/{date}', ['uses' => 'AttendanceController@getAttendanceData']);


// Auth middleware
Route::group(['middleware' => 'auth'], function() {

    Route::get('/app', ['uses' => 'AdminController@app'])->name('app');
    Route::get('/dashboard', ['uses' => 'AdminController@dashboard'])->name('dashboard');
    Route::get('/view_dashboard', ['uses' => 'AdminController@view_dashboard'])->name('view_dashboard');
    Route::get('/doLogout', ['uses' => 'AdminController@doLogout']);


    Route::group(['middleware' => 'admin'], function(){
        Route::post('/update_zooq/{id}', ['uses' => 'ZooQController@update']);
        Route::post('/update_seo/{id}', ['uses' => 'ZooQController@update_seo']);

        // zooq
        Route::prefix('zooq')->group(function () {
            Route::get('profile', ['uses' => 'ZooQController@index'])->name('profile');
            Route::get('foundation', ['uses' => 'ZooQController@foundation'])->name('foundation');
            Route::get('seo', ['uses' => 'ZooQController@seo'])->name('seo');

            Route::get('view_profile', ['uses' => 'ZooQController@view_zooq'])->name('view_profile');
            Route::get('view_foundation', ['uses' => 'ZooQController@view_foundation'])->name('view_foundation');
            Route::get('view_seo', ['uses' => 'ZooQController@view_seo'])->name('view_seo');
        });
     
        // Gallery
        Route::prefix('gallery')->group(function () {
            Route::prefix('slideshow')->group(function () {
                Route::get('edit/{id}', ['uses' => 'GalleryController@edit_slideshow']);
                Route::post('store', ['uses' => 'GalleryController@add_slideshow']);
                Route::post('update/{id}', ['uses' => 'GalleryController@update_slideshow']);
                Route::delete('delete/{id}', ['uses' => 'GalleryController@delete_slideshow']);
            });
            Route::get('/gallery', ['uses' => 'GalleryController@showGallery']);
            Route::get('gallery/edit/{id}', ['uses' => 'GalleryController@edit_gallery']);
            Route::post('gallery/store', ['uses' => 'GalleryController@add_gallery']);
            Route::post('gallery/update/{id}', ['uses' => 'GalleryController@update_gallery']);
            Route::delete('gallery/delete/{id}', ['uses' => 'GalleryController@delete_gallery']);
            Route::get('slideshow', ['uses' => 'GalleryController@index']);
            Route::get('view_slideshow', ['uses' => 'GalleryController@view_slideshow'])->name('view_slideshow');
            Route::get('view_gallery', ['uses' => 'GalleryController@view_gallery'])->name('view_gallery');
        });

        // social media
        Route::group(['prefix' => 'socmed'], function () {
            Route::get('/socmed', ['uses' => 'SocialMediaController@index']);
            Route::get('/view_socmed', ['uses' => 'SocialMediaController@view_socmed']);

            Route::post('update_status/{id}', ['uses' => 'SocialMediaController@update_status']);
            Route::post('update_link/{id}', ['uses' => 'SocialMediaController@update_link']);

            Route::get('edit/{id}', ['uses' => 'SocialMediaController@edit']);      
        });        
    });

    // Question
    Route::get('view_question', ['uses' => 'QuestionController@viewCourse']);
    Route::group(['prefix' => 'question'], function () {
        Route::get('/', ['uses' => 'QuestionController@index']);
        Route::get('detail/{id}', ['uses' => 'QuestionController@detail_course']);
        Route::group(['middleware' => 'admin'], function(){
            Route::post('store', ['uses' => 'QuestionController@store']);
            Route::get('edit/{id}', ['uses' => 'QuestionController@edit']);
            Route::post('update/{id}', ['uses' => 'QuestionController@update']);
            Route::delete('delete/{id}', ['uses' => 'QuestionController@delete']);    

            Route::post('detail/store/{id}', ['uses' => 'QuestionController@store_detail']);
            Route::get('detail/edit/{id}', ['uses' => 'QuestionController@edit']);
            Route::post('detail/update/{id}', ['uses' => 'QuestionController@update']);
            Route::delete('detail/delete/{id}', ['uses' => 'QuestionController@delete_detail']);    
        });
    });
    
    // Quiz
    Route::get('view_quiz', ['uses' => 'QuizController@viewQuiz']);
    Route::group(['prefix' => 'quiz'], function () {
        Route::get('/', ['uses' => 'QuizController@showQuiz']);
        Route::post('store', ['uses' => 'QuizController@submitAnswer']);
        Route::get('/result/{score_result}', ['uses' => 'QuizController@viewScoreResult']);
    });
    

    // profile
    Route::prefix('user')->group(function () {
        Route::post('cover/update', 'ProfileController@changeCover');

        Route::prefix('profile')->group(function () {
            Route::get('edit', 'ProfileController@edit_profile');
            Route::get('view_edit', 'ProfileController@view_edit_profile');
            Route::post('update', 'ProfileController@update_profile');

            Route::get('change_password', 'ProfileController@changePassword');
            Route::get('view_change_password', 'ProfileController@viewChangePassword');
            Route::post('do_change_password', 'ProfileController@doChangePassword');

        });
    });


    // ZooQ User
    Route::get('/view_user', 'UserController@viewZooQUser');
    Route::prefix('user')->group(function () {

        Route::get('/', 'UserController@showZooQUser');
        
    });

    // Minimum Criteria of Mastery Learning
    // Route::get('/view_kkm', ['uses' => 'KKMController@viewKKM']);
    // Route::group(['prefix' => 'kkm'], function () {
    //     Route::get('/', ['uses' => 'KKMController@showKKM']);
    //     Route::post('store', ['uses' => 'KKMController@addKKM']);
    //     Route::delete('delete/{id}', ['uses' => 'KKMController@deleteKKM']);  
    //     Route::get('edit/{id}', ['uses' => 'KKMController@editKKM']);
    //     Route::post('update/{course_id}', ['uses' => 'KKMController@updateKKM']);
    // }); 

});
