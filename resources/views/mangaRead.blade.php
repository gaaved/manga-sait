@extends('layouts.master')


@section('content')


     <div class="row">
     
       <div class="btn-group" style="margin-left: auto; margin-right: auto;">

             
          <div style=" margin:5px;">
                <a class="btn btn-outline-secondary" href="/manga/{{$id}}">Манга</a>
          </div>
  
   
        <div style="width: 100px; margin:5px;">
            
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuLink">Глава {{$glava}}</button>
              <div class="dropdown-menu">
                @foreach($skolkoGlav as $glava2)
        
        <a class="dropdown-item" href="/mangaRead/{{$id}}/{{$glava2}}/{{$page}}">{{$glava2}}</a> <!--отображение номера главы (тут хотя бы без +1)))-->
    
                @endforeach
   
              </div>
        </div>
    </div>

        
        <div id="main"style="width: 100px; margin:5px;">
            <div class="input-group-prepend">
             <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuLink">Страница <span id="buttonCountNumber">1</span></button>
             <div class="dropdown-menu" style=" max-height: 200px; overflow-y: auto;">
                @foreach(array_keys($results) as $result)
        
        <a class="dropdown-item" href="/mangaRead/{{$id}}/{{$glava}}/{{$result+1}}">{{$result+1}}</a> <!--отображение номера страницы (да я знаю что +1 просто жесть)))-->
    
                @endforeach
   
             </div>
        </div>
  </div>
    <div style="width: 38px; height: 38px; margin:5px; margin-left:30px; ">  
    <div class="border border-secondary" style=" border-radius: 4px; cursor:pointer;" id="knop">
    <img class="card-img-top" onClick="changeRazmer()" id = "razmer"  name = "smoll" src="/resources/razmer.svg"/> 
    </div>
    </div>
  </div>
  </div>



<div>
    <div class ="col-6 col-sm-4 col-md-5" style="margin-left: auto; margin-right: auto;" id = "cart">
               <div class="card h-70 ">
                  
                  <img class="card-img-top" id = "img2" src=""/>  
                
    
    <a class="carousel-control-next" role="button" onClick="changeCount('plus')" id="buttonCountPlus" style = "width:50%; cursor:pointer;"></a>
 
   <a class="carousel-control-prev" role="button" onClick="changeCount('minus')" id="buttonCountMinus"  style = "width:50%; cursor:pointer;"></a>
   
 
  
 
               </div>
            </div><br />
            <div style = "display: none">
              
                  <img class="card-img-top" lazy = "loading" id = "img2" src="{{$folder}}{{$result}}"/>   
                  
            </div>        
            
        <!--    {{$folder}}-->
        <!--    {{print_r($results)}}-->
        <!--@foreach($results as $result)           -->
        <!--    <div style = "display: none">-->
              
        <!--          <img class="card-img-top" id = "img2" src="{{$folder}}{{$result}}"/>   -->
                  
        <!--    </div>        -->
        <!--@endforeach-->
 <div class="container"> 
@if($user != null)
      <div id="createForm" style="width: 100%; height: 110px;">
            <textarea class="form-control" rows="2" type="text" placeholder="Добавьте Ваш комментарий" id="coment" ></textarea>
             <button class="btn btn-sm btn-primary pull-right" style="cursor: url('/resources/pack2.png'), pointer; float:right; margin: 5px;" 
             type="submit" onclick="createComentManga()"id="createComentManga">Добавить</button>
        </div>
 @endif   

 
    <h5>Коментарии</h5>
    <div class="mar-btm" id="coments"  name = "delko">
