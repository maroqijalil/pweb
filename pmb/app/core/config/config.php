<?php

define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL', URL_PROTOCOL . URL_DOMAIN . DIRECTORY_SEPARATOR);

define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', "root");
define('DB_NAME', "pmb_its");
