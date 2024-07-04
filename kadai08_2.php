<?php

// phpだけ書くときは閉じタグ不要、ないほうがいい、最後は一行空白

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/utility.php";

// REQUEST METHOD が POST かをチェック
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("kadai08_1.php");
}

try {

    // postデータを取り出す、なかったらnullを返す
    $productCode = filter_input(INPUT_POST, "product_code");
    $name        = filter_input(INPUT_POST, "name");
    $price       = filter_input(INPUT_POST, "price");
    $categoryId  = filter_input(INPUT_POST, "category");

    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $db->set_charset("utf8");

    if (!($productCode && $name && $categoryId)) {
        throw new Exception("入力エラー");
    }

    // トランザクションを開始
    $db->begin_transaction();
    $table = TB_PRODUCT;

    $sql = "
        INSERT INTO {$table}(code,name,price,category_id)
        VALUES(?,?,?,?)
    ";

    // プリペアードステートメントの準備
    $stmt = $db->prepare($sql);
    // ステートメントのラベルに値を設定
    $stmt->bind_param("ssii", $productCode, $name, $price, $categoryId);

    //ステートメントを実行
    $stmt->execute();

    // トランザクションの内容をコミット
    $db->commit();

    $db->close();

    redirect("kadai07_1.php?product_code={$productCode}");
} catch (Exception $error) {
    // ↓エラー処理するときに書くから今いらん
    // $_SESSION["message"] = $error->getMessage();
    // トランザクションの内容をロールバック
    $db->rollback();
    redirect("kadai08_1.php");
}