@foreach ($coment as $comen)
 
 <div class="mar-btm" id="{{$comen['id']}}"  name = "delko"  hidden>

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


 <div class="pad-ver" style="width: 100%;" >


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
 <button type="button" class="btn btn-sm btn-outline-danger" style="cursor: url('/resources/pack2.png'), pointer; float:right; margin: 5px;" onclick="delComentManga({{$comen['id']}})" id = "delCom">Удалить</button>

 @endif
 @endif
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
 </div>
 </div>
   <div id="createForm{{$comen['id']}}" style="width: 100%; height: 90px;" hidden>
          
            <textarea class="form-control" rows="2" type="text" placeholder="Добавьте Ваш комментарий" id="coment2{{$comen['id']}}" ></textarea>
             <button class="btn btn-sm btn-primary pull-right" style="cursor: url('/resources/pack2.png'), pointer; float:right; margin: 5px; " onclick="createComentOtvet({{$comen['id']}})" id="createComentOtvet">Добавить</button>
        </div>


 <hr style="    margin-top: 0rem; 
     margin-bottom: 0rem; ">  

 </div>

<!--ОТВЕТЫ КОМЕНТАРИЕВ-->

    <div id="close{{$comen['id']}}"  hidden> 
     @foreach ($comentotvet as $comentotv)
    
  
@if($comentotv['coment_id'] == $comen['id'])


<div class="mar-btm2" id="otv{{$comentotv['id']}}"  name = "delko" style="margin-left: 10%;">
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
   <div id="createForm{{$comentotv['id']}}" style="width: 100%; height: 110px;" hidden>
     <div>
            <textarea class="form-control" rows="2" type="text" placeholder="Добавьте Ваш комментарий" id="comentys3{{$comentotv['id']}}" ></textarea>
             <button class="btn btn-sm btn-primary pull-right" style="cursor: url('/resources/pack2.png'), pointer; float:right; margin: 5px;" onclick="createComentOtvetNaOtvet({{$comentotv['id']}}, {{$comen['id']}}, '{{$comentotv['name']}}', {{$comentotv['user_id']}})" id="createComentOtvetNaOtvet" >Добавить</button>
        </div>
        </div>
 <hr style="    margin-top: 0rem; 
     margin-bottom: 0rem; ">  
 </div>
 
@endif
  @endforeach
    
    </div> 

     @endforeach 
 
    </div>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


<script>









let count = document.getElementById("buttonCountNumber");

    let folder = <?php echo json_encode("$folder", JSON_HEX_TAG); ?>;
    let skolkoGlav = <?php echo json_encode($skolkoGlav); ?>;
    let id_mangi = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
    let results = <?php echo json_encode($results); ?>;
    let defoltpage = <?php echo json_encode($page); ?>;
    let coment = <?php echo json_encode($coment); ?>;
    let comentotvet = <?php echo json_encode($comentotvet); ?>;








document.addEventListener("DOMContentLoaded", function() {

  for (var i = 0; i < 3; i++) {
  // по идее должно подгружать первые 3 картинки и только потом все остальные
    var image = new Image();
    let gg = folder + results[i];
    image.src = gg;
     }
  
   image.onload = function(){
    for (var i = 2; i < results.length; i++) {
    var image = new Image();
    let gg = folder + results[i];
     image.src = gg;
     }       
    }
   });


    let url = window.location.href;
    let glavfinal = url.split("/").reverse()[1];//определяем главу из урл просто значение после/
    console.log(glavfinal);
    let index = skolkoGlav.indexOf(glavfinal); // получаем индекс последний из массива глав

    console.log(index);


    let pagefinal = url.substr(url.lastIndexOf('/') + 1);// определяем страницу тоже из урла
   console.log(pagefinal);
    
    let cc = pagefinal-1;//получаем значение индекса массива с картинками

    let ff = results[cc];//вытягиваем саму запись из массива

    document.getElementById("img2").src = folder + ff;//показываем картинку
    count.innerHTML = cc+1;//номер страницы показывается на счетчике

    console.log(pagefinal + "this pagefinal");

coment.forEach(element => {//показываем коменты только этой страницы
    if(element.glava == glavfinal){
     if(element.page == pagefinal){
    document.getElementById(element.id).hidden = false;//open
     }
    }
    });

