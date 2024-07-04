<?php

// 1. DB接続
// mysqli(HOST,USER_NAME,PASSWORD,DB_NAME)
$db = new mysqli("localhost", "mokada", "eccMyAdmin", "mokada");

try {
    // DBへの接続をチェック
    if ($db->connect_error) {
        throw new Exception("DB Connect Error");
        // ↑ うまくいかなかったときは登録した文章を呼び出してきたところに投げてくれる
        // exception は例外
    }

    // DBとのデータの送受信で使用する文字のエンコードの指定
    $db->set_charset("utf8");


    // 2. SQLの準備
    $table = "php1_zip";
    $sql = "SELECT * FROM {$table} LIMIT 100";

    // SQLの実行
    if (!$result = $db->query($sql)) {
        throw new Exception("SQL Query Error >> {$sql}");
    }
    // var_dump($result);

    // -----------------
    // 3. SQLの結果を整形
    // -----------------
    // var_dump(($result->fetch_object())->city);
    $address = [];
    while ($row = $result->fetch_object()) {
        $address[] = $row;
    }
    var_dump($address);

    // -----------------
    // 4. DBの接続を閉じる
    // -----------------
    $db->close();
} catch (Exception $error) {
    print $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1 - DB</title>
</head>

<body>
    <h1>phpでデータベースを扱う</h1>

    <!-- テーブルタグで $address の情報を表示 -->
    <table>
        <tr>
            <th>#</th>
            <th>ZIP</th>
            <th>PREF</th>
            <th>CITY</th>
            <th>TOWN</th>
        </tr>

        <?php foreach ($address as $value) : ?>
            <tr>
                <th><?= $value->id ?></th>
                <th><?= $value->zip ?></th>
                <th><?= $value->pref ?></th>
                <th><?= $value->city ?></th>
                <th><?= $value->town ?></th>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>