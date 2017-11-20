<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Toto project</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- SEO -->
<meta name="title" content="Mon titre">
<meta name="description" content="Une chouette description">

<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<!-- CSS Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
<!-- CSS JQuery UI-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
<!-- mon CSS -->
<link rel="stylesheet" href="css/style.css">
<!-- script CDN : jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>

  </head>
  <body>
    <head>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user')) : ?>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Toutes les sessions <span class="sr-only">(current)</span></a>
      </li>
      <?php endif; ?>
      <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="list.php">Tous les étudiants</a>
      </li>
      <?php endif; ?>
      <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
      <li class="nav-item">
        <a class="nav-link" href="add.php">Ajout d'un étudiant</a>
      </li>
    <?php endif; ?>
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin' && $_SESSION['role'] == 'user') : ?>
      <li class="nav-item">
        <a class="nav-link" href="upload.php">Upload</a>
      </li>
      <?php endif; ?>
      <?php if(empty($_SESSION['Id'])) : ?>
      <li id="signup" class="nav-item">
        <a class="nav-link" href="sign_up.php">Sign Up</a>
      </li>
      <li id="signin" class="nav-item">
        <a class="nav-link" href="sign_in.php">Sign In</a>
      </li>
      <?php endif; ?>
      <?php if(isset($_SESSION['Id'])) : ?>
      <li id="user" class="nav-item">
        <span class="nav-link"><?= $_SESSION['idIp'] ?></span>
      <?php endif; ?>
      </li>
    <?php if(!empty($_SESSION['Id'])) : ?>
      <li id="user" class="nav-item">
        <a class="nav-link" href="disconnect.php">Sign Out</a>
      </li>
    <?php endif; ?>

    </ul>
  </div>
</nav>
    </head>
