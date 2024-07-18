<?php


require_once __DIR__ . "/config.php";
require_once __DIR__ . "/utility.php";

// POST METHODかをチェック
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("kadai13_1.php");
}

try {
    $account = filter_input(INPUT_POST, "user_id");
    $password = filter_input(INPUT_POST, "password");

    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($db->connect_error) {
        throw new Exception("DB Connect Error");
    }
    $db->set_charset("utf8");

    $table = "php1_users";
    $sql = "SELECT * FROM {$table} WHERE account = ?";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $account);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result->num_rows) {
        throw new Exception("アカウントが登録されていません");
    }

    $user = $result->fetch_object();
    var_dump($user);

    // パスワードが一致するかチェック
    if (password_verify($newPassword, $user -> )) {
        throw new Exception("アカウントかパスワードが間違っています");
    }
    $db -> close();

} catch (Exception $error) {
    redirect("kadai13_1.php");
}
