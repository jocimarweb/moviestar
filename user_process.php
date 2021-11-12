<?php

require_once("db.php");
require_once("globals.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);


// Verificando o tipo do formulário
$type = filter_input(INPUT_POST, "type");

// Atualiza Usuário
if ($type === "update") {


  //Atualizar a senha do Usuário
} else if ($type === "changepassword") {
} else {
  $message->setMessage("Informações inválidas, user_process.php", "error", "index.php");
}
