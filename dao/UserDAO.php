<?php

include_once "models/User.php";
include_once "models/Message.php";

class UserDAO implements UserDAOInterface
{

   private $conn;
   private $url;
   private $message;

   public function __construct(PDO $conn, $url)
   {

      $this->conn = $conn;  // Chamada da Conexão com o DB
      $this->url = $url;  // Chamada da BASE_URL
      $this->message = new Message($url);
   }

   public function buildUser($data)
   {
      $user = new User();

      $user->id = $data["id"];
      $user->name = $data["name"];
      $user->lastname = $data["lastname"];
      $user->email = $data["email"];
      $user->password = $data["password"];
      $user->image = $data["image"];
      $user->token = $data["token"];
      $user->bio = $data["bio"];


      return $user;
   }

   public function create(User $user, $authUser = false)
   {

      $stmt = $this->conn->prepare("INSERT INTO users(
         name, lastname, email, password, token
         ) VALUES (
            :name, :lastname, :email, :password, :token
         )");

      $stmt->bindParam(":name", $user->name);
      $stmt->bindParam(":lastname", $user->lastname);
      $stmt->bindParam(":email", $user->email);
      $stmt->bindParam(":password", $user->password);
      $stmt->bindParam(":token", $user->token);

      $stmt->execute();

      // Autenticar Usuário, caso "auth" seja "true"
      if ($authUser) {
         $this->setTokenToSession($user->token);
      }
   }

   public function update(User $user)
   {
   }

   public function verifyToken($protected = true)
   {
      if (!empty($_SESSION["token"])) {

         // Pega o token da Session
         $token = $_SESSION["token"];

         $user = $this->findByToken($token);

         if ($user) {
            return $user;
         } else {

            // Redireciona usuário não autenticado
            $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "editprofile.php");
         }
      } else {
         return false;
      }
   }

   public function setTokenToSession($token, $redirect = true)
   {
      // Salvar token na SessionStart
      $_SESSION["token"] = $token;

      if ($redirect) {

         // Redireciona para o perfil do usuário
         $this->message->setMessage("Seja Bem-Vindo!", "success", "editprofile.php");
      }
   }

   public function authenticateUser($email, $password)
   {
   }

   public function findByEmail($email)
   {
      if ($email != "") {

         $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
         $stmt->bindParam(":email", $email);
         $stmt->execute();

         if ($stmt->rowCount() > 0) {

            $data = $stmt->fetch();
            $user = $this->buildUser($data);
            return $user;
         } else {
            return false;
         }
      } else {
         return false;
      }
   }

   public function findById($id)
   {
   }

   public function findByToken($token)
   {
      if ($token != "") {

         $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");
         $stmt->bindParam(":token", $token);
         $stmt->execute();

         if ($stmt->rowCount() > 0) {

            $data = $stmt->fetch();
            $user = $this->buildUser($data);
            return $user;
         } else {
            return false;
         }
      } else {
         return false;
      }
   }

   public function changePassword(User $user)
   {
   }
}
