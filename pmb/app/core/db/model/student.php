<?php

function studentAll()
{
  $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

  $sql = "SELECT * FROM students";
  return mysqli_query($db, $sql);
}

function studentInsert()
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