comentotvet.forEach(element => {//показываем коментыответы только этой страницы
    if(element.glava == glavfinal){
     if(element.page == pagefinal){
    document.getElementById(element.id).hidden = false;//open
     }
    }
    });




   
    

let changeCount = function(param){
    // debugger;
    //если жмем кнопку +
    
    
    if(param === 'plus'){
        
        pagefinal = ++pagefinal;
        console.log(pagefinal + "this plus pagefinal");
  
        if(pagefinal <= results.length) {
            history.pushState(null, null, '/mangaRead/' + id_mangi + '/' + skolkoGlav[index] + '/' +  pagefinal);

            count.innerHTML = pagefinal;//записываем и отображаем счетчик
            
            let cc = pagefinal-1;
            
            let ff = results[cc];

            document.getElementById("img2").src = folder + ff;//и картинку под счетчик меняем
        }

        if(pagefinal > results.length){
            window.location.href = '/mangaRead/' + id_mangi + '/' + skolkoGlav[++index] + '/' + defoltpage;
        }

        if(index == skolkoGlav.length){//если глава последняяя то при нажатии на + на последней картинке перекидывает на главную стр. манги
            location.href = '/manga/' + id_mangi;
        } 
    
    
        let fort2 = document.getElementsByName('open');
        console.log(fort2);
        for (let i = 0; i < fort2.length; i++) {
            let status2 = fort2[i].id;
            console.log(status2);
            document.getElementById(status2).name = 'close';
        let str2 = document.getElementById(status2).innerHTML;
        document.getElementById(status2).className = "badge badge-secondary";
        document.getElementById(status2).innerHTML = str2.replace(/Скрыть/gi, 'Показать');
            
        }
    
        let fort = document.getElementsByName('ggg'); //убираем только что добавленные коменты
          for (let i = 0; i < fort.length; i++) {
            let status = fort[i].id;
            console.log(status);
            document.getElementById(status).hidden = true;
            // document.getElementById("ComOpen" + status).name = 'open';
            // document.getElementById('close' + status).hidden = true;;//скрыть 
        }

        coment.forEach(element => {//показываем коменты только этой страницы
        if(element.glava == glavfinal){
        if(element.page == pagefinal){
        document.getElementById(element.id).hidden = false;//open
        

        }else{document.getElementById(element.id).hidden = true;
            document.getElementById('close' + element.id).hidden = true;
            
        }//скрыть
        } 
        });
        
        comentotvet.forEach(element => {//показываем коменты только этой страницы
    if(element.glava == glavfinal){
     if(element.page == pagefinal){
    document.getElementById(element.id).hidden = false;//open

         
     }
    }
    });
        
        }
    
    
    //если жмем кнопку -
    if(param === 'minus'){
     if(pagefinal > 1){
        pagefinal = --pagefinal;
        console.log(pagefinal + "this minus pagefinal");
     }
        let urlpage = pagefinal-1;
        console.log(urlpage);
     
            if(pagefinal >= 1){
        
             let countMinus = count.innerHTML;
             history.pushState(null, null, '/mangaRead/' + id_mangi + '/' + skolkoGlav[index] + '/' +  pagefinal);
             count.innerHTML = pagefinal;
             let ff = results[urlpage];
             document.getElementById("img2").src = folder + ff;   
        }
        
        
        let fort2 = document.getElementsByName('open');
        console.log(fort2);
        for (let i = 0; i < fort2.length; i++) {
            let status2 = fort2[i].id;
            console.log(status2);
            document.getElementById(status2).name = 'close';
        let str2 = document.getElementById(status2).innerHTML;
        document.getElementById(status2).className = "badge badge-secondary";
        document.getElementById(status2).innerHTML = str2.replace(/Скрыть/gi, 'Показать');
            
        }
        
        let fort = document.getElementsByName('ggg'); //убираем только что добавленные коменты
          for (let i = 0; i < fort.length; i++) {
            let status = fort[i].id;
            console.log(status);

            document.getElementById(status).hidden = true;;//скрыть 
        } 

         coment.forEach(element => {
        if(element.glava == glavfinal){
        if(element.page == pagefinal){
        document.getElementById(element.id).hidden = false;//open
    
        }else{document.getElementById(element.id).hidden = true;
          document.getElementById('close' + element.id).hidden = true;
        
           
            
        }//скрыть
        } 
        });
         comentotvet.forEach(element => {//показываем коменты только этой страницы
        if(element.glava == glavfinal){
        if(element.page == pagefinal){
        document.getElementById(element.id).hidden = false;//open
      
         
     }
    }
    });
    }
}

