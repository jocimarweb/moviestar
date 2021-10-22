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

      $stmt = $this->conn->prepare("INSERT INTO users (
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
      $stmt = $this->conn->prepare("UPDATE users SET
         name = :name,
         lastname = :lastname,
         email = :email,
         image = :image,
         token = :token,
         bio = :bio
         WHERE id = :id
      ");

      $stmt->bindParam(":name", $user->name);
      $stmt->bindParam(":lastname", $user->lastname);
      $stmt->bindParam(":email", $user->email);
      $stmt->bindParam(":image", $user->image);
      $stmt->bindParam(":token", $user->token);
      $stmt->bindParam(":bio", $user->bio);
      $stmt->bindParam(":id", $user->id);

      $stmt->execute();

      // Redireciona para o perfil do usuário
      $this->message->setMessage("dados atualizados com sucesso!", "success", "editprofile.php");
   }

   // public function changePassword($user)
   // {

   //    $stmt = $this->conn->prepare("UPDATE users SET 
   //       password = :password
   //       WHERE id = :id
   //    ");

   //    $stmt->bindParam(":password", $user->password);
   //    $stmt->bindParam(":id", $user->id);

   //    $stmt->execute();

   //    // Redireciona e apresenta mensagem de sucesso
   //    $this->message->setMessage("Senha atualizada!", "success", "editprofile.php");
   // }

   // // Código da Aula
   // public function findByToken($token)
   // {
   //    if ($token != "") {

   //       $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");
   //       $stmt->bindParam(":token", $token);
   //       $stmt->execute();

   //       if ($stmt->rowCount() > 0) {

   //          $data = $stmt->fetch();
   //          $user = $this->buildUser($data);
   //          return $user;
   //       } else {
   //          return false;
   //       }
   //    } else {
   //       return false;
   //    }
   // }

   // Código do Materializado
   public function findByToken($token)
   {

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
      }
      return false;
   }

   public function setTokenToSession($token, $redirect = true)
   {
      // Salvar token na Session
      $_SESSION["token"] = $token;

      if ($redirect) {

         // Redireciona para o perfil do usuário e exibe mensagem de sucesso
         $this->message->setMessage("Seja Bem-Vindo!", "success", "editprofile.php");
      }
   }







   public function verifyToken($protected = true)
   {
      if (!empty($_SESSION["token"])) {

         // Pega o token da Session
         $token = $_SESSION["token"];

         $user = $this->findByToken($token);

         if ($user) {
            return $user;
         } else if ($protected) {

            // Redireciona usuário não autenticado
            $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");
         }
      } else {
         return false;
      }
   }






   // Função para verificar e Autenticar Usuário cadastrado
   public function authenticateUser($email, $password)
   {
      $user = new User();

      $user = $this->findByEmail($email);

      // Checar se o usuário existe
      if ($user) {
         // Checar se as senhas são iguais
         if (password_verify($password, $user->password)) {

            // Gerar um token e iniciar uma nova session
            $token = $user->generateToken();

            $this->setTokenToSession($token, false);

            // Atualizar o token no Usuário
            $user->token = $token;

            $this->update($user);

            return true;
         }
      }
      return false;
   }



   public function findById($id)
   {

      if ($id != "") {

         $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");

         $stmt->bindParam(":id", $id);

         $stmt->execute();

         if ($stmt->rowCount() > 0) {

            $data = $stmt->fetch();
            $user = $this->buildUser($data);

            return $user;
         } else {
            return false;
         }
      }
   }



   // Encerra a Session
   public function destroyToken()
   {

      // Remove o token da Session
      $_SESSION["token"] = "";

      // Redirecionar e apresentar a mensagem de Sucesso
      $this->message->setMessage("Você fez o Logout com Sucesso!", "success", "index.php");
   }

   public function changePassword($user)
   {

      $stmt = $this->conn->prepare("UPDATE users SET 
      password = :password
      WHERE id = :id
      ");

      $stmt->bindParam(":password", $user->password);
      $stmt->bindParam(":id", $user->id);

      $stmt->execute();

      // Redireciona e apresenta mensagem de sucesso
      $this->message->setMessage("Senha atualizada!", "success", "editprofile.php");
   }
}
