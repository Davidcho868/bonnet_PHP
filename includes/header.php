<?php
session_start();
include 'variables.php';
include 'fonctions.php';

$errors = [];

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if (empty($password)){
        $errors[] = 'Mot de passe vide';
    } elseif ($password != $defaultPassword) {
        $errors[] = 'Mot de passe errroné';
    }

    if (empty($username)) {
        $errors[] = 'username vide';
    }

    if (empty($errors)) {
        $_SESSION['username'] = $_POST['username'];

        header('Location: index.php?login=success');
    } 

    

}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/style.css">
    <script defer src="script/bootstrap.bundle.min.js"></script>
    <title>Bonnet</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="?page=home">Le Bonnetteur</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=list">Liste des Bonnets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=panier">Panier</a>
        </li>
        <?php
        if (isset($_SESSION['username'])) {
          ?>
        <li class="nav-item">
          <a class="nav-link" href="?page=login"><?php echo $_SESSION['username']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=logout">Deconnexion</a>
        </li>
        
        <?php
      } else {
      ?>
      <li class="nav-item">
          <a class="nav-link" href="?page=login">Connexion</a>
        </li>
        <?php
      }?>
      </ul>
      
    </div>
  </div>
</nav>
<?php
if (isset($_GET['login']) && $_GET['login'] == "success") {
?>
<div class="alert alert-success" role="alert">
  Vous êtes connecté ! 
</div>
<?php
}


if(isset($_GET['logout']) && $_GET['logout'] == "success") {
  
?>
<div class="alert alert-success" role="alert">
  Vous êtes deconnecté ! 
</div>

<?php
}
?>
</header>
    
    