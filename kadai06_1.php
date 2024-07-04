<?php

const DB_HOST = "localhost";
const DB_USER = "mokada";
const DB_PASS = "eccMyAdmin";
const DB_NAME = "mokada";
$products = [];
$categories = [];

// 1. DB接続
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

try {
  // DBへの接続をチェック
  if ($db->connect_error) {
    throw new Exception("DB Connect Error");
  }

  // DBとのデータの送受信で使用する文字のエンコードの指定
  $db->set_charset("utf8");

  // 2. SQLの準備
  var_dump($_GET);
  // emptyは空っぽかどうか 空っぽでtrue
  // if (!empty($_GET["category"])) {
  //   $categoryId = $_GET["category"];
  // } else {
  //   $categoryId = 0;
  // }
  $categoryId = filter_input(INPUT_GET, "category");

  $where = "";
  if ($categoryId) {
    $where = "WHERE category_id = {$categoryId}";
  }
  $sql = "SELECT * FROM php1_products {$where}";

  // SQLの実行
  if (!$result = $db->query($sql)) {
    throw new Exception("SQL Query Error >> {$sql}");
  }

  while ($row = $result->fetch_object()) {
    $products[] = $row;
  }
  // var_dump($products);

  // すべてのカテゴリーレコードを取得するSQL
  $sql = "SELECT * FROM php1_categories";
  // SQLの実行
  $result = $db->query($sql);
  while ($row = $result->fetch_object()) {
    $categories[] = $row;
  }
  // var_dump($categories);

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

  <!-- link -->
  <link href="asset/styles/style.css" rel="stylesheet">

  <!-- script -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>php1 - kadai06_1</title>
</head>

<body class="bg-slate-50">
  <div class="wrapper box-border">

    <header class="bg-teal-500">
      <div class="container mx-auto px-2 py-5">
        <h1 class="text-l text-white mb-6"><a href="#">サーバーサイドスクリプト演習１</a></h1>
        <h2 class="text-3xl text-white">データベース処理</h2>
      </div><!--/.container-->
    </header>

    <main>
      <div class="container w-full h-full mx-auto px-2 py-20">
        <div class="flex justify-between items-end border-b-2 border-green-400 pb-3 mb-10">
          <h3 class="text-xl">登録商品一覧</h3>
          <a href="kadai08_1.php" class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">新規登録</a>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-start">

          <div class="w-full md:w-3/12 h-80 bg-white mb-10 md:mb-0 p-5 shadow-md">
            <form action="kadai06_1.php" method="GET" class="h-full">

              <div class="flex flex-col justify-between h-full">
                <div>
                  <div class="border-b border-gray-300 border-dashed mb-4 pb-6">
                    <label for="name" class="text-gray-500 text-xs uppercase tracking-wider">name</label>
                    <input type="text" name="name" id="name" class="w-full h-10 px-3 text-sm border-2 border-gray-200 rounded-md outline-none focus:border-green-200" value="" placeholder="product name">
                  </div>

                  <div>
                    <label for="category" class="text-gray-500 text-xs uppercase tracking-wider">category</label>
                    <select name="category" id="category" class="bg-white w-full h-10 px-3 text-sm border-2 border-gray-200 rounded-md outline-none focus:border-green-200">
                      <option value="0">すべての商品</option>
                      <?php foreach ($categories as $value) : ?>
                        <option value="<?= $value->id ?>" <?php if ($value->id == $categoryId) : ?> selected <?php endif ?>><?= $value->name ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="flex justify-center">
                  <button type="submit" class="w-40 h-10 text-white text-lg bg-indigo-600 hover:bg-indigo-500 rounded-md">検索</button>
                </div>
              </div>

            </form>
          </div>


          <div class="w-full md:w-8/12 bg-white">
            <!-- <div class="flex justify-end mb-10">
          <a href="#" class="block w-40 h-10 text-white text-center leading-10 bg-pink-600 hover:bg-pink-500 rounded-md">新規登録</a>
        </div> -->

            <table class="w-full table-fixed">
              <thead>
                <tr class="bg-gray-100 text-gray-500 text-xs text-left uppercase tracking-wider border-b border-gray-300">
                  <th class="w-2/12 h-6 font-medium px-6 py-3">code</th>
                  <th class="w-6/12 h-6 font-medium px-6 py-3">name</th>
                  <th class="w-2/12 h-6 font-medium px-6 py-3">price</th>
                  <th class="w-2/12 h-6 text-center font-medium px-6 py-3">setting</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($products as $value) : ?>
                  <tr class="tracking-wider border-b border-gray-200 hover:bg-gray-100 ">
                    <td class="h-10 px-6 py-5"><?= $value->code ?></td>
                    <td class="h-10 px-6 py-5"><?= $value->name ?></td>
                    <td class="h-10 px-6 py-5"><?= $value->price ?></td>
                    <td class="h-10 text-center px-6 py-5">
                      <a href="kadai07_1.php?product_code=<?= $value->code ?>" class="text-pink-600 hover:text-pink-400">詳細</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>

          <!-- エラーメッセージ -->
          <div>
            <p class="text-xl">エラーメッセージの表示</p>
          </div>

        </div>

      </div><!--/.container-->
    </main>

  </div><!--/.wrapper-->
</body>

</html>