<?php


namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Read;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
    public function userindex(Request $request): View
    {
        /** @var User $user */
        $user2 = $request->user();
         
         if ($user2 == null){die(header("Location: http://kolian.altaneri.com/post"));};
        
        $read = Read::
            where('user_id', $user2->id)->pluck('post_id')->toArray();
         
         
         $post =[];
         
  foreach($read as $rea){
      $post[] = Post::
            where('id', $rea)->first()->toArray();
  }

            

       
          
          return view('myakk', [
       'user2' => $user2],['post' => $post]
       );
    }
      public function manga(Request $request): View
    {
        
          return view('manga');
    }
    
         public function mayakk(Request $request, $id): View
    {
        /** @var User $user */
        $user = $request->user();
        
        $post = Post::query()
            ->where('id', $id)
            ->first();
        
        $read = Read::query()
            ->where('post_id', $id)
            ->where('user_id', $user->id)
            ->first();
        
          return view('manga', [
       'post' => $post],['read' => $read]
       );
    }
}