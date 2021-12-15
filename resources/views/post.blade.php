
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
 

 <div class="container" style ="max-width: 1300px;">
  <div class="row">
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
    
                <div class="col-md-3">

 

  <div class="col-4 col-sm-4 col-md-12 p-2">
       <div style="background-color: #212529; text-align: center; color: white; height:45px; padding: 12px 5px; 
          font-size: 15px; border-bottom: 3px solid;    border-bottom-color: #ff6666;" >ФИЛЬТР МАНГИ</div>
         
    
 <div class="col-4 col-sm-4 col-md-12 p-2">

    <div class="dropdown">
        <div>Выбрать жанры</div>
         
<button onclick="myFunction()" class="dropbtn" id="dropbtn">По каким жанрам искать    	

</button>

  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="#about">About</a>
    <a href="#base">Base</a>
    <a href="#blog">Blog</a>
    <a href="#contact">Contact</a>
    <a href="#custom">Custom</a>
    <a href="#support">Support</a>
    <a href="#tools">Tools</a>
  </div>
</div>
    
<select class="js-chosen" multiple tabindex="3" name="city" data-placeholder="По каким жанрам искать">
	<option value=""></option>
	<option value="367">Абаза</option>
	<option value="340">Абакан</option>	
	<option value="369">Абдулино</option>	
	<option value="370">Абинск</option>	
	<option value="371">Агидель</option>	
	...
</select>
    
   <select class="select"  name="city" data-placeholder="По каким жанрам искать">
	<option value=""></option>
	<option value="367">Абаза</option>
	<option value="340">Абакан</option>	
	<option value="369">Абдулино</option>	
	<option value="370">Абинск</option>	
	<option value="371">Агидель</option>	
	...
</select>
    
    
    
    </div> 
       
       </div>




                
                
                
                
                
                
                
                
                
                
                
                
                
                
                </div>
 </div>
    

  <div class="col-sm">
  {{$post->links('paginate') }}
  </div>
 </div> 
 
 </main>
<script>




$(document).ready(function(){
	$('.js-chosen').chosen({
		width: '100%',
		no_results_text: 'Совпадений не найдено',
		placeholder_text_single: 'Выберите город'
	});
});

$(document).ready(function(){
	$('.select').chosen({
		width: '100%',
		no_results_text: 'Совпадений не найдено',
		placeholder_text_single: 'Выберите город'
	});
});




/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
   document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
     
  if (!event.target.matches('.dropbtn')) {
  
    var dropdowns = document.getElementsByClassName("dropdown-content");
    
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
     

      }
    }
   
  }
}













</script>
 @endsection