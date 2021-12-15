<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
         /** @var User $user */
        $user = $request->user();
         
         
       
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       
        
        $imageName = time().'.'.$request->image->extension();  
        
        if($imageName){
            $link = basename($user['urlimg']);
         
        
        if($link != 'defolt.jpg'){
        unlink('/home/altaurhz/kolian.altaneri.com/public/urlimg/' . $link);// удаление старой картинки если она не дефолтная
        }
        }
   
        $request->image->move(public_path('urlimg'), $imageName);
        $urlimg = 'https://kolian.altaneri.com/public/urlimg/' . $imageName;

        
        User::where("id", $user->id)->update(["urlimg" => $urlimg]);//добавление в бд урла новой картинки
 
        return back();

    }
    
    
     public function nameUploadPost(Request $request)
    {
         /** @var User $user */
        $user = $request->user();
  
        $request->validate([
            'inputName' => 'string|min:3',
        ]);

        $newName = $request->inputName;  
  
        User::where("id", $user->id)->update(["name" => $newName]);//добавление в бд новоги имени
 
        return back();

    }
    
    
    
}