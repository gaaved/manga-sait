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
use App\Models\ComentLikes;
use App\Models\ComentDizLikes;
use App\Models\ComentOtvLikes;
use App\Models\ComentOtvDizLikes;
use App\Models\ComentPreLikes;
use App\Models\ComentPreDizLikes;
use App\Models\ComentPreOtvLikes;
use App\Models\ComentPreOtvDizLikes;
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

class ComentLikeController extends Controller
{

    
     public function setComentLike(Request $request): JsonResponse
     {

        /** @var User $user */
        $user = $request->user();

        $validated = $request;

            $like = new ComentLikes();
            $like->user_id = $user->id;
            $like->post_id = $validated['post_id'];
            $like->coment_id = $validated['coment_id'];
    
            $like->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);

    }
    
        public function delComentLike(int $comenId,Request $request): JsonResponse
     {
       
          $user = $request->user();

          $coment = ComentLikes::query()
            ->where('coment_id', $comenId)
            ->where('user_id', $user->id)
            ->first();

        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);

    }
      public function setComentDizLike(Request $request): JsonResponse
     {

        /** @var User $user */
        $user = $request->user();

        $validated = $request;

            $like = new ComentDizLikes();
            $like->user_id = $user->id;
            $like->post_id = $validated['post_id'];
            $like->coment_id = $validated['coment_id'];
    
            $like->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);

     }
    
        public function delComentDizLike(int $comenId,Request $request): JsonResponse
     {
       
          $user = $request->user();
      
          $coment = ComentDizLikes::query()
            ->where('coment_id', $comenId)
            ->where('user_id', $user->id)
            ->first();

        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);

     }
    
       public function setComentOtvLike(Request $request): JsonResponse
     {

        /** @var User $user */
        $user = $request->user();

        $validated = $request;

            $like = new ComentOtvLikes();
            $like->user_id = $user->id;
            $like->post_id = $validated['post_id'];
            $like->coment_id = $validated['coment_id'];
    
            $like->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);

     }
    
        public function delComentOtvLike(int $comenId,Request $request): JsonResponse
     {
       
          $user = $request->user();

          $coment = ComentOtvLikes::query()
            ->where('coment_id', $comenId)
            ->where('user_id', $user->id)
            ->first();

        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);

     }
        public function setComentOtvDizLike(Request $request): JsonResponse
     {

        /** @var User $user */
        $user = $request->user();

        $validated = $request;

            $like = new ComentOtvDizLikes();
            $like->user_id = $user->id;
            $like->post_id = $validated['post_id'];
            $like->coment_id = $validated['coment_id'];
    
            $like->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);

      }
    
        public function delComentOtvDizLike(int $comenId,Request $request): JsonResponse
     {
       
          $user = $request->user();
    
          $coment = ComentOtvDizLikes::query()
            ->where('coment_id', $comenId)
            ->where('user_id', $user->id)
            ->first()
            ;

        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);

    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
      public function setComentPreLike(Request $request): JsonResponse
     {

        /** @var User $user */
        $user = $request->user();

        $validated = $request;

            $like = new ComentPreLikes();
            $like->user_id = $user->id;
            $like->post_id = $validated['post_id'];
            $like->coment_id = $validated['coment_id'];
    
            $like->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);

    }
    
        public function delComentPreLike(int $comenId,Request $request): JsonResponse
     {
       
          $user = $request->user();

          $coment = ComentPreLikes::query()
            ->where('coment_id', $comenId)
            ->where('user_id', $user->id)
            ->first();

        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);

    }
      public function setComentPreDizLike(Request $request): JsonResponse
     {

        /** @var User $user */
        $user = $request->user();

        $validated = $request;

            $like = new ComentPreDizLikes();
            $like->user_id = $user->id;
            $like->post_id = $validated['post_id'];
            $like->coment_id = $validated['coment_id'];
    
            $like->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);

     }
    
        public function delComentPreDizLike(int $comenId,Request $request): JsonResponse
     {
       
          $user = $request->user();
      
          $coment = ComentPreDizLikes::query()
            ->where('coment_id', $comenId)
            ->where('user_id', $user->id)
            ->first();

        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);

     }
    
       public function setComentPreOtvLike(Request $request): JsonResponse
     {

        /** @var User $user */
        $user = $request->user();

        $validated = $request;

            $like = new ComentPreOtvLikes();
            $like->user_id = $user->id;
            $like->post_id = $validated['post_id'];
            $like->coment_id = $validated['coment_id'];
    
            $like->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);

     }
    
        public function delComentPreOtvLike(int $comenId,Request $request): JsonResponse
     {
       
          $user = $request->user();

          $coment = ComentPreOtvLikes::query()
            ->where('coment_id', $comenId)
            ->where('user_id', $user->id)
            ->first();

        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);

     }
        public function setComentPreOtvDizLike(Request $request): JsonResponse
     {

        /** @var User $user */
        $user = $request->user();

        $validated = $request;

            $like = new ComentPreOtvDizLikes();
            $like->user_id = $user->id;
            $like->post_id = $validated['post_id'];
            $like->coment_id = $validated['coment_id'];
    
            $like->save();

            return response()->json(['status' => true], Response::HTTP_CREATED);

      }
    
        public function delComentPreOtvDizLike(int $comenId,Request $request): JsonResponse
     {
       
          $user = $request->user();
    
          $coment = ComentPreOtvDizLikes::query()
            ->where('coment_id', $comenId)
            ->where('user_id', $user->id)
            ->first()
            ;

        $coment->delete();
        
        return response()->json(['status' => true], Response::HTTP_ACCEPTED);

    } 
}    