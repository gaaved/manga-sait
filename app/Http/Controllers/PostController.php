<?php


namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Read;
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
use App\Models\ComentMangaPage;
use App\Models\ComentOtvetMangaPage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder\Arrayable;

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
        $glava = '1_1';//дефолтная глава
        $page = 1;//дефолтная страница
        
        $post = Post::query()
            ->where('id', $id)
            ->first();
            

            
            
         $comentlike = ComentPreLikes::query()
            // ->select(DB::raw('count(*) as count, coment_id'))
            ->selectRaw('coment_id, count(*)')
            ->groupBy('coment_id')
            ->toSql();

         $comentDizlike = ComentPreDizLikes::query()
          
            ->selectRaw('coment_id, count(*)')
            ->groupBy('coment_id')
            ->toSql();
         

      if ($user != null) {
            $usercomentDizlike = ComentPreDizLikes::query()
            ->whereRaw('`user_id` = ' . $user['id'])
            ->toSql();
          
            $usercomentlike = ComentPreLikes::query()
            ->whereRaw('`user_id` = ' . $user['id'])
            ->toSql();
        
            $coment = Coment::query()
            ->select('coments.*','users.name','users.urlimg','coment_likes3.user_id AS comuser','coment_likes2.count(*) AS count','coment_diz_likes3.user_id AS dizcomuser','coment_diz_likes2.count(*) AS dizcount')
            ->leftJoin('users', 'users.id', '=', 'coments.user_id')

            ->leftJoinSub($usercomentlike, 'coment_likes3', function ($join2) {//только наши лайки
            $join2->on('coments.id', '=', 'coment_likes3.coment_id');
            })
        
            ->leftJoinSub($comentlike, 'coment_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coments.id', '=', 'coment_likes2.coment_id');
            })
        
            ->leftJoinSub($usercomentDizlike, 'coment_diz_likes3', function ($join2) {//только наши лайки
            $join2->on('coments.id', '=', 'coment_diz_likes3.coment_id');
            })
        
            ->leftJoinSub($comentDizlike, 'coment_diz_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coments.id', '=', 'coment_diz_likes2.coment_id');
            })
        
        
            ->where('coments.post_id', $id)
            ->orderBy('coments.created_at', 'desc')
            ->get();    
         
     
      }else{
         $coment = Coment::query()
            ->select('coments.*','users.name','users.urlimg', 'coment_likes2.count(*) AS count')
            ->leftJoin('users', 'users.id', '=', 'coments.user_id')

            ->leftJoinSub($comentlike, 'coment_likes2', function ($join) {
            $join->on('coments.id', '=', 'coment_likes2.coment_id');
             })

            ->where('coments.post_id', $id)
            ->orderBy('coments.created_at', 'desc')
            ->get();    
         
            
            
         }    
    
         $comentOtvlike = ComentPreOtvLikes::query()
            // ->select(DB::raw('count(*) as count, coment_id'))
            ->selectRaw('coment_id, count(*)')
            ->groupBy('coment_id')
            ->toSql();

         $comentOtvDizlike = ComentPreOtvDizLikes::query()
          
            ->selectRaw('coment_id, count(*)')
            ->groupBy('coment_id')
            ->toSql();
         

      if ($user != null) {
            $usercomentOtvDizlike = ComentPreOtvDizLikes::query()
            ->whereRaw('`user_id` = ' . $user['id'])
            ->toSql();
          
            $usercomentOtvlike = ComentPreOtvLikes::query()
            ->whereRaw('`user_id` = ' . $user['id'])
            ->toSql();
            
            
            $comentotvet = ComentOtvet::query()
            ->select('coment_otvets.*','users.name','users.urlimg','coment_otv_likes3.user_id AS comuser','coment_otv_likes2.count(*) AS count','coment_otv_diz_likes3.user_id AS dizcomuser','coment_otv_diz_likes2.count(*) AS dizcount')
            ->leftJoin('users', 'users.id', '=', 'coment_otvets.user_id')
             ->leftJoinSub($usercomentOtvlike, 'coment_otv_likes3', function ($join2) {//только наши лайки
            $join2->on('coment_otvets.id', '=', 'coment_otv_likes3.coment_id');
            })
                 ->leftJoinSub($comentOtvlike, 'coment_otv_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coment_otvets.id', '=', 'coment_otv_likes2.coment_id');
            })
        
            ->leftJoinSub($usercomentOtvDizlike, 'coment_otv_diz_likes3', function ($join2) {//только наши лайки
            $join2->on('coment_otvets.id', '=', 'coment_otv_diz_likes3.coment_id');
            })
        
            ->leftJoinSub($comentOtvDizlike, 'coment_otv_diz_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coment_otvets.id', '=', 'coment_otv_diz_likes2.coment_id');
            })
            
            
            ->where('coment_otvets.post_id', $id)
            ->orderBy('coment_otvets.created_at', 'asc')
            ->get();  
         
     
      }else{
          $comentotvet = ComentOtvet::query()
            ->select('coment_otvets.*','users.name','users.urlimg','coment_otv_likes2.count(*) AS count')
            ->leftJoin('users', 'users.id', '=', 'coment_otvets.user_id')
            
              ->leftJoinSub($comentOtvlike, 'coment_otv_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coment_otvets.id', '=', 'coment_otv_likes2.coment_id');
            })

            ->where('coment_otvets.post_id', $id)
            ->orderBy('coment_otvets.created_at', 'asc')
            ->get();    

         }    

        $comentotvetid2 = ComentOtvet::query()
            ->where('post_id', $id)
            ->selectRaw('*, count(*)')
            ->groupBy('coment_id')
            ->get();
          
          $comentotvetusername =  ComentOtvet::query()
            ->select('coment_otvets.*','users.name')
            ->leftJoin('users', 'users.id', '=', 'coment_otvets.coment_user_id')
            ->where('coment_otvets.post_id', $id)
            ->orderBy('coment_otvets.created_at', 'asc')
            ->get();  
        
        if ($user != null){
             $read = Read::query()
            ->where('post_id', $id)
            ->where('user_id', $user->id)
            ->first();
          
          $user = \Illuminate\Support\Facades\Auth::user();  
            return view('manga', [
       'post' => $post,
       'read' => $read,
       'glava' => $glava, 
       'coment' => $coment, 
       'page' => $page,
       'comentotvet' => $comentotvet,
       'comentotvetid2' => $comentotvetid2,
       'comentotvetusername' => $comentotvetusername,
       'user' => $user,
       'usercomentlike' => $usercomentlike,
       'comentlike' => $comentlike,
       
       'usercomentotvlike' => $usercomentOtvlike,
       'comentotvlike' => $comentOtvlike,
       'id' => $id
       ]
       );
            
        }else{return view('manga', [
       'post' => $post,
       'glava' => $glava, 
       'coment' => $coment,
       'page' => $page, 
       'comentotvet' => $comentotvet,
       'comentotvetid2' => $comentotvetid2,
       'comentotvetusername' => $comentotvetusername,
       'user' => $user,
       'id' => $id
       ]
       );};
        
        
          
    }
    
    public function mangaRead(Request $request, $id, $glava, $page): View
    {
    
    
     $page = 1;
     
     $path2 = '/home/altaurhz/kolian.altaneri.com/resources/manga/' . $id;//определяем сколько глав в манге
    
     $skolkoGlav = array_diff( scandir( $path2), array('..', '.'));//сканирует папку и находит все дериктории а так же array_diff убирает точу и двоеточие
     sort($skolkoGlav, SORT_NUMERIC | SORT_FLAG_CASE);

     
      $path = '/home/altaurhz/kolian.altaneri.com/resources/manga/' . $id . '/' . $glava . '/';//определяем сколько картинок в главе
    
       $results = array_diff( scandir( $path), array('..', '.'));//сканирует папку и находит все дериктории а так же array_diff убирает точу и двоеточие
       sort($results, SORT_NUMERIC | SORT_FLAG_CASE);
        
      $folder = 'https://kolian.altaneri.com/resources/manga/' . $id . '/' . $glava . '/';
      $user = \Illuminate\Support\Facades\Auth::user();
        
     
         $comentlike = ComentLikes::query()
            // ->select(DB::raw('count(*) as count, coment_id'))
            ->selectRaw('coment_id, count(*)')
            ->groupBy('coment_id')
            ->toSql();

         $comentDizlike = ComentDizLikes::query()
          
            ->selectRaw('coment_id, count(*)')
            ->groupBy('coment_id')
            ->toSql();
         

      if ($user != null) {
            $usercomentDizlike = ComentDizLikes::query()
            ->whereRaw('`user_id` = ' . $user['id'])
            ->toSql();
          
            $usercomentlike = ComentLikes::query()
            ->whereRaw('`user_id` = ' . $user['id'])
            ->toSql();
        
            $coment = ComentMangaPage::query()
            ->select('coment_manga_pages.*','users.name','users.urlimg','coment_likes3.user_id AS comuser','coment_likes2.count(*) AS count','coment_diz_likes3.user_id AS dizcomuser','coment_diz_likes2.count(*) AS dizcount')
            ->leftJoin('users', 'users.id', '=', 'coment_manga_pages.user_id')

            ->leftJoinSub($usercomentlike, 'coment_likes3', function ($join2) {//только наши лайки
            $join2->on('coment_manga_pages.id', '=', 'coment_likes3.coment_id');
            })
        
            ->leftJoinSub($comentlike, 'coment_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coment_manga_pages.id', '=', 'coment_likes2.coment_id');
            })
        
            ->leftJoinSub($usercomentDizlike, 'coment_diz_likes3', function ($join2) {//только наши лайки
            $join2->on('coment_manga_pages.id', '=', 'coment_diz_likes3.coment_id');
            })
        
            ->leftJoinSub($comentDizlike, 'coment_diz_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coment_manga_pages.id', '=', 'coment_diz_likes2.coment_id');
            })
        
        
            ->where('coment_manga_pages.post_id', $id)
            ->orderBy('coment_manga_pages.created_at', 'desc')
            ->get();    
         
     
      }else{
         $coment = ComentMangaPage::query()
            ->select('coment_manga_pages.*','users.name','users.urlimg', 'coment_likes2.count(*) AS count')
            ->leftJoin('users', 'users.id', '=', 'coment_manga_pages.user_id')

            ->leftJoinSub($comentlike, 'coment_likes2', function ($join) {
            $join->on('coment_manga_pages.id', '=', 'coment_likes2.coment_id');
             })

            ->where('coment_manga_pages.post_id', $id)
            ->orderBy('coment_manga_pages.created_at', 'desc')
            ->get();    
          
         } 

        $comentotvetid2 = ComentOtvetMangaPage::query()
            ->where('post_id', $id)
            ->selectRaw('*, count(*)')
            ->groupBy('coment_id')
            ->get();
            
       $comentOtvlike = ComentOtvLikes::query()
            // ->select(DB::raw('count(*) as count, coment_id'))
            ->selectRaw('coment_id, count(*)')
            ->groupBy('coment_id')
            ->toSql();

         $comentOtvDizlike = ComentOtvDizLikes::query()
          
            ->selectRaw('coment_id, count(*)')
            ->groupBy('coment_id')
            ->toSql();
         

      if ($user != null) {
            $usercomentOtvDizlike = ComentOtvDizLikes::query()
            ->whereRaw('`user_id` = ' . $user['id'])
            ->toSql();
          
            $usercomentOtvlike = ComentOtvLikes::query()
            ->whereRaw('`user_id` = ' . $user['id'])
            ->toSql();
            
            
            $comentotvet = ComentOtvetMangaPage::query()
            ->select('coment_otvet_manga_pages.*','users.name','users.urlimg','coment_otv_likes3.user_id AS comuser','coment_otv_likes2.count(*) AS count','coment_otv_diz_likes3.user_id AS dizcomuser','coment_otv_diz_likes2.count(*) AS dizcount')
            ->leftJoin('users', 'users.id', '=', 'coment_otvet_manga_pages.user_id')
             ->leftJoinSub($usercomentOtvlike, 'coment_otv_likes3', function ($join2) {//только наши лайки
            $join2->on('coment_otvet_manga_pages.id', '=', 'coment_otv_likes3.coment_id');
            })
                 ->leftJoinSub($comentOtvlike, 'coment_otv_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coment_otvet_manga_pages.id', '=', 'coment_otv_likes2.coment_id');
            })
        
            ->leftJoinSub($usercomentOtvDizlike, 'coment_otv_diz_likes3', function ($join2) {//только наши лайки
            $join2->on('coment_otvet_manga_pages.id', '=', 'coment_otv_diz_likes3.coment_id');
            })
        
            ->leftJoinSub($comentOtvDizlike, 'coment_otv_diz_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coment_otvet_manga_pages.id', '=', 'coment_otv_diz_likes2.coment_id');
            })
            
            
            ->where('coment_otvet_manga_pages.post_id', $id)
            ->orderBy('coment_otvet_manga_pages.created_at', 'asc')
            ->get();  
         
     
      }else{
          $comentotvet = ComentOtvetMangaPage::query()
            ->select('coment_otvet_manga_pages.*','users.name','users.urlimg','coment_otv_likes2.count(*) AS count')
            ->leftJoin('users', 'users.id', '=', 'coment_otvet_manga_pages.user_id')
            
              ->leftJoinSub($comentOtvlike, 'coment_otv_likes2', function ($join) {//добавляем количество всех лайков на коменте
            $join->on('coment_otvet_manga_pages.id', '=', 'coment_otv_likes2.coment_id');
            })

            ->where('coment_otvet_manga_pages.post_id', $id)
            ->orderBy('coment_otvet_manga_pages.created_at', 'asc')
            ->get();    
    
            
         } 
   
         $comentotvetusername =  ComentOtvetMangaPage::query()
            ->select('coment_otvet_manga_pages.*','users.name')
            ->leftJoin('users', 'users.id', '=', 'coment_otvet_manga_pages.coment_user_id')
            ->where('coment_otvet_manga_pages.post_id', $id)
            ->orderBy('coment_otvet_manga_pages.created_at', 'asc')
            ->get();  
            
        if ($user != null){
         return view('mangaRead', [
       'coment' => $coment,
       'folder' => $folder, 
       'results' => $results, 
       'glava' => $glava, 
       'page' => $page, 
       'comentotvet' => $comentotvet,
       'comentotvetid2' => $comentotvetid2,
       'comentotvetusername' => $comentotvetusername,
       'skolkoGlav' => $skolkoGlav,
       'user' => $user,
       'usercomentlike' => $usercomentlike,
       'comentlike' => $comentlike,
       
        'usercomentotvlike' => $usercomentOtvlike,
       'comentotvlike' => $comentOtvlike,
     
       'id' => $id]
       );
            
        }else{
            return view('mangaRead', [
       'coment' => $coment,
       'folder' => $folder, 
       'results' => $results, 
       'glava' => $glava, 
       'page' => $page, 
       'comentotvet' => $comentotvet,
       'comentotvetid2' => $comentotvetid2,
       'comentotvetusername' => $comentotvetusername,
       'skolkoGlav' => $skolkoGlav,
       'user' => $user,
       
     
       'id' => $id]
       ); 
        }
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

