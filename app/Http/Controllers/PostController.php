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

class PostController extends Controller
{
    public function index(Request $request): View
    {

        $post = Post::paginate(16);

         return view('post', [
       'post' => $post]);

    }
    
    public function manga(Request $request, $id): View
    {
        /** @var User $user */
        $user = $request->user();
     
        
        $post = Post::query()
            ->where('id', $id)
            ->first();
        
        if ($user != null){
             $read = Read::query()
            ->where('post_id', $id)
            ->where('user_id', $user->id)
            ->first();
            
            return view('manga', [
       'post' => $post],['read' => $read]
       );
            
        }else{return view('manga', [
       'post' => $post
       ]
       );};
        
        
          
    }
    
    public function mangaRead(Request $request, $id): View
    {
       
     
      $path = '/home/altaurhz/kolian.altaneri.com/resources/manga/' . $id . '/1';
      $results = scandir($path);
       
      
        
      $folder = 'http://kolian.altaneri.com/resources/manga/' . $id . '/1/';

        
         return view('mangaRead', [
       'folder' => $folder, 
       'results' => $results, 
       
       'id' => $id]
       );
    }
    
    public function setRead(int $postId, Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();



        $read = Read::query()
            ->where('post_id', $postId)
            ->where('user_id', $user->id)
            ->first();

        if (!$read) {
            $read = new Read();
            $read->user_id = $user->id;
            $read->post_id = $postId;
            $read->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);
            
    }
    
    $read->delete();
       
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);
        
    }
    
}

//     public function show($blogId): JsonResponse
//     {
//         $blog = Blog::query()
//             ->where('id', '=', $blogId)
//             ->first();

//         if (!$blog) {
//             return response()->json(['error' => 'Blog not found with ID: ' . $blogId], Response::HTTP_NOT_FOUND);
//         }

//         return response()->json(['data' => $blog]);
//     }

//     public function store(CreateBlogRequest $request)
//     {
//         /** @var User|null $user */
//         $user = $request->user();

//         if (!$user) {
//             return response()->json(['error' => 'You should be authorized to create post!'], Response::HTTP_UNAUTHORIZED);
//         }

//         $validated = $request->validated();

//         $blog = new Blog();
//         $blog->user_id = $user->id;
//         $blog->title = $validated['title'];
//         $blog->text = $validated['text'];
//         $blog->save();

//         return redirect('/blogs');
//     }

//     public function update(UpdateBlogRequest $request, $blogId): JsonResponse
//     {
//         $blog = Blog::query()
//             ->where('id', '=', $blogId)
//             ->first();

//         if (!$blog) {
//             return response()->json(['error' => 'Blog not found with ID: ' . $blogId], Response::HTTP_NOT_FOUND);
//         }

//         $validated = $request->validated();

//         $blog->title = $validated['title'] ?? $blog->title;
//         $blog->text = $validated['text'] ?? $blog->text;
//         $blog->save();

//         return response()->json(['data' => $blog], Response::HTTP_ACCEPTED);
//     }

//     public function destroy($blogId): JsonResponse
//     {
//         $blog = Blog::query()
//             ->where('id', '=', $blogId)
//             ->first();

//         if (!$blog) {
//             return response()->json(['error' => 'Blog not found with ID: ' . $blogId], Response::HTTP_NOT_FOUND);
//         }

//         $blog->delete();

//         return response()->json(['message' => 'Blog [' . $blogId . '] has been removed!'], Response::HTTP_ACCEPTED);
//     }
// }