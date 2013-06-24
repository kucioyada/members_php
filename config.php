<?php

define('DSN', 'mysql:host=mysql001.phy.lolipop.jp;dbname=LAA0370841-membersphp');
define('DB_USER', 'LAA0370841');
define('DB_PASSWORD', '2egby6mh');

define('SITE_URL', 'http://pee.hungry.jp/members_php/');
define('PASSWORD_KEY', 'ALcY4EDsR1LPKJw'); //暗号化用のキー

error_reporting(E_ALL & ~E_NOTICE);

session_set_cookie_params(0, '/members_php/');
