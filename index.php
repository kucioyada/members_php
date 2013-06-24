<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (!empty($_SESSION['me'])) {
    header('Location: '.SITE_URL.'member.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>非ユーザTOP画面</title>
</head>
<body>
<p>
<a href="login.php">ログイン</a>
</p>
<h1>非ユーザTOP画面</h1>
<p>
ログインすると member.phpに移動します。<br>
そこからログインユーザのユーザレベルによって表示されるコンテンツと<br>
移動できるページが制御されています。<br>
</p>

<p>
member1.php : ユーザレベル1以上専用のページ<br>
member2.php : ユーザレベル2以上専用のページ<br>
member3.php : ユーザレベル3以上専用のページ<br>
</p>
 
<p>
ログイン画面にお試しようのユーザデータがあるのでテストしてみてください。
</p>
 
</body>
</html>
