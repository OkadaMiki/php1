<?php

// パスワードの暗号化

$password = "ECC_Comp.";

$hashPassword = password_hash($password, PASSWORD_DEFAULT, ["cost => 13"]);

print "
    {$password}
    <hr>
    {$hashPassword}
";

$newPassword = "ECC_Comp";

// パスワードの認証(暗号化したパスワードと同じかを調べる)
if (password_verify($newPassword, $hashPassword)) {
    print "パスワードは同じ";
} else {
    print "パスワードは違う";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1 - Temp</title>
</head>

<body>

</body>

</html>