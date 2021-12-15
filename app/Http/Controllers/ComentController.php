<?php


namespace App\Http\Controllers;

use App\Http\Requests\CreateComentRequest;
use App\Http\Requests\CreateComentMangaPageRequest;
use App\Http\Requests\CreateComentOtvetRequest;
use App\Http\Requests\CreateComentOtvetMangaPageRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Coment;
use App\Models\ComentOtvet;
use App\Models\ComentOtvetMangaPage;
use App\Models\ComentMangaPage;
use App\Models\Read;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ComentController extends Controller
{

    
     public function setComent(CreateComentRequest $request): JsonResponse
     {
       
      
        
        
        /** @var User $user */
        $user = $request->user();

        $validated = $request->validated();


     
            $coment = new Coment();
            $coment->user_id = $user->id;
            $coment->post_id = $validated['post_id'];
            $coment->coment = $validated['coment'];
    
            $coment->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);
            
    
    
    
    }
       
    public function delComent(int $comenId,Request $request): JsonResponse
     {
       
  
          $coment = Coment::query()
            ->where('id', $comenId)
            
            ->first()
            ;
     
     
        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);
        
    
    
    }
     public function delComentOtvetMangaPage(int $comenId,Request $request): JsonResponse
     {
       
  
          $coment = ComentOtvetMangaPage::query()
            ->where('id', $comenId)
            
            ->first()
            ;
     
     
        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);
        
    
    
    }
    
    public function delComentOtvet(int $comenId,Request $request): JsonResponse
     {
       
  
          $coment = ComentOtvet::query()
            ->where('id', $comenId)
            
            ->first()
            ;
     
     
        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);
        
    
    
    }
    
      public function delComentManga(int $comenId,Request $request): JsonResponse
     {
       
  
          $coment = ComentMangaPage::query()
            ->where('id', $comenId)
            
            ->first()
            ;
     
     
        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);
        
    
    
    }
    
    
    
    
    
        public function viewNew(Request $request, $id)
    {
             
            $coment2 = Coment::query()
            ->where('post_id', $id)
            ->orderBy('created_at')
            ->get();  
     
        
         return $coment2;
         return response()->json();
    }
    
    
      public function viewNewOtvet(Request $request, $id)
    {
             
            $coment3 = ComentOtvet::query()
            ->where('post_id', $id)
            ->orderBy('created_at')
            ->get();  
     
        
         return $coment3;
         return response()->json();
    }
          public function viewNewMangaPage(Request $request, $id)
    {
             
            $coment3 = ComentMangaPage::query()
            ->where('post_id', $id)
            ->orderBy('created_at')
            ->get();  
     
        
         return $coment3;
         return response()->json();
    }
    
     public function viewNewOtvetMangaPage(Request $request, $id)
    {
             
            $coment3 = ComentOtvetMangaPage::query()
            ->where('post_id', $id)
            ->orderBy('created_at')
            ->get();  
     
        
         return $coment3;
         return response()->json();
    }
    
    
     public function setComentOtvet(CreateComentOtvetRequest $request): JsonResponse
     {
       
      
        
        
        /** @var User $user */
        $user = $request->user();

        $validated = $request->validated();

        
     
            $coment = new ComentOtvet();
            $coment->coment_id = $validated['coment_id'];
            $coment->user_id = $user->id;
            $coment->post_id = $validated['post_id'];
            $coment->coment = $validated['coment'];
           
            $coment->coment_user_id = $validated['coment_user_id'];
            $coment->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);
            
    
    
    
    }
       
     public function setComentMangaPage(CreateComentMangaPageRequest $request): JsonResponse
     {
       
     
        
        
        /** @var User $user */
        $user = $request->user();

        $validated = $request->validated();


     
            $coment = new ComentMangaPage();
            $coment->user_id = $user->id;
            $coment->post_id = $validated['post_id'];
            $coment->glava = $validated['glava'];
            $coment->page = $validated['page'];
            $coment->coment = $validated['coment'];
    
            $coment->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);
            
    
    
    
    }
    
    
     public function setComentOtvetMangaPage(CreateComentOtvetMangaPageRequest $request): JsonResponse
     {
       
      
        
        
        /** @var User $user */
        $user = $request->user();

        $validated = $request->validated();

        
     
            $coment = new ComentOtvetMangaPage();
            $coment->coment_id = $validated['coment_id'];
            $coment->user_id = $user->id;
            $coment->post_id = $validated['post_id'];
            $coment->coment = $validated['coment'];
           
            $coment->coment_user_id = $validated['coment_user_id'];
            $coment->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);
            
    
    
    
    }
    
    
    
     }
    
       
       

       
       
       
       
        /** @var User $user */
        // $user = $request->user();

    //     $validated = $request->validated();


    //     $coment = Coment::query()
    //         ->where('post_id', $postId)
    //         ->where('user_id', $user->id)
    //         ->first();

    //     if (!$coment) {
    //         $coment = new Read();
    //         $coment->user_id = $user->id;
    //         $coment->post_id = $postId;
    //         $coment->coment = $validated['text'];
    //         $coment->save();

    //         return response()->json(['status' => true], Response::HTTP_CREATED);
            
    //}
    
    // $coment->delete();
       
    //     return response()->json(['status' => true], Response::HTTP_ACCEPTED);
        
    // }
    
    
    
// }
//  public function store(CreateBlogRequest $request)
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