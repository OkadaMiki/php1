<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/utility.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("kadai06_1.php");
}

var_dump($_POST);
