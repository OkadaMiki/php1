<?php

// セッションの開始
session_start();

//セッションへのアクセス
// $SESSION はグローバル変数配列
var_dump($_SESSION);

// $_SESSION["timestamp"] = date("YmdHis");
var_dump($name);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sample - session</title>
</head>

<body>

    <h1>セッションを扱う</h1>
</body>

</html>