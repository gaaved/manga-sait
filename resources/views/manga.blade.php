
@extends('layouts.master')




@section('content')

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 

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

    <a href="/mangaRead/{{$post['id']}}/{{$glava}}/{{$page}}" style="cursor: url('/resources/pack2.png'), pointer;" class="btn btn-success">{{$post['id']}}Читать</a> 
  
     @if($user != null)
     @if(!$read)
       <button class="btn btn-primary" style="cursor: url('/resources/pack2.png'), pointer;" onclick="setRead({{$post->id}})" id = "read">Прочитанно</button>
       <button class="btn btn-success" style = "display: none; cursor: url('/resources/pack2.png'), pointer;" onclick="setUnRead({{$post->id}})" id = "unread">Непрочитано</button>
     @else
       <button class="btn btn-primary" style = "display: none; cursor: url('/resources/pack2.png'), pointer;" onclick="setRead({{$post->id}})" id = "read">Прочитанно</button>
       <button class="btn btn-success" style="cursor: url('/resources/pack2.png'), pointer;" onclick="setUnRead({{$post->id}})" id = "unread">Непрочитано</button>@endif
     @endif
     </div>
    </div>
   </div>
  </div>
 </div>
    
    <div class="container">

    @if($user != null)
       <div id="createForm">
             <textarea class="form-control" rows="2" type="text" placeholder="Добавьте Ваш комментарий" id="coment" ></textarea>
             <button class="btn btn-sm btn-primary pull-right" style="cursor: url('/resources/pack2.png'), pointer;" type="submit" id="createComent">Добавить</button>
       </div>
    @endif   
    
<h5>Коментарии</h5>

       <div class="mar-btm" id="coments"  name = "delko">
    @foreach ($coment as $comen)
 
       <div class="mar-btm" id="{{$comen['id']}}"  name = "delko" >

    @if($user == null)
       <a href="/strangerakk/{{$comen['user_id']}}" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{$comen['name']}}</a>
    @endif

    @if($user != null)
    @if($comen['user_id'] == $user['id'])
       <a href="/myakk" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{$comen['name']}}</a>
    @else
       <a href="/strangerakk/{{$comen['user_id']}}" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{$comen['name']}}</a>
    @endif
    @endif
  
       <div style ="min-height: 100px;" >
       <img src="{{$comen['urlimg']}}" class="rounded float-left" style ="height: 100px;"alt="...">
       <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> {{$comen['created_at']}}</p>
       <div class="coment" style="word-wrap: break-word";>
    {{$comen['coment']}}
       </div>
      </div>

       <div class="container">
       <div class="row">
       <div class="pad-ver" style="width: 100%;">
    
 
@if($user)
  
    
     
       
    @if($comen['comuser'] == $user['id'])
        <img style="width: 32px; margin: 5px; cursor: url('/resources/pack2.png'), pointer;" onclick="ComentLike({{$comen['id']}}, {{$user['id']}})" name = "like" id = "Like{{$comen['id']}}" src="/resources/raznoe/good-quality2.png"/>
  
       <insert id = "Count{{$comen['id']}}">{{$comen['count']}}</insert>
         
    @endif
        @if($comen['dizcomuser'] == $user['id'])
        <img style="width: 32px; margin: 5px; cursor: url('/resources/pack2.png'), pointer;" onclick="ComentDizLike({{$comen['id']}}), {{$user['id']}}" id = "DizLike{{$comen['id']}}" name = "dizlike" src="/resources/raznoe/not-good-quality2.png"/>
    <insert id = "dizCount{{$comen['id']}}">{{$comen['dizcount']}}</insert>
    @endif
    @if(!$comen['comuser'] || $comen['comuser'] != $user['id'])
        <img style="width: 32px; margin: 5px; cursor: url('/resources/pack2.png'), pointer;" onclick="ComentLike({{$comen['id']}}, {{$user['id']}})" name = "notlike" id = "Like{{$comen['id']}}" src="/resources/raznoe/good-quality.png"/>
       
        <insert id = "Count{{$comen['id']}}">{{$comen['count']}}</insert>

    @endif
    @if(!$comen['dizcomuser'] || $comen['dizcomuser'] != $user['id'])
        <img style="width: 32px; margin: 5px; cursor: url('/resources/pack2.png'), pointer;" onclick="ComentDizLike({{$comen['id']}}), {{$user['id']}}" id = "DizLike{{$comen['id']}}" name = "notdizlike" src="/resources/raznoe/not-good-quality.png"/>
    <insert id = "dizCount{{$comen['id']}}">{{$comen['dizcount']}}</insert>
    @endif
 
