
@extends('layouts.master')




@section('content')

      

       {{$user = \Illuminate\Support\Facades\Auth::user()}}
 {{$post}}
 <div class="container">
  <div class="row">
    <div class="col-sm">
   
    </div>
</div>
 
 </div>
 
 <div class="col-md-9">


            <div class="row">
                
               
                
                <div class ="col-6 col-sm-4 col-md-5 p-2">
               <div class="card h-70">
                  <img class="card-img-top" src="{{$post['imgTit']}}"/>   

               </div>
            </div>
                <div class ="col-6 col-sm-4 col-md-5 p-2">
                     <div class="card-body">
    <h5 class="card-title">{{$post['name']}}</h5>
    <h6 class="card-title">Жанр-{{$post['zanr']}}</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <div class="btn-group" role="group" aria-label="Basic example">
    
   
    <a href="/mangaRead/{{$post['id']}}" class="btn btn-success">{{$post['id']}}Читать</a> 
     
     
     
     @if($user != null)
     @if(!$read)<button class="btn btn-primary"  onclick="setRead({{$post->id}})" id = "read">Прочитанно</button>
   <button class="btn btn-success" style = "display: none" onclick="setUnRead({{$post->id}})" id = "unread">Непрочитано</button>
   @else
     <button class="btn btn-primary" style = "display: none" onclick="setRead({{$post->id}})" id = "read">Прочитанно</button>
   <button class="btn btn-success"  onclick="setUnRead({{$post->id}})" id = "unread">Непрочитано</button>@endif
   @endif
     </div>
     {{$user}}
 {{$post}}

 <!--<span style="color: red" id="heart_{{$post->id}}" onclick="setRead({{$post->id}})">ff</span>-->
               
  </div>
                    
                    </div>
                                   
 
               
               

        </div>
    </div>
    <div class="container">

 
 </div> 
<script>

function setUnRead(postId, read) {
    let http = new XMLHttpRequest();
    http.open('GET', '/' + postId + '/read', true);
    console.log('LIKE REMOVED!');
    document.getElementById('read').style.display = 'block';
    document.getElementById('unread').style.display = 'none';
    
    http.send();
}

function setRead(postId, read) {
    let http = new XMLHttpRequest();
    http.open('GET', '/' + postId + '/read', true);
    console.log('LIKED!');
    document.getElementById('unread').style.display = 'block';
    document.getElementById('read').style.display = 'none';
    
    http.send();

}

// function setRead(postId) {
//     // console.log('LIKE REMOVED!');
// let http = new XMLHttpRequest();
//         http.open('GET', '/' + postId + '/read', true);
      
//         http.onreadystatechange = function() {//Call a function when the state changes.
//             if(http.readyState === 4 && http.status === 201) {
//                 console.log('LIKED!');
//               document.getElementById(read).innerHTML = '<button class="btn btn-success" onclick="setRead({{$post->id}})" id = "read">НЕПрочитанно</button>';
//             }
//             if(http.readyState === 4 && http.status === 202) {
//                 console.log('LIKE REMOVED!');
//               document.getElementById(unread).innerHTML = '<button class="btn btn-primary" onclick="setRead({{$post->id}})" id = "unread">прочитанно</button>';
//             }
//         };
//         http.send();
//     }
 </script>
   
@endsection