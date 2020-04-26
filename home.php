<?php
//セッション管理開始
session_start();
//DBとの接続
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])) {
  header("Location: index.php");
}

// DBのユーザーIDからユーザー名を取り出す
$query = "SELECT * FROM users WHERE user_id=".$_SESSION['user']."";
$result = $mysqli->query($query);

if (!$result) {
  print('クエリーが失敗しました。' . $mysqli->error);
  $mysqli->close();
  exit();
}

// ユーザー情報の取り出し
while ($row = $result->fetch_assoc()) {
  $username = $row['username'];
  $email = $row['email'];
}

// データベースの切断
$result->close();

?>
<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>selfcook</title>
    <link rel="icon" href="img/icon.png">
  </head>
  <body>

<header class="container">
  <img src = "img/main.jpg">
  <p>selfcook</p>
</header>

<div class="container">

<div><img src = "img/omurice.jpg"></div>
<div>
  <h2><a href="recipe1.html">オムライス</a></h2>
  <p>材料：米/とり肉/卵/玉ねぎ/牛乳<br>
    調味料：にんにく/バター/マヨネーズ<br>ブラックペッパー/塩こしょう</p>
</div>

<div><img src = "img/tonjiru.jpg"></div>
<div>
  <h2><a href="recipe2.html">豚汁</a></h2>
  <p>材料：豚バラ肉/玉ねぎ/にんじん/大根/こんにゃく<br>
  調味料：ごま油/にんにく/塩/ほんだし/みそ</p>
</div>

<div><img src = "img/risotto.jpg"></div>
<div>
  <h2><a href="recipe3.html">リゾット</a></h2>
  <p>材料：洗ってない米/玉ねぎ/にんにく<br>
     調味料：コンソメ/粉チーズ/バター<br>オリーブオイル/塩/黒こしょう</p>
</div>

<div><a href="logout.php?logout">ログアウト</a></div>

<!-- <h1>プロフィール</h1>
<ul>
  <li>名前：<?php echo $username; ?></li>
  <li>メールアドレス：<?php echo $email; ?></li>
</ul> -->

</div>

<footer align = "bottom"><br><br>
  <font size="2">Copyright© selfcook All Rights Reserved</font>
</footer>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>