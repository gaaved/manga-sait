@extends('layouts.master')


@section('content')



  <div class="row">
      
    <div class="col-md-8">
        
       <h1> Прочитанно </h1>
        <div class="row">
     @foreach($post as $pos)
                
                <div class ="col-4 col-sm-4 col-md-3 p-2">
               <div class="card h-70">
                  <img class="card-img-top" src="{{$pos['imgTit']}}"/>   
                 <a href="/manga/{{$pos['id']}}" class="btn btn-success">{{$pos['id']}}{{$pos['name']}}</a>
                  
               </div>
            </div>
                
               @endforeach
    
    </div>
     </div>
    
    
    <div class="col-md-4">
    
    
    
    <div class ="col-4 col-sm-4 col-md-8 p-2">
        <h1> Пользователь </h1>
<div class="card h-70">
                  <img class="card-img-top" src="{{$user2['urlimg']}}"/>   

 @if($user != null)
 @if($user['id'] === $user2['id'])
 <form action="image-upload" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                
                    <div class="col-md-12 text-center">
                        <input type="file" name="image" class="form-control">
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Изменить</button>
                    </div>
                  
                
            </form>
 @endif           
  @endif          
                          </div>
               
                          
 </div>
 <div class ="col-4 col-sm-4 col-md-8 p-2">
     <div class="card h-70">
    
            
    
    <form class="form-inline" action="name-upload" method="POST" type="text">
  <div class="col-4 col-sm-4 col-md-12 p-2">
      Имя пользователя:
    {{$user2['name']}}
  </div>
  @if($user != null)
 @if($user['id'] == $user2['id'])
  <div class="form-group mx-sm-3 mb-2">
   
    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Введите имя">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Изменить</button>
  @endif
   @endif
</form>
    <div class="col-4 col-sm-4 col-md-12 p-2">
      Дата регистрации:
    {{$user2['created_at']}}
  </div>
    
    </div>
    </div>
    </div>
  </div>


 
 @endsection