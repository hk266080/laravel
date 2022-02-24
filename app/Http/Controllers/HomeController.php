<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\RoomTypeImage;
use App\Models\Testimonial;

class HomeController extends Controller
{
  function home()
  {
   $services = Service::all();
   $roomTypes= RoomType::all();
   $testimonials= Testimonial::all();
   return view('home',['roomTypes'=>$roomTypes,'services'=>$services,'testimonials'=>$testimonials]);
  }
  function service_detail($id)
  {
   $services = Service::find($id);
   
        return view('servicedetail',['services'=>$services]);
  }
   function save_testimonials(Request $request)
  {
      $customerId=session('data')[0]->id;
        $data=new Testimonial;
        $data->customer_id=$customerId;
        $data->testi_cont=$request->testi_cont;
        $data->save();

        return redirect('customer/addtestimonial')->with('success','Data has been added.');
       
  }
   function add_testimonials(Request $request)
  {
    if($request->session()->has('customerlogin')){
            return view('add-testimonial');
        }
  
        return redirect("/login")->withSuccess('You are not allowed to access');
      
  }
}
