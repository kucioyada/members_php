<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (empty($_SESSION['me'])) {
    header('Location: '.SITE_URL.'index.php');
    exit;
}

$me = $_SESSION['me'];
$userType = $me['usertype'];
//$id = $me[id];
//var_dump($id);
//exit;

$dbh = connectDb();

$sql = "select * from users where id = :id limit 1";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(":id" => (int)$me['id']));
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
    <title>ユーザープロフィール</title>
</head>
<body>
<p>
    <?php echo h($me['name']); ?> さんでログイン中。<a href="logout.php">[logout]</a>
</p>
<h1>メンバー専用画面</h1>
<p>このページはログインした状態でしか閲覧できません。</p>

<p>ユーザレベル別にリンク表示<br>
<?php if($userType>0){ echo "<a href=\"member1.php\">ユーザタイプ1以上専用ページ</a><br>";} ?>
<?php if($userType>1){ echo "<a href=\"member2.php\">ユーザタイプ2以上専用ページ</a><br>";} ?>
<?php if($userType>2){ echo "<a href=\"member3.php\">ユーザタイプ3以上専用ページ</a><br>";} ?>
</p>

<p>テスト用全リンク表示<br>
<a href="member1.php">レベル1以上専用ページ「member1.php」</a><br>
<a href="member2.php">レベル2以上専用ページ「member2.php」</a><br>
<a href="member3.php">レベル3以上専用ページ「member3.php」</a><br>
</p>

</body>
</html>
