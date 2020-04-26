<?php
//セッション管理開始
session_start();
if( isset($_SESSION['user']) != "") {
  // ログイン済みの場合はhomeへ移動する
  header("Location: home.php");
}

// DBと接続する
include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>

<?php
// signupのデータが送られたときに下記を実行
if(isset($_POST['signup'])) {

  $username = $mysqli->real_escape_string($_POST['username']);
  $email = $mysqli->real_escape_string($_POST['email']);
  $password = $mysqli->real_escape_string($_POST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);

  // POST情報をDBに格納する
  $query = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";

  //$queryを実行
  if($mysqli->query($query)) {  ?>
    <div role="alert">登録しました</div>
    <?php }else{ ?>
    <div role="alert">エラーが発生しました。</div>
    <?php
  }
}
?>

<!-- POSTメソッドで送信 -->
<div class = "container">
    <form method="post">
    <dl>
      <!-- 各情報をPOSTで送信 -->
      <dt><label for="q1">氏名</label></dt>
      <dd><input type="text" name="username" id="q1" size="30" placeholder="○○ ○○" required></dd>
      <dt><label for="q2">メールアドレス</label></dt>
      <dd><input type="email" name="email" id="q2"  size="50" placeholder="○○○@○○○.com" required></dd>
      <dt><label for="q3">パスワード</label></dt>
      <dd><input type="password" name="password" id="q3" size="30" placeholder="○○○○○○○○" required></dd>
    </dl>
    
    <!-- 新規登録へ移動 -->
    <button type="submit" class="btn btn-primary" name="signup">新規登録</button>&ensp;

    <!-- ログインを実行 -->
    <a href="index.php">ログインはこちら</a>
  </form>
</div>
</body>
</html>