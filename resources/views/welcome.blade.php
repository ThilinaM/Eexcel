<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>E - Excell</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }

  footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">E - Excell</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Cources</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Route::has('login'))
            @auth
              <li>  <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a></li>
            @else
                <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a></li>

                @if (Route::has('register'))
                   <li> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                @endif
            @endauth
       
    @endif
      </ul>
    </div>
  </div>
</nav>  
<div class="container text-center">    
  <h3>What We Do</h3><br>
  <div class="row">
      
What is Lorem Ipsum?

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
<br/>
  </div>

  <div class="row mt-0">
    <div class="col-sm-6">
      
      <b>Current Project</b>
      <ul>
        <li> It is a long established fact that a reader will </li>
        <li> It is a long established fact that a reader will </li>
        <li> be distracted by the readable content of a page </li>
        <li> when looking at its layout. The point of using </li>
        <li> Lorem Ipsum is that it has a more-or-less normal </li>
        <li> distribution of letters, as opposed to using 'Content </li>
        <li> here, content here', making it look like readable English.</li>
        <li>  Many desktop publishing packages and web page editors now   </li>
       </ul>
        
    </div>
    <div class="col-sm-6"> 
      <b>Current Project</b>
      <ul>
     <li> It is a long established fact that a reader will </li>
     <li> It is a long established fact that a reader will </li>
     <li> be distracted by the readable content of a page </li>
     <li> when looking at its layout. The point of using </li>
     <li> Lorem Ipsum is that it has a more-or-less normal </li>
     <li> distribution of letters, as opposed to using 'Content </li>
     <li> here, content here', making it look like readable English.</li>
     <li>  Many desktop publishing packages and web page editors now   </li>
    </ul>
    </div>    
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>@ E-Excel</p>
</footer>

</body>
</html>
