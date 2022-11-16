<?php

use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\SiteController::class, 'indexview'])->name('home');
Auth::routes();

Route::get('/{id}', [App\Http\Controllers\SiteController::class, 'checkurl']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/faq', [App\Http\Controllers\SiteController::class, 'faq']);
Route::get('/why-tamwilly', [App\Http\Controllers\SiteController::class, 'why']);
Route::get('/profile', [App\Http\Controllers\SiteController::class, 'profile']);
Route::POST('/updateprofile', [App\Http\Controllers\SiteController::class, 'updateprofile']);
Route::get('/service/{id}', [App\Http\Controllers\SiteController::class, 'service']);
Route::get('/viewservice/{id}', [App\Http\Controllers\SiteController::class, 'viewservice']);


Route::POST('/submitquote', [App\Http\Controllers\SiteController::class, 'submitquote']);
Route::POST('/submitcontactus', [App\Http\Controllers\SiteController::class, 'submitcontactus']);
Route::POST('/insertchatmessage', [App\Http\Controllers\SiteController::class, 'insertchatmessage']);



Route::POST('/insertemailfornewsletter',[App\Http\Controllers\SiteController::class, 'insertemailfornewsletter']);


Route::get('/privacy-policy', [App\Http\Controllers\SiteController::class, 'privacypolicy']);
Route::get('/terms-nd-condition', [App\Http\Controllers\SiteController::class, 'termscondition']);
Route::get('/servicedetails/{id}', [App\Http\Controllers\SiteController::class, 'servicedetails']);

// Admin Routes
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/admin/addnewservice',[App\Http\Controllers\AdminController::class, 'addnewservice']);
Route::get('/admin/allservices',[App\Http\Controllers\AdminController::class, 'allservices']);


Route::get('/admin/addfaq',[App\Http\Controllers\AdminController::class, 'addfaq']);
Route::get('/admin/allfaq',[App\Http\Controllers\AdminController::class, 'allfaq']);

Route::POST('/addnewtechnology',[App\Http\Controllers\AdminController::class, 'addnewtechnology']);
Route::get('/edittechnology/{id}',[App\Http\Controllers\AdminController::class, 'edittechnology']);
Route::POST('/updatetechnology',[App\Http\Controllers\AdminController::class, 'updatetechnology']);


// CMS Admin
Route::get('/admin/homepagecms',[App\Http\Controllers\AdminController::class, 'homepagecms']);
Route::get('/admin/whyussarcksolution',[App\Http\Controllers\AdminController::class, 'whyussarcksolution']);
// Testimonial Admin
Route::get('/admin/addtestimonials',[App\Http\Controllers\AdminController::class, 'addtestimonials']);
Route::get('/admin/viewtestimonials',[App\Http\Controllers\AdminController::class, 'viewtestimonials']);
// Website Users Admin
Route::get('/admin/websiteusers',[App\Http\Controllers\AdminController::class, 'websiteusers']);
Route::get('/admin/adminusers',[App\Http\Controllers\AdminController::class, 'adminusers']);
Route::get('/admin/addadminusers',[App\Http\Controllers\AdminController::class, 'addadminusers']);
// Site Settings Routs Admin
Route::POST('/updatecontactdetails',[App\Http\Controllers\AdminController::class, 'updatecontactdetails']);
Route::POST('/updatesocialmedialinks',[App\Http\Controllers\AdminController::class, 'updatesocialmedialinks']);
Route::POST('/updatefootertext',[App\Http\Controllers\AdminController::class, 'updatefootertext']);
// All Site URLs Admin
Route::get('/admin/websiteurls',[App\Http\Controllers\AdminController::class, 'websiteurls']);
Route::get('/admin/editurl/{id}',[App\Http\Controllers\AdminController::class, 'editurl']);
Route::get('/updatsiteurl',[App\Http\Controllers\AdminController::class, 'updatsiteurl']);
// ALL Countries List Admin
Route::get('/admin/allcountries',[App\Http\Controllers\AdminController::class, 'allcountries']);
// Blogs Admin
Route::get('/admin/addblog',[App\Http\Controllers\AdminController::class, 'addblog']);
Route::get('/admin/addblogcategory',[App\Http\Controllers\AdminController::class, 'addblogcategory']);
Route::get('/admin/addblogtags',[App\Http\Controllers\AdminController::class, 'addblogtags']);
Route::get('/admin/allblogs',[App\Http\Controllers\AdminController::class, 'allblogs']);
Route::get('/admin/editblog/{id}',[App\Http\Controllers\AdminController::class, 'editblog']);
Route::get('/getblogcategory/{id}',[App\Http\Controllers\AdminController::class, 'getblogcategory']);
Route::get('/getblogtags/{id}',[App\Http\Controllers\AdminController::class, 'getblogtags']);
Route::POST('/createblog',[App\Http\Controllers\AdminController::class, 'createblog']);
Route::POST('/createblogcategory',[App\Http\Controllers\AdminController::class, 'createblogcategory']);
Route::POST('/createblogtags',[App\Http\Controllers\AdminController::class, 'createblogtags']);
Route::POST('/updateblogtags',[App\Http\Controllers\AdminController::class, 'updateblogtags']);
Route::POST('/updateblogcategory',[App\Http\Controllers\AdminController::class, 'updateblogcategory']);
Route::POST('/updateblog',[App\Http\Controllers\AdminController::class, 'updateblog']);
Route::POST('/updateblogimage',[App\Http\Controllers\AdminController::class, 'updateblogimage']);
Route::get('/admin/leavechatbox',[App\Http\Controllers\AdminController::class, 'leavechatbox']);


// Store
Route::get('/admin/addstorecategory',[App\Http\Controllers\AdminController::class, 'addstorecategory']);
Route::POST('/createstorecategory',[App\Http\Controllers\AdminController::class, 'createstorecategory']);
Route::get('/getstorecategory/{id}',[App\Http\Controllers\AdminController::class, 'getstorecategory']);
Route::POST('/updatestorecategory',[App\Http\Controllers\AdminController::class, 'updatestorecategory']);

Route::get('/admin/addstoretags',[App\Http\Controllers\AdminController::class, 'addstoretags']);
Route::POST('/createstoretags',[App\Http\Controllers\AdminController::class, 'createstoretags']);
Route::get('/getstoretag/{id}',[App\Http\Controllers\AdminController::class, 'getstoretag']);
Route::POST('/updatestoretag',[App\Http\Controllers\AdminController::class, 'updatestoretag']);

Route::get('/admin/addproduct',[App\Http\Controllers\AdminController::class, 'addproduct']);
Route::POST('/createproduct',[App\Http\Controllers\AdminController::class, 'createproduct']);


Route::get('/admin/websitesettings',[App\Http\Controllers\AdminController::class, 'websitesettings']);
Route::get('/admin/quoterequests',[App\Http\Controllers\AdminController::class, 'quoterequests']);
Route::get('/viewfundingrequestoffer/{id}',[App\Http\Controllers\AdminController::class, 'viewfundingrequestoffer']);

Route::get('/admin/contactrequests',[App\Http\Controllers\AdminController::class, 'contactrequests']);
Route::get('/viewcontactrequests/{id}',[App\Http\Controllers\AdminController::class, 'viewcontactrequests']);


Route::get('/allsubservices',[App\Http\Controllers\AdminController::class, 'allsubservices']);

Route::get('/admin/privacypolicyadmin',[App\Http\Controllers\AdminController::class, 'privacypolicyadmin']);
Route::get('/admin/termsandconditionadmin',[App\Http\Controllers\AdminController::class, 'termsandconditionadmin']);



Route::get('/addadvertisement',[App\Http\Controllers\AdminController::class, 'addadvertisement']);
Route::get('/alladvertisement',[App\Http\Controllers\AdminController::class, 'alladvertisement']);
// Admin Routes Insert Data
 
Route::POST('/createservice',[App\Http\Controllers\AdminController::class, 'createnewservice']);
Route::POST('/createnewcategory',[App\Http\Controllers\AdminController::class, 'createnewcategory']);
Route::POST('/createquestions',[App\Http\Controllers\AdminController::class, 'createquestions']);
Route::POST('/updatewhy',[App\Http\Controllers\AdminController::class, 'updatewhy']);
Route::POST('/createtestimonial',[App\Http\Controllers\AdminController::class, 'createtestimonial']);
Route::POST('/createsubservice',[App\Http\Controllers\AdminController::class, 'createsubservices']);





Route::POST('/addnewadmin',[App\Http\Controllers\AdminController::class, 'addnewadmin']);
Route::POST('/insertpolicy',[App\Http\Controllers\AdminController::class, 'insertpolicy']);
Route::POST('/insertterms',[App\Http\Controllers\AdminController::class, 'insertterms']);
Route::POST('/createadvertisement',[App\Http\Controllers\AdminController::class, 'createadvertisement']);


Route::get('/mail',[App\Http\Controllers\AdminController::class, 'mail']);



// Admin routes Delete Data
Route::get('/deletetestimonial/{id}',[App\Http\Controllers\AdminController::class, 'deletetestimonial']);
Route::get('/deletefinancingtype/{id}',[App\Http\Controllers\AdminController::class, 'deletefinancingtype']);
Route::get('/deleteeservice/{id}',[App\Http\Controllers\AdminController::class, 'deleteeservice']);
Route::get('/delteadvertisement/{id}',[App\Http\Controllers\AdminController::class, 'delteadvertisement']);


// Admin Edit Data Routes
Route::get('/edittestimonial/{id}',[App\Http\Controllers\AdminController::class, 'edittestimonial']);
Route::get('/edituser/{id}',[App\Http\Controllers\AdminController::class, 'edituser']);
Route::get('/editservices/{id}',[App\Http\Controllers\AdminController::class, 'editservice']);
Route::get('/editcountry/{id}',[App\Http\Controllers\AdminController::class, 'editcountry']);
Route::get('/editadvertisements/{id}',[App\Http\Controllers\AdminController::class, 'editadvertisements']);
 

Route::POST('/updateotification',[App\Http\Controllers\AdminController::class, 'updateotification']);
Route::POST('/updatecountry',[App\Http\Controllers\AdminController::class, 'updatecountry']);
Route::POST('/updatechildservice',[App\Http\Controllers\AdminController::class, 'updatechildservice']);
Route::POST('/updateuser',[App\Http\Controllers\AdminController::class, 'updateuser']);
Route::POST('/updatehomepage',[App\Http\Controllers\AdminController::class, 'updatehomepage']);

Route::POST('/updateservice',[App\Http\Controllers\AdminController::class, 'updateservice']);
Route::POST('/updateserviceimage',[App\Http\Controllers\AdminController::class, 'updateserviceimage']);
Route::POST('/updatebannerimage',[App\Http\Controllers\AdminController::class, 'updatebannerimage']);



Route::POST('/updatefaq',[App\Http\Controllers\AdminController::class, 'updatefaq']);
Route::POST('/updateadvertisement',[App\Http\Controllers\AdminController::class, 'updateadvertisement']);
Route::POST('/updateadvertiesementimages',[App\Http\Controllers\AdminController::class, 'updateadvertiesementimages']);
Route::POST('/updatetestimonialshortdescription',[App\Http\Controllers\AdminController::class, 'updatetestimonialshortdescription']);
Route::POST('/updateservicesshortdescription',[App\Http\Controllers\AdminController::class, 'updateservicesshortdescription']);
Route::POST('/updatetestimonialimage',[App\Http\Controllers\AdminController::class, 'updatetestimonialimage']);
Route::POST('/updatetestimonial',[App\Http\Controllers\AdminController::class, 'updatetestimonial']);

Route::POST('/updatemetatagsenglish',[App\Http\Controllers\AdminController::class, 'updatemetatagsenglish']);
Route::POST('/updatemetatagsarabic',[App\Http\Controllers\AdminController::class, 'updatemetatagsarabic']);

// Ajax Routes
Route::get('/changestatus/{id}/{table}',[App\Http\Controllers\AdminController::class, 'changestatus']);
Route::get('/getchildservices/{id}',[App\Http\Controllers\AdminController::class, 'getchildservices']);
Route::get('/editfrequentlyquestion/{id}',[App\Http\Controllers\AdminController::class, 'editfrequentlyquestion']);