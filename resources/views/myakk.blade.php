@extends('layouts.master')


@section('content')
            
 <div class="col-md-9">


            <div class="row">
 @foreach($post as $pos)
                
                <div class ="col-6 col-sm-4 col-md-3 p-2">
               <div class="card h-70">
                  <img class="card-img-top" src="{{$pos['imgTit']}}"/>   
                 <a href="/manga/{{$pos['id']}}" class="btn btn-success">{{$pos['id']}}{{$pos['name']}}</a>
                  
               </div>
            </div>
                
               @endforeach
  </div>
            </div>

 
 @endsection