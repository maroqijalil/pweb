<?php

try {
  $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

  require APP . 'core/db/model/user.php';
} catch (PDOException $e) {
  die("Terjadi masalah: " . $e->getMessage());
}
