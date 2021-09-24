@extends('layouts.master')


@section('content')

{{$folder}}

{{$id}}

  
            
<div id="counter">
<input type="button" id="buttonCountPlus" value="+">
<div id="buttonCountNumber">1</div>
<input type="button" id="buttonCountMinus" value="-">
</div>

  <div class ="col-6 col-sm-4 col-md-5 p-2">
               <div class="card h-70">
                  <img class="card-img-top" id = "img2" src="{{$folder}}1.png"/>   

               </div>
            </div><br />
@foreach($results as $result)
  <div class ="col-6 col-sm-4 col-md-5 p-2">
               <div class="card h-70">
                  <img class="card-img-top" id = "img2" src="{{$folder}}{{$result}}"/>   

               </div>
            </div><br />

@endforeach
<script>
   
let count = document.getElementById("buttonCountNumber");
let http = document.getElementById("img2").src;

 let data = <?php echo json_encode("$folder", JSON_HEX_TAG); ?>;
 let data2 = <?php echo json_encode("$result", JSON_HEX_TAG); ?>;

   let data3 = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
  
history.pushState(null, null, 'mangaRead/' + data3 + '/1/1');




document.getElementById("buttonCountPlus").onclick = function() {

 history.pushState(null, null, 'mangaRead/' + data3 + '/' + count.textContent);
    
    
    count.innerHTML++;
   document.getElementById("img2").src = data + count.textContent+ '.png';
  
  

  
   console.log(data + count.textContent);
 
}

document.getElementById("buttonCountMinus").onclick = function() {
  let countMinus = count.innerHTML;
  if(+countMinus >= 2){
    history.pushState(null, null, data + count.textContent);
    count.innerHTML--;
    document.getElementById("img2").src = 'http://kolian.altaneri.com/resources/manga/4/1glava/' + count.textContent+ '.png';
   
 
 
  }
}







 let vv = 2;
 let gg = ++vv;
console.log(gg);

// let http = document.getElementById("img").src;





// var String =http.substring(http.lastIndexOf("/")+1,http.lastIndexOf("."));
// console.log(String);

// var output = http.replace(/glava/\d*./g, "<br>");

// console.log(output);
</script>
            
            
            
@endsection            