<?php
require_once "globals.php";
require_once "db.php";

$flassMessage = [];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MovieStar</title>
   <!-- Favicon -->
   <link rel="short icon" href="<?php $BASE_URL ?>img/moviestar.ico">

   <!-- Bootstrap - CSS -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.css" integrity="sha512-YfFXNd2o6swxA1M0ll6EDdnVdYdE6iz+C6k0Guqf18JW6sVq6Oz9lfbjOso+LMwwNYNxUbp7egkYmC2W/IyeVA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" />

   <!-- Font-Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- CSS -->
   <link rel="stylesheet" href="<?php $BASE_URL ?>css/styles.css">

</head>

<body>

   <header>
      <nav id="main-navbar" class="navbar navbar-expand-lg">
         <a href="<?php $BASE_URL ?>" class="navbar-brand">
            <img src="<?php $BASE_URL ?>img/logo.svg" alt="MovieStar" id="logo">
            <span id="moviestar-title">MovieStar</span>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="toggle navigation">
            <i class="fas fa-bars"></i>
         </button>
         <form action="" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
            <input type="text" name="q" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar Filmes" aria-label="Search">
            <button class="btn my-2 my-sm-0" type="submit">
               <i class="fas fa-search"></i>
            </button>
         </form>
         <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a href="<?php $BASE_URL ?>auth.php" class="nav-link">Entrar / Cadastrar</a>
               </li>
            </ul>
         </div>
      </nav>
   </header> <!-- # Header -->

   <!-- Mensagens -->
   <?php if (!empty($flassMessage["msg"])) : ?>

      <div class="msg-container">
         <p class="msg <?php $flassMessage["type"] ?> "> <?php $flassMessage["msg"] ?> </p>
      </div>

   <?php endif; ?>