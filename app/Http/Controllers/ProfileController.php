<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function index(){
    	return view('home');
    }

    public function update(){

    	return view('auth.profile-update');
    }

    public function saveUpdate(Request $request){

 if ($request->hasFile('avatar')) {
    	     /**upload file to database */
                
                $file=$request->avatar;
                $format=$file->getClientOriginalExtension();
                $name= $file->getClientOriginalName(); 
                $size=$file->getClientSize(); 
                $fileName  = time().$name;
               // $path=public_path().'/'.'img'.'/'.'profile-pictures'.'/'.$fileName;
                $image_path = 'img'.'/'.'profile-pictures'.'/'.$fileName;
                $file->move('img'.'/'.'profile-pictures',$fileName);
           
          $userId=Auth::User()->id;
          User::where('id', $userId)->update([
            'image_path'=>$image_path
          ]);
          return 'hi';

    }else{
    	dd('no file');
    }
}

public function showImage($filename)
    {
        try {
            return response()->download(storage_path('app/public/uploads/avatars' . DS . $filename), null,[],null);
        } catch (\Exception $e) {
            return 'File Not Found!';
        }
    }
}
