
<!doctype html>
<html lang="ru">
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
 <title>MANGA-SaIT</title>
 <meta name="description" content="Сайт о психологии с автогенерированными текстами">
 <meta name="keywords" content="психология, яндекс, весна, рефераты">
 <meta name="author" content="shwan">
 


 
 
 <link href="public/app.css" rel="stylesheet" />
  <link href="public/chosen.css" rel="stylesheet" />
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="vendor/harvesthq/chosen/chosen.jquery.js"></script>
  
  <script src="vendor/harvesthq/chosen/chosen.proto.js"></script>


 <body class="Site">

     
<main class="Site-content">
    

 <nav class="navbar navbar-expand-md navbar-dark bg-dark" role="navigation">
 <a class="navbar-brand" href="/post" role="banner">MANGA-SaIT</a>
 
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Переключить навигацию">
 <span class="navbar-toggler-icon"></span>
 </button>
 
 <div class="collapse navbar-collapse" id="navbarsDefault">
 <ul class="navbar-nav mr-auto">
 <li class="nav-item active">
 <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="#">О сайте</a>
 </li>
 </ul>
 
     @if($user = \Illuminate\Support\Facades\Auth::user())
        <a href="/logout" class="btn btn-primary">Logout {{$user->email}}</a>
        <a href="/myakk" class="btn btn-primary">мой аккаунт</a>
        <br>
        <br>
        <!--<div id="success" class="alert alert-success" role="alert" style="display:none;">Successfully created!</div>-->
        <!--<div id="loader"  style="display:none;">Creating...</div>-->
        <!--<div id="createForm">-->
        <!--    <input type="text" placeholder="comment" id="comment"><button class="btn btn-success" id="createComment">Create</button>-->
        <!--</div>-->
    @else
        <a href="/register" class="btn btn-primary">Register</a>
        <a href="/login" class="btn btn-success">Login</a>
    @endif
 
 
 


 
 
 </div>
 </nav>
 


<div class="content">
@yield('content')
 </div>

</main>
<div class="footer">
  <div class="container">
    <p class="text-muted">© Создатель КолянычЬ, 1900 - 2099. Все права защищены женевской конвенцией.</p>
  </div>
</div>
</div>
 </body>
 

</html>

