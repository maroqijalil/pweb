<?php

require APP . 'presentation/middleware/auth/auth.php';

require APP . 'presentation/controllers/auth/auth.php';

switch ($_SERVER['REQUEST_URI']) {
  case '/':
    if (!authenticate()) {
      require APP . 'presentation/views/main/index.php';
    }
    break;

  case '/masuk':
    if (!redirectIfAuthenticate()) {
      require APP . 'presentation/views/auth/login.php';
    }
    break;

  case '/daftar':
    if (!redirectIfAuthenticate()) {
      require APP . 'presentation/views/auth/register.php';
    }
    break;

  default:
    http_response_code(404);
    break;
}
