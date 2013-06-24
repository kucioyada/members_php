<?php

define('DSN', 'mysql:host=***************.jp;dbname=*********-*******');
define('DB_USER', '**********');
define('DB_PASSWORD', '********');

define('SITE_URL', 'http://pee.hungry.jp/members_php/');
define('PASSWORD_KEY', '*********'); //暗号化用のキー　適当な文字列

error_reporting(E_ALL & ~E_NOTICE);

session_set_cookie_params(0, '/members_php/');
