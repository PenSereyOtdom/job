  
<?php

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

    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });

    Auth::routes(['verify' => true]);
   
    Route::get('/', 'User\HomeController@create');
    Route::get('/searchfilter', 'User\SearchFilterController@create');
        
    Route::get('/jobs', 'User\JobsController@jobs');
    Route::post('/jobs', 'User\JobsController@jobs');
    Route::get('/quick/{type}','User\JobsController@quickSearch');
    Route::get('/hotJobs', 'User\HotjobsController@hotJobs');
    Route::get('/jobDetail/{id}', 'User\JobDetailController@show');
    Route::get('/careerAdvise', 'User\CareerAdviseController@careerAdvise');
    Route::get('/careerAdvisePage', 'User\CareerAdvisePageController@careerAdvisePage');
    Route::get('/aboutUs', 'User\AboutUsController@aboutUs');
    Route::get('/contactUs', 'User\ContactUsController@contactUs');

// Route for change language
Route::get('locale/{locale}',function ($locale){
    Session::put('locale',$locale);
    return redirect()->back();
    /*This Link will add session of language when they click to change language*/
});

    //Job listing(Phaneth)
    Route::get('/jobDetail/{id}', 'User\JobDetailController@show');
    Route::post('/jobDetail/{id}', 'User\JobDetailController@store');

    Route::get('/recruiter', 'Companies\LandingPageController@landingPage');

    Route::get('reset-password/{token}','Auth\ForgotPasswordController@showPasswordResetForm')->name('check.token');

// Job seeker(user) Routes
Route::group(['middleware' => 'auth'], function(){

    Route::view('/home', 'user.home');
    Route::get('/verify', function () {
        return view('auth.verify');
    })->name('verify');
    Route::post('/verify', 'Auth\RegisterController@verify')->name('verify');

    // User Profile
    Route::get('profile', 'User\ProfileController@create');   
    Route::get('profile', 'User\ProfileController@profile');
    Route::post('profile/{profile}', 'User\ProfileController@update');
    
    // Change password user
    Route::get('setting','User\ProfileController@showChangePasswordForm');
    Route::post('setting','User\ProfileController@changePassword')->name('setting');

    // CV (User)
    Route::get('/cv', 'User\CvController@index');
    Route::get('/create/cv', 'User\CvController@create');
    Route::post('/create/cv', 'User\CvController@store');
    Route::post('/edit/cv/{id}', 'User\CvController@edit');
    Route::post('/update/cv/{id}', 'User\CvController@update');
    Route::delete('/cv/{id}', 'User\CvController@destroy');

    // Saved Job
    Route::get('savedJob', 'User\ProfileController@savedJob');
    
    // Applied Job
    Route::get('appliedJob', 'User\ProfileController@appliedJob');
    

    // Saved Job
    Route::post('/save/{id}', 'User\JobDetailController@save');

});

// Admin Routes

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');