@endif
 
 
    @if($user)
       <button type="button" class="btn btn-sm btn-outline-primary" style="cursor: url('/resources/pack2.png'), pointer; float:right; margin: 5px;" onclick="ComentOtvet({{$comen['id']}})" id = "ComOtvet{{$comen['id']}}">Ответить</button>
 
    @if($comen['user_id'] == $user['id'])
 <button type="button" class="btn btn-sm btn-outline-danger" style="cursor: url('/resources/pack2.png'), pointer; float:right; margin: 5px;" onclick="delComent({{$comen['id']}})" id = "delCom">Удалить</button>

 @endif
 @endif
 </div>

 
 
 </div>
 </div>
   <div id="createForm{{$comen['id']}}" hidden>
            <textarea class="form-control" rows="2" type="text" placeholder="Добавьте Ваш комментарий" id="coment2{{$comen['id']}}" ></textarea>
             <button class="btn btn-sm btn-primary pull-right" style="cursor: url('/resources/pack2.png'), pointer;" onclick="createComentOtvet({{$comen['id']}})" id="createComentOtvet">Добавить</button>
        </div>

 @foreach ($comentotvetid2 as $comenid)

    @if($comen['id'] == $comenid['coment_id'])

       <a class="badge badge-pill badge-secondary" style="cursor: url('/resources/pack2.png'), pointer;" onclick="ComentOpen({{$comen['id']}})" name = "close" id = "ComOpen{{$comen['id']}}">Показать {{$comenid['count(*)']}}
    @if($comenid['count(*)'] == 1)ответ</a>
    @elseif($comenid['count(*)'] == 2)ответа</a>
    @elseif($comenid['count(*)'] == 3)ответа</a>
    @elseif($comenid['count(*)'] == 4)ответа</a>
    @else ответов </a>

    @endif
    @endif

    @endforeach 
 <hr style="    margin-top: 0rem; 
     margin-bottom: 0rem; " >  

 </div>


<!--ОТВЕТЫ КОМЕНТАРИЕВ-->

    <div id="close{{$comen['id']}}"  hidden> 
     @foreach ($comentotvet as $comentotv)
    
  
@if($comentotv['coment_id'] == $comen['id'])


<div class="mar-btm2" id="{{$comentotv['id']}}"  name = "delko" style="margin-left: 10%;">
@if($user == null)
<a href="/strangerakk/{{$comentotv['user_id']}}" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{$comentotv['name']}}</a>
@endif
@if($user != null)

@if($comentotv['user_id'] == $user['id'])
 <a href="/myakk" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{$comentotv['name']}}</a>
  @else
  <a href="/strangerakk/{{$comentotv['user_id']}}" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{$comentotv['name']}}</a>
  @endif
  @endif
  <div style ="min-height: 100px;" >
 <img src="{{$comentotv['urlimg']}}" class="rounded float-left" style ="height: 100px;"alt="...">
 <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> {{$comentotv['created_at']}}</p>
 <div class="coment" style="word-wrap: break-word";>
   
    @foreach ($comentotvetusername as $otvetusername)

@if($otvetusername['coment_id'] == $comen['id'])
@if($otvetusername['id'] == $comentotv['id'])

   @if($comentotv['coment_user_id'] != null)
