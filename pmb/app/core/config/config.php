<?php

define('URL_PROTOCOL', 'https://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL', URL_PROTOCOL . URL_DOMAIN . DIRECTORY_SEPARATOR);

define('DB_HOST', "ec2-18-209-207-142.compute-1.amazonaws.com");
define('DB_PORT', "5432");
define('DB_USER', "cbsfywergatjqd");
define('DB_PASS', "f5139fc5fb45ea8e99d926d3fa8674b0affd5c3931da46432a0ab2f960d5edd7");
define('DB_NAME', "dbftaf4q8t57kg");
// define('DB_CONNECTION', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);
define('DB_CONNECTION', 'pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';');
