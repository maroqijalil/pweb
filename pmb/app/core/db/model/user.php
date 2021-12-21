<?php

function login()
{
  $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  $sql = "SELECT * FROM users WHERE email=:email";
  $stmt = $db->prepare($sql);

  $params = array(":email" => $email);

  $stmt->execute($params);

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    if (password_verify($password, $user["password"])) {
      session_start();
      $_SESSION["user"] = $user;

      header("Location: /");
    }
  } else {
    header("Location: /daftar");
  }
}

function register()
{
  $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (name, email, password) 
          VALUES (:name, :email, :password)";
  $stmt = $db->prepare($sql);

  $params = array(
    ":name" => $name,
    ":password" => $password,
    ":email" => $email
  );

  $saved = $stmt->execute($params);

  if ($saved) {
    header("Location: /masuk");
  };
}

function logout()
{
  session_start();
  unset($_SESSION['user']);
  header("Location: /masuk");
}
