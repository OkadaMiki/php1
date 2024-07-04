<?php

$siteName = "サーバーサイド演習";
$pageTitle = "変数";

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $siteName ?> - <?= $pageTitle ?></title>
</head>
<body>
    <h1><?= "PHPで{$pageTitle}を扱う" ?></h1>
    <p>PHPで<?= $pageTitle ?>を扱う</p>

    <h2>文字列の連結は . を使う</h2>
    <p><?= $siteName . $pageTitle ?></p>
</body>
</html>