<?php
session_start();
require '../vendor/autoload.php';
use App\databasehelper;

if ($_SESSION==null) {
    return header('location:connexion.php');
} else {
    if (isset($_GET['id'])) {
        $user= new databasehelper();
        $user->getConnexion();
        $id=intval($_GET['id']);
        $sql= "DELETE FROM contacts WHERE id=$id";
        $result= $user->db->prepare($sql);
        $result->execute();
    }
    if (isset($_POST["search"]) and $_POST["search"] == "rechercher") {
        $user= new databasehelper();
        $user->getConnexion();
        $_POST["donnee"] = htmlspecialchars(trim($_POST["donnee"])); //pour sécuriser le formulaire contre les intrusions html
        $donnee = $_POST['donnee'];
        $donnee = trim($_POST['donnee']); //pour supprimer les espaces dans la requête de l'internaute
        $donnee = strip_tags($_POST['donnee']); //pour supprimer les balises html dans la requête
        $user->search();
    } ?>
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
        <a class="nav-link" id="nav_color" href="Ajout.php">Ajouter Contact<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="nav_color" href="liste.php">Liste Contact<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="nav_color" href="logout.php">Deconnexion<span class="sr-only"></span></a>
      </li>
    </ul>
    <form method="Post" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name="donnee" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit" name="search" value="rechercher">Search</button>
    </form>
  </div>
</nav>

<div class="container" style="margin-left:auto;margin-right:auto" >
    <img src="../images/index4.svg" 
    style="width:35%;height:35%;display:block;margin-left:auto;margin-right:auto;margin-top:1em;margin-bottom:1em;" 
    alt="" ></div>
<div class="container" >
    <table class="table table-sm table-dark">
<thead>
  <tr>
    <th scope="col" class="bg-primary">Nom</th>
    <th scope="col" class="bg-primary">Prenom</th>
    <th scope="col" class="bg-primary">Tel</th>
    <th scope="col" class="bg-primary">Photo</th>
    <th scope="col" class="bg-primary">Delete</th>
    <th scope="col" class="bg-primary">Edit</th>
  </tr>
</thead>
<tbody>
    <?php

    $user= new databasehelper();
    $test=$_SESSION['id'];
    $sql=$user->getConnexion()->query("SELECT nom,prenom,tel,photo,id FROM contacts WHERE users_id = '$test' ORDER BY nom ASC");
    if ($sql->rowCount()> 0) {
        while ($get=$sql->fetch(PDO::FETCH_ASSOC)) {
            ?>


    <tr>
      <td><?php echo $get['nom']; ?></td>
      <td><?php echo $get['prenom']; ?></td>
      <td><?php echo $get['tel']; ?></td>
      <td><img class="card-img-top" src="../upload/<?php echo $get['photo']; ?>" style="width:80px;height:80px" alt="Card image"></td>
      <td id="but_delete">
      <a href="liste.php?id=<?php echo $get['id']; ?>" class='btn btn-warning' onclick='return confirmer();'>Delete</a>
      </td>
      <td>
      <a href="edit.php?id=<?php echo $get['id']; ?>" class='btn btn-success'>Edit</a>
      </td> 
    </tr>
    
    <?php
        }
    } ?>
    </div>
    
   </body>

   <footer class="text-muted py-5" id="footer_profil2">
  <div class="container">
  <p style="text-align:center">New here? Inscrivez-Vous et Connectez-Vous </br>
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
</html>
<?php
}
?>