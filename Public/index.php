<?php
session_start();
require '../vendor/autoload.php';
use App\databasehelper;
if($_SESSION != null){ return header('location:profil.php?id='.$_SESSION['id']);}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>GestionContact</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
crossorigin="anonymous">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
crossorigin="anonymous">
<link rel="stylesheet" href="index.css">


    
  </head>
  <body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" >
        <a class="nav-link" id="nav_color" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="nav_color" href="form.php">S'inscrire<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="nav_color" href="connexion.php">Connexion<span class="sr-only"></span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </div>
</nav>

<main>
      <div class="container" style="margin-left:auto;margin-right:auto" >
      <img src="../images/index.svg" style="width:60%;height:60%;display:block;margin-left:auto;margin-right:auto" alt=""></div>
      <h2 style="text-align:center"><b><em>Inscrivez-Vous et garder tous vos contacts en ligne en un Clic !</em></b></h2></br>
      <div class="container" >
 <div class="row">
    <div class="col-md-3" style="width:200px">
      <img class="card-img-top" src="../images/img2.jpg" alt="Card image" style="height:200px">
        <div class="card-body">
            <h4 class="card-title">Alain Richard</h4>
               <p class="card-text">Developpeur.</p>
               <p class="card-text">Rue Charles.</p>
                  <a href="#" class="btn btn-primary">Profile</a>
        </div>
    </div> 

    <div class="col-md-3" style="width:200px">
      <img class="card-img-top" src="../images/img5.jpg" alt="Card image" style="height:200px">
        <div class="card-body">
            <h4 class="card-title">Henry Leclerc </h4>
               <p class="card-text">Analyste.</p>
               <p class="card-text">Boulevard Canal 4 .</p>
                  <a href="#" class="btn btn-primary">Profile</a>
        </div>
    </div> 

    <div class="col-md-3" style="width:200px">
      <img class="card-img-top" src="../images/img1.jpg" alt="Card image" style="height:200px">
        <div class="card-body">
            <h4 class="card-title">Alain Durand</h4>
               <p class="card-text">Artiste.</p>
               <p class="card-text">Avenue George Gary.</p>
                  <a href="#" class="btn btn-primary">Profile</a>
        </div>
    </div> 

    <div class="col-md-3" style="width:250px">
      <img class="card-img-top" src="../images/img4.jpg" alt="Card image" style="height:200px">
        <div class="card-body">
            <h4 class="card-title">Charlotte Flair</h4>
               <p class="card-text">Traductrice.</p>
               <p class="card-text">Rue Petit-Laumiere.</p>
                  <a href="#" class="btn btn-primary">Profile</a>
        </div>
    </div> 

    <div class="col-md-3" style="width:250px">
      <img class="card-img-top" src="../images/img3.jpg" alt="Card image" style="height:200px">
        <div class="card-body">
            <h4 class="card-title">Bernard Petit</h4>
               <p class="card-text">Banque Finance.</p>
               <p class="card-text">Rue Armand.</p>
                  <a href="#" class="btn btn-primary">Profile</a>
        </div>
    </div> 

    <div class="col-md-3" style="width:250px">
      <img class="card-img-top" src="../images/img6.jpg" alt="Card image" style="height:200px">
        <div class="card-body">
            <h4 class="card-title">Francis Dubois</h4>
               <p class="card-text">Infographiste.</p>
               <p class="card-text">Les Almadies.</p>
                  <a href="#" class="btn btn-primary">Profile</a>
        </div>
    </div> 
 </div>
</div>    
</main>


  
  </body>
  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" 
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
     crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
    crossorigin="anonymous"></script>

  <footer class="text-muted py-5">
  <div class="container">
  <p style="text-align:center">New here? <a href="index.php">Inscrivez-Vous</a> et <a href="connexion.php">Connectez-Vous </a></br>
     <b>Contact: PacoKasse55@gmail.com</b></br>
     </p>  
  </div>
</footer>
</html>
