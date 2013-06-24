<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (empty($_SESSION['me'])) {
    header('Location: '.SITE_URL.'index.php');
    exit;
}

$me = $_SESSION['me'];
$dbh = connectDb();
$userType = $me['usertype'];
//var_dump($userType);
//exit;

$id = h($me['id']);

$sql = "select * from users where id = :id limit 1";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(":id" => (int)$id));
$user = $stmt->fetch();

if (!$user) {
  echo "ユーザが見つかりませんでした。再ログインしてください。<br>
		<a href=\"logout.php\">戻る</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザーレベル1以上の方</title>
</head>
<body>
<p>
    <?php echo h($me['name']); ?> さんでログイン中。<a href="logout.php">[logout]</a>
</p>
<h1>ユーザーレベル1以上専用画面</h1>
<?php if($userType>1){ echo "<p>このpタグはユーザタイプが1より大きいとき表示される</p>";} ?>
<?php if($userType>2){ echo "<p>このpタグはユーザタイプが2より大きいとき表示される</p>";} ?>

<?php if($userType>1){ echo "<a href=\"member2.php\">ユーザタイプ2専用ページ</a><br>";} ?>
<?php if($userType>2){ echo "<a href=\"member3.php\">ユーザタイプ3専用ページ</a><br>";} ?>
<a href="index.php">トップ画面へ</a><br>

<p>無理矢理、member2.php・member3.phpに飛ぼうとしてもこのページに戻されます。</p>
</body>
</html>