Route::group(['middleware' => ['auth:admin']], function () {

    Route::view('/admin', 'admin.home');
    Route::get('/admin', 'Admin\HomeController@index');


    // Career Advice
    Route::get('/career', 'Admin\CareerController@index');
    Route::get('/create/career', 'Admin\CareerController@create');
    Route::post('/create/career', 'Admin\CareerController@store');
    Route::get('/career/edit/{id}', 'Admin\CareerController@edit');
    Route::post('/career/{id}', 'Admin\CareerController@update');
    Route::post('upload_image','Admin\CareerController@uploadImage')->name('upload');
    Route::delete('/career/{id}', 'Admin\CareerController@destroy');

    //Admin payment managerment
    Route::get('/payments', 'Admin\PaymentController@index');
    Route::post('/payment/edit/{id}', 'Admin\PaymentController@edit');
    Route::post('/payment/{id}', 'Admin\PaymentController@update');

    
    //Admin payment managerment
    Route::get('/service', 'Admin\ServicesController@index');
    Route::post('/service/edit/{id}', 'Admin\ServicesController@edit');
    Route::post('/service/{id}', 'Admin\ServicesController@update');

    
    //Admin Setting
    Route::resource('admin/setting', 'Admin\AdminSettingController');
    Route::get('admin/setting', 'Admin\AdminSettingController@index');
    Route::post('admin/setting/{setting}', 'Admin\AdminSettingController@update');
    Route::post('admin/setting/{setting}/edit', 'Admin\AdminSettingController@edit');

    // Change password admin    
    Route::get('settingTesting','Admin\AdminSettingController@showChangePasswordForm');
    Route::post('settingTesting','Admin\AdminSettingController@changePassword')->name('settingTesting');
    
    //Master Data
    Route::get('/master', 'Admin\MasterDataController@index');
    Route::get('/create/master', 'Admin\MasterDataController@create');
    Route::post('/create/master', 'Admin\MasterDataController@store');
    Route::post('/master/edit/{id}', 'Admin\MasterDataController@edit');
    Route::post('/master/{id}', 'Admin\MasterDataController@update');
    // Route::delete('/career/{id}', 'Admin\MasterDataController@destroy');

    // Verify Package
    Route::get('/packgeRequest', 'Admin\VerifyPackageController@index');
    Route::get('/verifyPackge/{id}', 'Admin\VerifyPackageController@show');
    Route::post('/verifyPackge/edit/{id}', 'Admin\VerifyPackageController@edit');
    Route::post('/verifyPackge/{id}', 'Admin\VerifyPackageController@update');
    
    // Recruiter Managerment
    Route::get('/candidateManagerment', 'Admin\CandidateManagermentController@index');
    Route::get('/candidateDetails/{id}', 'Admin\CandidateManagermentController@show');
    
    // Recruiter Managerment
    Route::get('/recruiterManagerment', 'Admin\RecruiterManagermentController@index');
    Route::get('/recruiterDetails/{id}', 'Admin\RecruiterManagermentController@show');


    //Mark Admin Notification as Read
    Route::get('/markasread', function () {
        auth()->user()->unreadNotifications->markAsRead();
    });

});    

    // Company Routes
    Route::get('/company', 'CompaniesController@index');
    Route::get('/verify', function () {
        return view('auth.verify');
    })->name('verify');
    Route::post('/verify', 'Auth\RegisterController@verify')->name('verify');

    Route::get('/register/company', 'Auth\RegisterController@showCompanyRegisterForm');
    Route::post('/register/company', 'Auth\RegisterController@createCompany');
    Route::get('/login/company', 'Auth\LoginController@showCompanyLoginForm');
    Route::post('/login/company', 'Auth\LoginController@companyLogin');

    Route::get('/careerListing', 'User\CareerListingController@careerListing');

Route::group(['middleware' => 'auth:company'], function () {

    Route::view('/company', 'companies.home');

    Route::get('/company', 'Companies\HomeController@index');


    //Job Post (Company)
    Route::get('/jobPost', 'Companies\JobPostController@index');
    Route::post('/jobPost/edit/{id}', 'Companies\JobPostController@edit');
    Route::post('/jobPost/{id}', 'Companies\JobPostController@update');
    Route::delete('/jobPost/{id}', 'Companies\JobPostController@destroy');
    Route::get('/jobPost/jobDetail/{id}', 'Companies\JobPostController@show');

    Route::get('/create/jobPost/{service_id}', 'Companies\JobPostController@create');
    Route::post('/create/jobPost', 'Companies\JobPostController@store');

    // Applied Candidate
    Route::get('/appliedCandidate', 'Companies\AppliedController@index');

    //Company Setting
    Route::resource('company/setting', 'Companies\CompaniesSettingController');
    Route::get('company/setting', 'Companies\CompaniesSettingController@index');
    Route::post('company/setting/{setting}', 'Companies\CompaniesSettingController@update');
    Route::post('company/setting/{setting}/edit', 'Companies\CompaniesSettingController@edit');

    // Change password company
    Route::get('testing','Companies\CompaniesSettingController@showChangePasswordForm');
    Route::post('testing','Companies\CompaniesSettingController@changePassword')->name('testing');

    // Candidate Report - Applied (Company)
    Route::get('/candidateReport/applied', 'Companies\AppliedController@create');
    Route::get('/candidateReport/applied', 'Companies\AppliedController@index');
    Route::get('/userDetail/{id}', 'Companies\UserDetailController@show');
    Route::post('/userDetail/{id}', 'Companies\UserDetailController@update');

    // Our Service
    Route::get('/serviceListing', 'Companies\ServiceController@serviceListing');
    // Route::get('/serviceListing', 'Companies\ServiceController@edit');

    // Company Payment
    Route::get('/payment', 'Companies\PaymentController@index');

    Route::get('/basic/{service_id}', 'Companies\PaymentController@indexbasic');
    Route::post('/basic', 'Companies\PaymentController@storebasic');

    Route::get('/trail/{service_id}', 'Companies\PaymentController@indextrail');
    Route::post('/trail', 'Companies\PaymentController@storetrail');
    
    Route::get('/urgent/{service_id}', 'Companies\PaymentController@indexurgent');
    Route::post('/urgent', 'Companies\PaymentController@storeurgent');

    
    Route::get('/premium/{service_id}', 'Companies\PaymentController@indexpremium');
    Route::post('/premium', 'Companies\PaymentController@storepremium');

    // Why Us?
    Route::get('/whyUs', 'Companies\WhyUsController@index');

});
    