function createComentManga() {   
 let url = window.location.href;
    let glavfinal = url.split("/").reverse()[1];//определяем главу из урл просто значение после/
   
    let pagefinal = url.substr(url.lastIndexOf('/') + 1);// определяем страницу тоже из урла
    
   
    let coment = document.getElementById('coment').value;//получаем значение поля с текстом
    document.getElementById('coment').value = '';
  
    let post_id = id_mangi;      //это просто установка ид поста
    let user_name = <?php echo json_encode($user['name'] ?? ''); ?>;
    let user_img = <?php echo json_encode($user['urlimg'] ?? ''); ?>;
    let glava = glavfinal;       
    let page = pagefinal;
    let requestData = {   //собираем данные для отправки постом
                
                post_id: post_id,
                glava: glava,
                page: page,
                coment: coment
            };
           
            
            
            let http = new XMLHttpRequest();
            let url2 = '/comentMangaPage'; 
            http.open('POST', url2, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер

     http.onreadystatechange = function() {//Call a function when the state changes. Если отправились и получили статус правильный делаем дальше
        if(http.readyState === 4 && http.status === 201) {
           

             
            let url = '/' + post_id + '/viewNewMangaPage'; 
            fetch(url).then(function(response) {//каждый раз как нажимают на отправить и получают статус ок мы делаем запрос на сервер фетч хреначит в базу по пути от контроллера который получает все коменты по ид поста
            response.json().then(function(text) {

                 let lastKey3 = text.length-1;//сортируем и получаем последний ключь
                 
                 let lastValue = text[lastKey3];
                 let lastIdComent = lastValue.id;

                            document.getElementById('coments').innerHTML = '\n' +   //это форма хтмл которая добавляет еще один блок комента
                            '<div class="mar-btm" id="' + lastIdComent + '" name ="ggg">\n' +
                            '<a href="" class="btn-link text-semibold media-heading box-inline">' + user_name + '</a>\n' +
                            '<img src="'+ user_img +'" class="rounded float-left" style ="height: 100px;"alt="...">\n' +
                            '<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>Только что </p>\n' +
                            '<div class="coment" style="word-wrap: break-word";>' + requestData.coment + '</div>\n' +
                            '<div class="pad-ver">\n' +
                            '<div class="btn-group">\n' +
                            '<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>\n' +
                            '<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>\n' +
                            '</div>\n' +
                            
                            '<button type="button" class="btn btn-sm btn-outline-danger" style="cursor: pointer; float:right; margin-right: 5px;" onclick="delComentManga('+ lastIdComent +')" id = "delCom">Удалить</button\n' +
                            '</div>\n' +
                            '<hr>\n' +    
                            '</div>\n' + 
                            '</div>' + document.getElementById('coments').innerHTML
            
            
           
          });
      
          });       
        
        }

     }
 
}

function createComentOtvet(comenId, createComentOtvet) {
let url = window.location.href;
    let glavfinal = url.split("/").reverse()[1];//определяем главу из урл просто значение после/
   
    let pagefinal = url.substr(url.lastIndexOf('/') + 1);// определяем страницу тоже из урла

    let coment2 = document.getElementById('coment2' + comenId).value;//получаем значение поля с текстом
    console.log(coment2);
    document.getElementById('coment2' + comenId).value = '';
  
    
    let post_id = id_mangi;      //это просто установка ид поста
    let user_name = <?php echo json_encode($user['name'] ?? ''); ?>;
    let user_img = <?php echo json_encode($user['urlimg'] ?? ''); ?>;
     let glava = glavfinal;       
    let page = pagefinal;        
            let requestData = {   //собираем данные для отправки постом
                coment_id: comenId,
               
                coment_user_id: '',
                post_id: post_id,
                glava: glava,
                page: page,
                coment: coment2
            };
            let http = new XMLHttpRequest();
            let url2 = '/comentOtvetMangaPage'; 
            http.open('POST', url2, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер

     http.onreadystatechange = function() {//Call a function when the state changes. Если отправились и получили статус правильный делаем дальше
        if(http.readyState === 4 && http.status === 201) {
           

             
            let url = '/' + post_id + '/viewNewOtvetmangaPage'; 
            fetch(url).then(function(response) {//каждый раз как нажимают на отправить и получают статус ок мы делаем запрос на сервер фетч хреначит в базу по пути от контроллера который получает все коменты по ид поста
            response.json().then(function(text) {

                 let lastKey3 = text.length-1;//получаем последний ключь
                 let lastValue = text[lastKey3];
                 let lastIdComent = lastValue.id;
                 
                 console.log(text);
                 console.log(lastValue);
                 console.log(lastIdComent);
    
                            document.getElementById(comenId).innerHTML = '<div>'+ document.getElementById(comenId).innerHTML + '\n' +   //это форма хтмл которая добавляет еще один блок комента
                            
                            '<div class="mar-btm2" id="' + lastIdComent + '" style="margin-left: 10%;" name ="ggg">\n' +
                            '<a href="" class="btn-link text-semibold media-heading box-inline">' + user_name + '</a>\n' +
                            '<img src="'+ user_img +'" class="rounded float-left" style ="height: 100px;"alt="...">\n' +
                            '<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>Только что </p>\n' +
                            '<div class="coment" style="word-wrap: break-word";>' + requestData.coment + '</div>\n' +
                            '<div class="pad-ver">\n' +
                            '<div class="btn-group">\n' +
                            '<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>\n' +
                            '<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>\n' +
                            '</div>\n' +
                            
                            '<button type="button" class="btn btn-sm btn-outline-danger" style="cursor: pointer; float:right; margin-right: 5px;" onclick="delComentOtvet('+ lastIdComent +')" id = "delComOtv">Удалить</button>\n' +
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
    let url = window.location.href;
    let glavfinal = url.split("/").reverse()[1];//определяем главу из урл просто значение после/
   
    let pagefinal = url.substr(url.lastIndexOf('/') + 1);// определяем страницу тоже из урла
    
    let coment = document.getElementById('comentys3' + comenId).value;//получаем значение поля с текстом
    
 
    
    
    document.getElementById('comentys3' + comenId).value = '';
  
    
    let post_id = id_mangi;      //это просто установка ид поста
    let user_name = <?php echo json_encode($user['name'] ?? ''); ?>;
    let user_img = <?php echo json_encode($user['urlimg'] ?? ''); ?>;
    let glava = glavfinal;       
    let page = pagefinal;               
        
       //формируем запись комента в бд отличное от других записей
            
            let requestData = {   //собираем данные для отправки постом
                coment_id: mainId,//тут была проблема с записыванием из за одного параметра но теперь все ок вроде
               
                coment_user_id: userId,
                post_id: post_id,
                glava: glava,
                page: page,
                coment: coment
            };
            let http = new XMLHttpRequest();
            let url2 = '/comentOtvetMangaPage'; 
            http.open('POST', url2, true);
            
            http.setRequestHeader('Content-type', 'application/json');
            http.setRequestHeader('Accept', 'application/json');
         
            http.send(JSON.stringify(requestData)); //отправили данные на сервер

     http.onreadystatechange = function() {//Call a function when the state changes. Если отправились и получили статус правильный делаем дальше
        if(http.readyState === 4 && http.status === 201) {
           

             
            let url = '/' + post_id + '/viewNewOtvetmangaPage'; 
            fetch(url).then(function(response) {//каждый раз как нажимают на отправить и получают статус ок мы делаем запрос на сервер фетч хреначит в базу по пути от контроллера который получает все коменты по ид поста
            response.json().then(function(text) {

                 let lastKey3 = text.length-1;//получаем последний ключь
                 let lastValue = text[lastKey3];
                 let lastIdComent = lastValue.id;
                 
                 console.log(text);
                 console.log(lastValue);
                 console.log(lastIdComent);
    
                            document.getElementById('otv' + comenId).innerHTML = '<div>'+ document.getElementById('otv' + comenId).innerHTML + '\n' +   //это форма хтмл которая добавляет еще один блок комента
                            
                            '<div class="mar-btm2" id="otv' + lastIdComent + '" style="margin-left: 10%;" name ="ggg">\n' +
                            '<a href="#" class="btn-link text-semibold media-heading box-inline">' + user_name + '</a>\n' +
                            '<img src="'+ user_img +'" class="rounded float-left" style ="height: 100px;"alt="...">\n' +
                            '<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>Только что </p>\n' +
                            '<div class="coment" style="word-wrap: break-word";><a href="" class="btn-link text-semibold media-heading box-inline">@' + name + '</a>' + ' ' + requestData.coment + '</div>\n' +
                            '<div class="pad-ver">\n' +
                            '<div class="btn-group">\n' +
                            '<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>\n' +
                            '<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>\n' +
                            '</div>\n' +
                            
                            '<button type="button" class="btn btn-sm btn-outline-danger" style="cursor: pointer; float:right; margin-right: 5px;" onclick="delComentOtvet('+ lastIdComent +')" id = "delComOtv">Удалить</button>\n' +
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
       let str = document.getElementById('ComOpen' + comenId).innerHTML;
       document.getElementById('ComOpen' + comenId).className = "badge badge-primary";
       document.getElementById('ComOpen' + comenId).innerHTML = str.replace(/Показать/gi, 'Скрыть');
    } else {
       document.getElementById('close' + comenId).hidden = true;
       
       document.getElementById("ComOpen" + comenId).name = 'close';
       let str2 = document.getElementById('ComOpen' + comenId).innerHTML;
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



function delComentManga(comenId) {

    let http = new XMLHttpRequest();
    http.open('GET', '/' + comenId + '/delComentManga', true);
    console.log(comenId);
    console.log('coment delete!');

    document.getElementById(comenId).style.display = 'none';//скрыть 

    http.send();
    
}

function delComentOtvet(comenId, delComOtv) {

    let http = new XMLHttpRequest();
    http.open('GET', '/' + comenId + '/delComentOtvetMangaPage', true);
    console.log(comenId);
    console.log('coment delete!');

    document.getElementById('otv' + comenId).hidden = true;;//скрыть 

    http.send();
    
}

function changeRazmer() {
    

    
    if(document.getElementById("razmer").name == 'smoll'){
       document.getElementById("cart").className = "col-6 col-sm-4 col-md-8";//скрыть
    document.getElementById("knop").className = "border border-danger";//скрыть
    document.getElementById("razmer").name = 'big';
       }else{
           document.getElementById("cart").className = "col-6 col-sm-4 col-md-5";//скрыть
    document.getElementById("knop").className = "border border-secondary";//скрыть
    document.getElementById("razmer").name = 'smoll';
       }
   
}


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
            let url = '/comentLike'; 
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
    http.open('GET', '/' + comenId + '/delComentLike', true);
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
            let url = '/comentDizLike'; 
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
       http.open('GET', '/' + comenId + '/delComentDizLike', true);
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
            let url = '/comentOtvLike'; 
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
       http.open('GET', '/' + comenId + '/delComentOtvLike', true);
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
            let url = '/comentOtvDizLike'; 
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
       http.open('GET', '/' + comenId + '/delComentOtvDizLike', true);
       console.log(comenId);
       console.log('coment delete!');
       http.send();
   }

}


</script>
            
            
            
@endsection            