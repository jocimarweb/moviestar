<?php

require_once "db.php";
require_once "globals.php";
require_once "models/User.php";
require_once "models/Message.php";
require_once "dao/UserDAO.php";


$message = new Message($BASE_URL);
// $userDao = new UserDAO($conn, $BASE_URL);

// Verificar o tipo do Formulário
$type = filter_input(INPUT_POST, "type");

// Verificação do tipo de formulário Login ou Cadastro
if ($type === "register") {

   $name = filter_input(INPUT_POST, "name");
   $lastname = filter_input(INPUT_POST, "lastname");
   $email = filter_input(INPUT_POST, "email");  // $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
   $password = filter_input(INPUT_POST, "password");
   $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

   // Verificação de Dados Mínimos
   if ($name && $lastname && $email && $password) {
   } else {

      // Enviar uma mensagem de ERRO de dados faltantes
      $message->setMessage("Por favor preencha todos os campos!", "error", "back");
   }
   // Fazer o Login do Usuário
} elseif ($type === "login") {
   # code ...
}
