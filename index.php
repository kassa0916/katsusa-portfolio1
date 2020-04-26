<?php
ob_start();
// セッション管理開始
session_start();
if( isset($_SESSION['user']) != "") {
  //ログイン済みの場合は、マイページへリダイレクト  
  header("Location: home.php");
}
//DBとの接続
include_once 'dbconnect.php';
// ここまで、register.phpと同様
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>selfcook</title>
  </head>
  <body>

<div align = "center">

<header>
  <img src="img/icon.png"><br><font size="6">selfcook</font>
</header>

<?php
//ログインボタンが押されたときに実行
if(isset($_POST['login'])) {

  $email = $mysqli->real_escape_string($_POST['email']);
  $password = $mysqli->real_escape_string($_POST['password']);

  // クエリの実行
  //入力されたメールアドレスがDB上に存在するか
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = $mysqli->query($query);
  if (!$result) {
    print('クエリーが失敗しました。' . $mysqli->error);
    $mysqli->close();
    exit();
  }

  // パスワード(暗号化済み）とユーザーIDの取り出し
  while ($row = $result->fetch_assoc()) {
    $db_hashed_pwd = $row['password'];
    $user_id = $row['user_id'];
  }

  // データベースの切断
  $result->close();

  // ハッシュ化されたパスワードがマッチするかどうかを確認
  if (password_verify($password, $db_hashed_pwd)) {
    $_SESSION['user'] = $user_id;
    header("Location: home.php");
    exit;
  } else { ?>
    <div role="alert">メールアドレスとパスワードが一致しません。</div>
  <?php }
} 
?>

<!-- POSTメソッドで送信 -->
<form method="post">
    <dl>
      <dt><label for="q1">メールアドレス</label></dt>
      <dd><input type="email" name="email" id="q1"  size="30" placeholder="○○○@○○○.com" required></dd>
      <dt><label for="q2">パスワード</label></dt>
      <dd><input type="password" name="password" id="q2" size="30" placeholder="○○○○○○○○" required></dd>
    </dl>
    <button type="submit" class="btn btn-primary" name="login">ログイン</button>&ensp;
    <a href="register.php">会員登録はこちら</a>
</form>

<footer align = "bottom"><br><br>
  <font size="2">Copyright© selfcook All Rights Reserved</font>
</footer>

</div>
</body>
</html>