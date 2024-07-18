<?php


require_once __DIR__ . "/config.php";
require_once __DIR__ . "/utility.php";

// POST METHODかをチェック
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("kadai13_1.php");
}
