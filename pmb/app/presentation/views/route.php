<?php

switch ($_SERVER['REQUEST_URI']) {
  case '/masuk':
    require APP . 'presentation/views/auth/login.php';
    break;
  case '/daftar':
    require APP . 'presentation/views/auth/register.php';
    break;
  default:
    http_response_code(404);
    break;
}