@if($user == null)
<a href="/strangerakk/{{$comentotv['coment_user_id']}}" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{'@' . $otvetusername['name']}}</a>
@endif
@if($user != null)
@if($comentotv['coment_user_id'] == $user['id'])
 <a href="/myakk" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{'@' . $otvetusername['name']}}</a>
  @else
  <a href="/strangerakk/{{$comentotv['coment_user_id']}}" style="cursor: url('/resources/pack2.png'), pointer; text-decoration: none;" class="btn-link text-semibold media-heading box-inline">{{'@' . $otvetusername['name']}}</a>
  @endif
  @endif
  @endif
 @endif
 @endif
   @endforeach  
  {!! $comentotv['coment'] !!}

  </div>
  </div>
  <div class="container">
 <div class="pad-ver">
  @if($user)

       
    @if($comentotv['comuser'] == $user['id'])
        <img style="width: 32px; margin: 5px; cursor: url('/resources/pack2.png'), pointer;" onclick="ComentOtvLike({{$comentotv['id']}}, {{$user['id']}})" 
        name = "otvlike" id = "OtvLike{{$comentotv['id']}}" src="/resources/raznoe/good-quality2.png"/>
  
       <insert id = "CountOtv{{$comentotv['id']}}">{{$comentotv['count']}}</insert>
         
    @endif
        @if($comentotv['dizcomuser'] == $user['id'])
        <img style="width: 32px; margin: 5px; cursor: url('/resources/pack2.png'), pointer;" onclick="ComentOtvDizLike({{$comentotv['id']}}, {{$user['id']}})" id = "OtvDizLike{{$comentotv['id']}}" 
        name = "otvdizlike" src="/resources/raznoe/not-good-quality2.png"/>
        <insert id = "dizCountOtv{{$comentotv['id']}}">{{$comentotv['dizcount']}}</insert>
    @endif
    
    @if(!$comentotv['comuser'] || $comentotv['comuser'] != $user['id'])
        <img style="width: 32px; margin: 5px; cursor: url('/resources/pack2.png'), pointer;" onclick="ComentOtvLike({{$comentotv['id']}}, {{$user['id']}})" 
 name = "nototvlike" id = "OtvLike{{$comentotv['id']}}" src="/resources/raznoe/good-quality.png"/>
       
        <insert id = "CountOtv{{$comentotv['id']}}">{{$comentotv['count']}}</insert>

    @endif
    @if(!$comentotv['dizcomuser'] || $comentotv['dizcomuser'] != $user['id'])
        <img style="width: 32px; margin: 5px; cursor: url('/resources/pack2.png'), pointer;" onclick="ComentOtvDizLike({{$comentotv['id']}}, {{$user['id']}})" id = "OtvDizLike{{$comentotv['id']}}" 
 name = "nototvdizlike" src="/resources/raznoe/not-good-quality.png"/>
    <insert id = "dizCountOtv{{$comentotv['id']}}">{{$comentotv['dizcount']}}</insert>
    @endif
 
@endif
 
 @if($user)
 <button type="button" class="btn btn-sm btn-outline-primary" style="cursor: url('/resources/pack2.png'), pointer; float:right; margin: 5px;" onclick="ComentOtvet({{$comentotv['id']}})" id = "ComOtvet{{$comentotv['id']}}">Ответить</button>
 
 @if($comentotv['user_id'] == $user['id'])
 <button type="button" class="btn btn-sm btn-outline-danger" style="cursor: url('/resources/pack2.png'), pointer; float:right; margin: 5px;" onclick="delComentOtvet({{$comentotv['id']}})" id = "delComOtv">Удалить</button>

 @endif
 @endif
 </div>
 </div>
   <div id="createForm{{$comentotv['id']}}" hidden>
     
            <textarea class="form-control" rows="2" type="text" placeholder="Добавьте Ваш комментарий" id="comentys3{{$comentotv['id']}}" ></textarea>
             <button class="btn btn-sm btn-primary pull-right" style="cursor: url('/resources/pack2.png'), pointer;" onclick="createComentOtvetNaOtvet({{$comentotv['id']}}, {{$comen['id']}}, '{{$comentotv['name']}}', {{$comentotv['user_id']}})" id="createComentOtvetNaOtvet" >Добавить</button>
        </div>
 <hr>  
 </div>
 
@endif
  @endforeach
    
    </div> 

     @endforeach 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script>

 let id_mangi = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;


