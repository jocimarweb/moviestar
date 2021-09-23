<?php
require_once "globals.php";
require_once "db.php";
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.css" integrity="sha512-YfFXNd2o6swxA1M0ll6EDdnVdYdE6iz+C6k0Guqf18JW6sVq6Oz9lfbjOso+LMwwNYNxUbp7egkYmC2W/IyeVA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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



   <div id="main-container" class="container-fluid">
      <h1>Corpo do Site</h1>
   </div>



   <footer id="footer">
      <div id="social-container">
         <ul>
            <li>
               <a href="#"><i class="fab fa-facebook-square"></i></a>
            </li>
            <li>
               <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li>
               <a href="#"><i class="fab fa-youtube"></i></a>
            </li>
         </ul>
      </div>
      <div id="footer-links-container">
         <ul>
            <li><a href="#">Adicionar Filme</a></li>
            <li><a href="#">Adicionar Crítica</a></li>
            <li><a href="#">Entrar / Registrar</a></li>
         </ul>
      </div>
      <p>&copy; 2021 - Jocimar...</p>
   </footer> <!-- # Footer -->

   <!-- Scripts -->

   <!-- Bootstrap - JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.js" integrity="sha512-9fMNGl7JQrJnqWwQ2a4I2xSDXphpn0Mjq0OY1ZMyWwrbYppp2/iybI8beVLvviaxHTcOxewp7bNtt5ou/9tQeA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- JQuery -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>