<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\RoomTypeImage;
use Illuminate\Support\Facades\Storage;


class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = RoomType::all();
        if($request->session()->has('adminData')){
            
        return view('roomtype.index',['data'=>$data]);
        }
  
        return redirect("admin/login");
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        
        if($request->session()->has('adminData')){
            
        return view('roomtype.create');
        }
  
        return redirect("admin/login")->withSuccess('You are not allowed to access');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validations 
         $request->validate([
            'title' => 'required',
            'price' => 'required',
            'detail' => 'required',
            
        ]);
         // simple form data saving
        $data = new RoomType;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();
        // logic for multple image saving from form
         foreach($request->file('imgs') as $img){
            $imgPath=$img->store('public/imgs');
            $imgData=new RoomTypeImage;
            $imgData->room_type_id=$data->id;
            $imgData->img_src=$imgPath;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }
         return redirect('admin/roomtype/create')->with('success','Data has been added.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RoomType::find($id);
        return view('roomtype.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
    
        $data = RoomType::find($id);
        return view('roomtype.edit',['data'=>$data]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = RoomType::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();
        if($request->hasFile('imgs')){
        foreach($request->file('imgs') as $img){
            $imgPath=$img->store('public/imgs');
            $imgData=new RoomTypeImage;
            $imgData->room_type_id=$data->id;
            $imgData->img_src=$imgPath;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }
    }
        return redirect('admin/roomtype/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomType::where('id',$id)->delete();
        return redirect('admin/roomtype/');
    }
     public function destroy_image($img_id)
    {
        $data = RoomTypeImage::where('id',$img_id)->first();
        Storage::delete($data->img_src);
        RoomTypeImage::where('id',$img_id)->delete();
        return response()->json(['bool'=> true]);
    }
    
}
