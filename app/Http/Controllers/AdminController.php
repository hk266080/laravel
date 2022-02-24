<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Testimonial;
use App\Models\Booking;
use Cookie;

class AdminController extends Controller
{
    //login
    function login()
    { 

        return view('login');
    }
    //check login
   function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->count();
        if($admin>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->get();
            session(['adminlogin'=>true,'adminData'=>$adminData]);

            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg','Invalid username/Password!!');
        }

        // remember me
        if($request->has('rememberme')){
                Cookie::queue('adminuser',$request->username,1440);
                Cookie::queue('adminpwd',$request->password,1440);
            }

        //todo
    }
    //logout
      function logout(){
        session()->forget(['adminlogin','adminData']);
        return redirect('admin/login');
    }
    public function dashboard(Request $request)
    {
        if($request->session()->has('adminData')){
            return view('dashboard');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }
 
    function testimonials(Request $request){
        $data=Testimonial::all();
        if($request->session()->has('adminData')){
            
        return view('admin_testimonial',['data'=>$data]);
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
        
        
    }
     public function destroy_testimonial($id)
    {
       Testimonial::where('id',$id)->delete();
       return redirect('admin/testimonial')->with('success','Data has been deleted.');
    }
}
