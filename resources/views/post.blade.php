
@extends('layouts.master')




@section('content')

 <main role="main">
 <div class="jumbotron">
 <div class="container">
 <h1 class="display-3">Тута будет скорее всего карусель</h1>
 <p>
 Этот текст вроде не нужен
 </p>
 <p>
     
 <a class="btn btn-primary btn-lg" href="*" role="button">Кнпка куда то</a>
 </p>
 </div>
 </div>
 
 <div class="container">
  <div class="row">
    <div class="col-sm">
   
    </div>
</div>
 
 </div>
 
 <div class="col-md-9">


            <div class="row">
                
                @foreach($post as $pos)
                
                <div class ="col-6 col-sm-4 col-md-3 p-2">
               <div class="card h-70">
                  <img class="card-img-top" src="{{$pos['imgTit']}}"/>   
                 <a href="/manga/{{$pos['id']}}" class="btn btn-success">{{$pos['id']}}{{$pos['name']}}</a>
                  
               </div>
            </div>
                
                
                
                <!--<div class="col-sm col-md-2">-->
                <!--    <div class="thumbnail">-->
                <!--        <img src="{if $product['image']}{$product['image']}{else}1.png{/if}" width="100" height ="200">-->
                <!--        <div class="caption">-->
                <!--            <p>{{$pos['name']}}</p>-->
                            
                <!--            <p>-->
                <!--                <form action="/?action=addToCart" method="POST">-->
                                    
                <!--                    <input type="hidden" name="id" value="{$product['id']}">-->
                <!--                    <input type="submit" class="btn-success" role="button" value="Читать">-->
                <!--                    </form>-->
                <!--                </p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
               @endforeach
               
               

        </div>
    </div>
    <div class="container">

 
 </div>
 </main>
 <div class="col-sm">
  {{$post->links('paginate') }}
  
 @endsection