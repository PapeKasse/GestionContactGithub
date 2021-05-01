<?php
session_start();
require '../vendor/autoload.php';
use App\databasehelper;
$user= new databasehelper();
if($_SESSION != null){ return header('location:profil.php?id='.$_SESSION['id']);}
$user->getConnexion();
if (isset($_POST['envoyer'])) {
     if (!empty($_POST['email']) and !empty($_POST['pass'])) {
        $email = htmlspecialchars(trim($_POST['email']));
        $email =filter_var($email, FILTER_VALIDATE_EMAIL);
        $pass = $_POST['pass'];
        $user->login($email, $pass);
    } else {
        $erreur="Veuillez Remplir Tous Les Champs SVP!";
    }
}
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

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
<script src="index.js"></script>
<script src="../mon_css/sweetalert.min.js"></script>

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
</nav></br>
<div class="container" style="margin-left:auto;margin-right:auto" >
      <img src="../images/index4.svg" style="width:20%;height:20%;display:block;margin-left:auto;margin-right:auto" alt=""></div>
<div class="container">
    <div class="col-md-7 col-lg-8">
        <form method="Post" class="needs-validation" onsubmit='return validation();' > 
              <label for="email" class="form-label">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="email" placeholder="" required name="email" >
              
              <label for="Mot de passe" class="form-label">Mot de Passe</label>
              <input type="password" class="form-control" id="password" placeholder="" required name="pass"></br>
           <button class="btn btn-primary" type="submit" name="envoyer" id="envoyer">Connexion</button>
        </form>
        <div style="color:red"><?php if(isset(($erreur))){echo $erreur;}?> </div>
    </div>
</div>

<footer class="text-muted py-5">
  <div class="container">
  <p style="text-align:center">New here? <a href="index.php">Inscrivez-Vous</a> et <a href="connexion.php">Connectez-Vous </a></br>
     <b>Contact: PacoKasse55@gmail.com</b></br>
     </p>  
  </div>
</footer>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" 
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
     crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
    crossorigin="anonymous"></script>

    
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  </body>
</html>
