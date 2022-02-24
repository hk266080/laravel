<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\login;

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

Route::get('/', [HomeController::class,'home']);
Route::get('/service/{id}',[HomeController::class,'service_detail']);
//admin dashboard

Route::group(['middleware' => 'preventbackhistory'], function () {
    	Route::get('admin',[AdminController::class,'dashboard']);
    	Route::get('admin/login',[AdminController::class,'login'] );
	    Route::get('admin',[AdminController::class,'dashboard']);
        Route::get('admin/logout',[AdminController::class,'logout'] );
        Route::post('admin/login',[AdminController::class,'check_login'] );
        //testimonial
        Route::get('admin/testimonial',[AdminController::class,'testimonials']);
        Route::get('admin/testimonial/{id}/delete',[AdminController::class,'destroy_testimonial']);
        // RoomType Routes
        Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);
		Route::resource('admin/roomtype',RoomtypeController::class);
		// Room
		Route::get('admin/rooms/{id}/delete',[RoomController::class,'destroy']);
		Route::resource('admin/rooms',RoomController::class);
		// Customer
		Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);
		Route::resource('admin/customer',CustomerController::class);
		// Delete Image
		Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);
		// Department
		Route::get('admin/department/{id}/delete',[StaffDepartment::class,'destroy']);
		Route::resource('admin/department',StaffDepartment::class);
		
			// Staff CRUD
		Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
		Route::resource('admin/staff',StaffController::class);
		// Booking
		Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy']);
		Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms']);
		Route::resource('admin/booking',BookingController::class);
		//services
		Route::resource('admin/service',ServiceController::class);
		Route::get('admin/service/{id}/delete',[ServiceController::class,'destroy']);
    });
		
    
Route::group(['middleware' => 'web'], function () {
	
        Route::get('booking',[BookingController::class,'front_booking']);
	 });
	


//Cstomer login
Route::get('login',[CustomerController::class,'login'] );
Route::post('customer/login',[CustomerController::class,'customer_login'] );
Route::get('register',[CustomerController::class,'register'] );
Route::get('logout',[CustomerController::class,'logout']);
//Customer Booking



Route::get('customer/addtestimonial',[HomeController::class,'add_testimonials']);
Route::post('customer/savetestimonial',[HomeController::class,'save_testimonials']);

Route::get('/contactus',[PageController::class,'contactus']);
Route::get('/aboutus',[PageController::class,'aboutus']);
Route::post('/savecontactus',[PageController::class,'save_contactus']);
Route::get('/check',[login::class,'check']);

Route::get('booking/success',[BookingController::class,'booking_payment_success']);
Route::get('booking/fail',[BookingController::class,'booking_payment_fail']);