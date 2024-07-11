<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/utility.php";

// request method POST チェック
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("kadai06_1.php");
}

// 疑似メソッドがあるかとPUTかをチェック
$_method = filter_input(INPUT_POST, "_method");
if (!$_method || $_method !== "PUT") {
    redirect("kadai06_1.php");
}

try {
    /*
    // UPDATE SQL
    UPDATE {tablename} SET 項目名 = 値, 項目名 = 値 WHERE code = 値
    */
} catch (Exception $error) {
}

var_dump($_POST);
