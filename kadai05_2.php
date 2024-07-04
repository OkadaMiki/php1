<?php
// 外部ファイルの読み込み
require_once "utility.php";

// post
// print "post";
// var_dump($_POST);
// print "<hr>";

// files
print "files";
var_dump($_FILES);
print "<hr>";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  redirect("kadai05_1.php");
}

$uploadFile = $_FILES['upload_image'];

// ファイルのアップロードに関するエラーのチェック
switch ($uploadFile['error']) {
  case UPLOAD_ERR_INI_SIZE:
    $message = "ファイルの容量が上限突破している";
    break;
  case UPLOAD_ERR_FORM_SIZE:
    $message = "ファイルの容量が上限突破している";
    break;
  case UPLOAD_ERR_PARTIAL:
    $message = "ファイルのアップロードが失敗";
    break;
  case UPLOAD_ERR_NO_FILE:
    $message = "ファイルを選んでください";
    break;
  case UPLOAD_ERR_NO_TMP_DIR:
    $message = "システム管理者に問い合わせ";
    break;
  case UPLOAD_ERR_CANT_WRITE:
    $message = "システム管理者に問い合わせ";
    break;
  case UPLOAD_ERR_EXTENSION:
    $message = "システム管理者に問い合わせ";
    break;
}

// アップロードされたファイル名から拡張子を取り出す
$ex = preg_split("/\./", $uploadFile["name"]);
$ex = $ex[count($ex) - 1];
var_dump($ex);

// ファイル名に使用するランダムな文字列を作成
$filename = random_bytes(32);
$base64Filename = base64_encode($filename);
$base64Filename = preg_replace("/[+\/=]/", "", $base64Filename);

// ファイルを所定のフォルダに移動
if (!move_uploaded_file($uploadFile['tmp_name'], "thumbnails/{$base64Filename}.{$ex}")) {
  $message = "ファイルのアップロードに失敗";
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="css/style.css" rel="stylesheet">

  <!-- script -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>php1 - kadai05_2</title>
</head>

<body class="bg-slate-50">
  <div class="wrapper w-screen h-screen box-border">

    <header class="bg-teal-500">
      <div class="container mx-auto px-2 py-5">
        <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
        <h2 class="text-white text-3xl">ファイル処理</h2>
      </div><!--/.container-->
    </header>

    <main>
      <div class="container w-full h-full mx-auto px-2 py-20">
        <h3 class="text-xl border-b-2 border-green-400 mb-10 pb-2">画像のアップロード</h3>

        <div class="p-10 border border-gray-200">
          <?php if (!$message) : ?>
            <figure><img src=<?= "thumbnails/{$base64Filename}.{$ex}" ?> class="object-contain object-center"></figure>
          <?php else : ?>
            <!-- アップロードエラーのHTML  -->
            <p class="text-pink-600 text-xl py-10"><?= $message ?></p>
          <?php endif ?>
        </div>

        <div class="flex justify-center mt-10">
          <a href="./kadai05_1.php" class="block w-40 h-10 text-white text-center leading-10 bg-gray-500 hover:bg-gray-400 rounded-md">戻る</a>
        </div>

      </div><!--/.container-->
    </main>

  </div><!--/.wrapper-->
  <script src="js/kadai05.js"></script>
</body>

</html>