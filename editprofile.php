<?php
require_once "templates/header.php";
require_once "models/User.php";
require_once "dao/UserDAO.php";

$user = new User();

$userDao = new UserDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken(true);

$fullName = $user->getFullName($userData);

if ($userData->image = "") {
  $userData->image = "user.png";
}

?>

<div id="main-container" class="container-fluid">
  <div class="col-md-12">
    <form action="<?php $BASE_URL ?>user_process.php" method="post">
      <input type="hidden" name="type" value="update">
      <div class="row">
        <!-- Dados do Usuário -->
        <div class="col-md-4">
          <h1><?php echo $fullName; ?></h1>
          <p class="page-description">Altere seus dados no formulário abaixo:</p>
          <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Digite o seu nome" value="<?php echo $userData->name; ?>">
          </div>
          <div class="form-group">
            <label for="lastname">Sobrenome:</label>
            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Digite o seu sobrenonome" value="<?php echo $userData->lastname; ?>">
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input class="form-control disabled" type="text" name="email" id="email" placeholder="Digite o seu sobrenonome" readonly value="<?php echo $userData->email; ?>"> <!-- Utilizando o "readonly", pois o "disable" não envia os dados para o DB -->
          </div>
          <input class="btn form-btn" type="submit" value="Alterar">
        </div>
        <!-- Imagem do Usuário -->
        <div class="col-md-4">
          <div id="profile-image-container" style="background-image: url('<?php $BASE_URL ?>img/users/<?php echo $userData->image; ?>');">
            <?php echo $userData->image; ?>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
require_once "templates/footer.php";
?>