document.getElementById('createComent').addEventListener('click', function () {//по клику на кнопку Добавить

    let coment = document.getElementById('coment').value;//получаем значение поля с текстом
    document.getElementById('coment').value = '';
  
    let post_id = <?php echo json_encode($post->id); ?>;      //это просто установка ид поста
    let user_name = <?php echo json_encode($user['name'] ?? ''); ?>;
    let user_img = <?php echo json_encode($user['urlimg'] ?? ''); ?>;
            let requestData = {   //собираем данные для отправки постом
                
                post_id: post_id,
                coment: coment
            };
            let http = new XMLHttpRequest();
            let url = '/coment'; 
            http.open('POST', url, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер

     http.onreadystatechange = function() {//Call a function when the state changes. Если отправились и получили статус правильный делаем дальше
        if(http.readyState === 4 && http.status === 201) {
           

             
            let url = '/' + post_id + '/viewNew'; 
            fetch(url).then(function(response) {//каждый раз как нажимают на отправить и получают статус ок мы делаем запрос на сервер фетч хреначит в базу по пути от контроллера который получает все коменты по ид поста
            response.json().then(function(text) {

              
                 let lastKey3 = text.length-1;//сортируем и получаем последний ключь
                 
                 let lastValue = text[lastKey3];
                 let lastIdComent = lastValue.id;
                 console.log(text);
                 console.log(lastValue);
                 console.log(lastIdComent);
     
                            document.getElementById('coments').innerHTML = '\n' +   //это форма хтмл которая добавляет еще один блок комента
                            '<div class="mar-btm" id="' + lastIdComent + '">\n' +
                            '<a href="#" class="btn-link text-semibold media-heading box-inline">' + user_name + '</a>\n' +
                            '<img src="'+ user_img +'" class="rounded float-left" style ="height: 100px;"alt="...">\n' +
                            '<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>Только что </p>\n' +
                            '<div class="coment" style="word-wrap: break-word";>' + requestData.coment + '</div>\n' +
                            '<div class="pad-ver">\n' +
                            '<div class="btn-group">\n' +
                            '<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>\n' +
                            '<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>\n' +
                            '</div>\n' +
                            
                            '<button type="button" class="btn btn-sm btn-outline-danger" style="cursor: pointer; float:right; margin: 5px;" onclick="delComent('+ lastIdComent +')" id = "delCom">Удалить</button\n' +
                            '</div>\n' +
                            '<hr>\n' +    
                            '</div>' + document.getElementById('coments').innerHTML
        
           });
          });       
        
        }

     }
  
});


function createComentOtvet(comenId, createComentOtvet) {


    let coment2 = document.getElementById('coment2' + comenId).value;//получаем значение поля с текстом
    console.log(coment2);
    document.getElementById('coment2' + comenId).value = '';
  
    
    let post_id = <?php echo json_encode($post->id); ?>;      //это просто установка ид поста
    let user_name = <?php echo json_encode($user['name'] ?? ''); ?>;
    let user_img = <?php echo json_encode($user['urlimg'] ?? ''); ?>;
            let requestData = {   //собираем данные для отправки постом
                coment_id: comenId,
               
                coment_user_id: '',
                post_id: post_id,
                coment: coment2
            };
            let http = new XMLHttpRequest();
            let url = '/comentOtvet'; 
            http.open('POST', url, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер

     http.onreadystatechange = function() {//Call a function when the state changes. Если отправились и получили статус правильный делаем дальше
        if(http.readyState === 4 && http.status === 201) {
           

             
            let url = '/' + post_id + '/viewNewOtvet'; 
            fetch(url).then(function(response) {//каждый раз как нажимают на отправить и получают статус ок мы делаем запрос на сервер фетч хреначит в базу по пути от контроллера который получает все коменты по ид поста
            response.json().then(function(text) {

                 let lastKey3 = text.length-1;//получаем последний ключь
                 let lastValue = text[lastKey3];
                 let lastIdComent = lastValue.id;
                 
                 console.log(text);
                 console.log(lastValue);
                 console.log(lastIdComent);
    
                            document.getElementById(comenId).innerHTML = '<div>'+ document.getElementById(comenId).innerHTML + '\n' +   //это форма хтмл которая добавляет еще один блок комента
                            
                            '<div class="mar-btm2" id="' + lastIdComent + '" style="margin-left: 10%;">\n' +
                            '<a href="#" class="btn-link text-semibold media-heading box-inline">' + user_name + '</a>\n' +
                            '<img src="'+ user_img +'" class="rounded float-left" style ="height: 100px;"alt="...">\n' +
                            '<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>Только что </p>\n' +
                            '<div class="coment" style="word-wrap: break-word";>' + requestData.coment + '</div>\n' +
                            '<div class="pad-ver">\n' +
                            '<div class="btn-group">\n' +
                            '<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>\n' +
                            '<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>\n' +
                            '</div>\n' +
                            
                            '<button type="button" class="btn btn-sm btn-outline-danger" style="cursor: pointer; float:right; margin: 5px;" onclick="delComentOtvet('+ lastIdComent +')" id = "delComOtv">Удалить</button>\n' +
                            '</div>\n' +
                            '<hr>\n' +    
                            '</div>'
        
          });
          });       
        
        }

     }
     document.getElementById('createForm' + comenId).hidden = true;//скрыть
     document.getElementById('ComOtvet' + comenId).innerHTML = 'Ответить';
  
}


function createComentOtvetNaOtvet(comenId, mainId, name, userId) {
    
   
    let coment = document.getElementById('comentys3' + comenId).value;//получаем значение поля с текстом
 
    document.getElementById('comentys3' + comenId).value = '';
  
    
    let post_id = <?php echo json_encode($post->id); ?>;      //это просто установка ид поста
    let user_name = <?php echo json_encode($user['name'] ?? ''); ?>;
    let user_img = <?php echo json_encode($user['urlimg'] ?? ''); ?>;
            
        
       //формируем запись комента в бд отличное от других записей
            
            let requestData = {   //собираем данные для отправки постом
                coment_id: mainId,//тут была проблема с записыванием из за одного параметра но теперь все ок вроде
               
                coment_user_id: userId,
                post_id: post_id,
                coment: coment
            };
            let http = new XMLHttpRequest();
            let url = '/comentOtvet'; 
            http.open('POST', url, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер

     http.onreadystatechange = function() {//Call a function when the state changes. Если отправились и получили статус правильный делаем дальше
        if(http.readyState === 4 && http.status === 201) {
           

             
            let url = '/' + post_id + '/viewNewOtvet'; 
            fetch(url).then(function(response) {//каждый раз как нажимают на отправить и получают статус ок мы делаем запрос на сервер фетч хреначит в базу по пути от контроллера который получает все коменты по ид поста
            response.json().then(function(text) {

                 let lastKey3 = text.length-1;//получаем последний ключь
                 let lastValue = text[lastKey3];
                 let lastIdComent = lastValue.id;
                 
                 console.log(text);
                 console.log(lastValue);
                 console.log(lastIdComent);
    
                            document.getElementById(comenId).innerHTML = '<div>'+ document.getElementById(comenId).innerHTML + '\n' +   //это форма хтмл которая добавляет еще один блок комента
                            
                            '<div class="mar-btm2" id="' + lastIdComent + '" style="margin-left: 10%;">\n' +
                            '<a href="#" class="btn-link text-semibold media-heading box-inline">' + user_name + '</a>\n' +
                            '<img src="'+ user_img +'" class="rounded float-left" style ="height: 100px;"alt="...">\n' +
                            '<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>Только что </p>\n' +
                            '<div class="coment" style="word-wrap: break-word";>@' + name + '' + requestData.coment + '</div>\n' +
                            '<div class="pad-ver">\n' +
                            '<div class="btn-group">\n' +
                            '<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>\n' +
                            '<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>\n' +
                            '</div>\n' +
                            
                            '<button type="button" class="btn btn-sm btn-outline-danger" style="cursor: pointer; float:right; margin: 5px;" onclick="delComentOtvet('+ lastIdComent +')" id = "delComOtv">Удалить</button>\n' +
                            '</div>\n' +
                            '<hr>\n' +    
                            '</div>'
        
          });
          });       
        
        }

     }
     document.getElementById('createForm' + comenId).hidden = true;//скрыть
     document.getElementById('ComOtvet' + comenId).innerHTML = 'Ответить';
  
}

function ComentOpen(comenId, ComOpen) {

    if(document.getElementById("ComOpen" + comenId).name == 'close'){
       document.getElementById('close' + comenId).hidden = false;//скрыть
       
       document.getElementById("ComOpen" + comenId).name = 'open';
       var str = document.getElementById('ComOpen' + comenId).innerHTML;
       document.getElementById('ComOpen' + comenId).className = "badge badge-primary";
       document.getElementById('ComOpen' + comenId).innerHTML = str.replace(/Показать/gi, 'Скрыть');
    } else {
       document.getElementById('close' + comenId).hidden = true;
       
       document.getElementById("ComOpen" + comenId).name = 'close';
       var str2 = document.getElementById('ComOpen' + comenId).innerHTML;
       document.getElementById('ComOpen' + comenId).className = "badge badge-secondary";
       document.getElementById('ComOpen' + comenId).innerHTML = str2.replace(/Скрыть/gi, 'Показать');
   }
   
}

function ComentOtvet(comenId, ComOtvet) {

    if(document.getElementById("ComOtvet" + comenId).innerHTML == 'Ответить'){
       document.getElementById('createForm' + comenId).hidden = false;//скрыть
       document.getElementById('ComOtvet' + comenId).innerHTML = 'Скрыть';
   
    } else {
       document.getElementById('createForm' + comenId).hidden = true;
       document.getElementById('ComOtvet' + comenId).innerHTML = 'Ответить';
           
       
   }
   
}

function delComentOtvet(comenId, delComOtv) {

    let http = new XMLHttpRequest();
    http.open('GET', '/' + comenId + '/delComentOtvet', true);
    console.log(comenId);
    console.log('coment delete!');

    document.getElementById(comenId).hidden = true;//скрыть 

    http.send();
    
}

function delComent(comenId, delCom) {

    let http = new XMLHttpRequest();
    http.open('GET', '/' + comenId + '/delComent', true);
    console.log(comenId);
    console.log('coment delete!');

    document.getElementById(comenId).hidden = true;//скрыть 

    http.send();
    
}


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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ComentLike(comenId, userId){
    
if(document.getElementById("Like" + comenId).name == 'notlike'){

    let post_id = id_mangi;      //это просто установка ид поста
            
        
       //формируем запись лайка в бд отличное от других записей
            
            let requestData = {   //собираем данные для отправки постом
                coment_id: comenId,
                user_id: userId,
                post_id: post_id

            };
            let http = new XMLHttpRequest();
            let url = '/comentPreLike'; 
            http.open('POST', url, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер

      
       document.getElementById("Like" + comenId).src = "/resources/raznoe/good-quality2.png"; 
       document.getElementById("Like" + comenId).name = 'like';
       let plys = document.getElementById("Count" + comenId).innerHTML;
       document.getElementById("Count" + comenId).innerHTML = ++plys;
      if(document.getElementById("DizLike" + comenId).name == 'dizlike'){
          return ComentDizLike(comenId, userId);
         
       }
    } else {
       document.getElementById("Like" + comenId).name = 'notlike';
       document.getElementById("Like" + comenId).src = "/resources/raznoe/good-quality.png"; 
       let minys = document.getElementById("Count" + comenId).innerHTML;
       document.getElementById("Count" + comenId).innerHTML = --minys;

    let http = new XMLHttpRequest();
    http.open('GET', '/' + comenId + '/delComentPreLike', true);
    console.log(comenId);
    console.log('coment delete!');

   

    http.send();

        
    }

}
function ComentDizLike(comenId, userId){
    
if(document.getElementById("DizLike" + comenId).name == 'notdizlike'){
      let post_id = id_mangi;      //это просто установка ид поста
            
        
       //формируем запись лайка в бд отличное от других записей
            
            let requestData = {   //собираем данные для отправки постом
                coment_id: comenId,
                user_id: userId,
                post_id: post_id

            };
            let http = new XMLHttpRequest();
            let url = '/comentPreDizLike'; 
            http.open('POST', url, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер

      
       document.getElementById("DizLike" + comenId).src = "/resources/raznoe/not-good-quality2.png"; 
       document.getElementById("DizLike" + comenId).name = 'dizlike';
       let plys = document.getElementById("dizCount" + comenId).innerHTML;
       document.getElementById("dizCount" + comenId).innerHTML = ++plys;
       if(document.getElementById("Like" + comenId).name == 'like'){
          return ComentLike(comenId, userId);
       }
      
    } else {
       document.getElementById("DizLike" + comenId).name = 'notdizlike';
       document.getElementById("DizLike" + comenId).src = "/resources/raznoe/not-good-quality.png"; 
       let minys = document.getElementById("dizCount" + comenId).innerHTML;
       document.getElementById("dizCount" + comenId).innerHTML = --minys;
        
       let http = new XMLHttpRequest();
       http.open('GET', '/' + comenId + '/delComentPreDizLike', true);
       console.log(comenId);
       console.log('coment delete!');

   

    http.send();

   }

}
function ComentOtvLike(comenId, userId){
    
if(document.getElementById("OtvLike" + comenId).name == 'nototvlike'){
     let post_id = id_mangi;      //это просто установка ид поста
            
        
       //формируем запись лайка в бд отличное от других записей
            
            let requestData = {   //собираем данные для отправки постом
                coment_id: comenId,
                user_id: userId,
                post_id: post_id

            };
            let http = new XMLHttpRequest();
            let url = '/comentPreOtvLike'; 
            http.open('POST', url, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер
      
       document.getElementById("OtvLike" + comenId).src = "/resources/raznoe/good-quality2.png"; 
       document.getElementById("OtvLike" + comenId).name = 'otvlike';
          let plys = document.getElementById("CountOtv" + comenId).innerHTML;
       document.getElementById("CountOtv" + comenId).innerHTML = ++plys;
      if(document.getElementById("OtvDizLike" + comenId).name == 'otvdizlike'){
          return ComentOtvDizLike(comenId, userId);
         
       }
    } else {
       document.getElementById("OtvLike" + comenId).name = 'nototvlike';
       document.getElementById("OtvLike" + comenId).src = "/resources/raznoe/good-quality.png"; 
        let minys = document.getElementById("CountOtv" + comenId).innerHTML;
       document.getElementById("CountOtv" + comenId).innerHTML = --minys;
       let http = new XMLHttpRequest();
       http.open('GET', '/' + comenId + '/delComentPreOtvLike', true);
       console.log(comenId);
       console.log('coment delete!');
       http.send();
   }

}
function ComentOtvDizLike(comenId, userId){
    
if(document.getElementById("OtvDizLike" + comenId).name == 'nototvdizlike'){
     let post_id = id_mangi;      //это просто установка ид поста
            
        
       //формируем запись лайка в бд отличное от других записей
            
            let requestData = {   //собираем данные для отправки постом
                coment_id: comenId,
                user_id: userId,
                post_id: post_id

            };
            let http = new XMLHttpRequest();
            let url = '/comentPreOtvDizLike'; 
            http.open('POST', url, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер
      
       document.getElementById("OtvDizLike" + comenId).src = "/resources/raznoe/not-good-quality2.png"; 
       document.getElementById("OtvDizLike" + comenId).name = 'otvdizlike';
        let plys = document.getElementById("dizCountOtv" + comenId).innerHTML;
       document.getElementById("dizCountOtv" + comenId).innerHTML = ++plys;
       if(document.getElementById("OtvLike" + comenId).name == 'otvlike'){
          return ComentOtvLike(comenId, userId);
       }
      
    } else {
       document.getElementById("OtvDizLike" + comenId).name = 'nototvdizlike';
       document.getElementById("OtvDizLike" + comenId).src = "/resources/raznoe/not-good-quality.png"; 
       let minys = document.getElementById("dizCountOtv" + comenId).innerHTML;
       document.getElementById("dizCountOtv" + comenId).innerHTML = --minys;
       let http = new XMLHttpRequest();
       http.open('GET', '/' + comenId + '/delComentPreOtvDizLike', true);
       console.log(comenId);
       console.log('coment delete!');
       http.send();
   }
}

 </script>
   
@endsection