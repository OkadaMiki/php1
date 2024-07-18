<?php


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
  <title>php1 - kadai13_1</title>
</head>
<body class="bg-slate-50">
<div class="wrapper box-border">

<header class="bg-teal-500">
  <div class="container mx-auto px-2 py-5">
    <h1 class="text-l text-white mb-6"><a href="#">サーバーサイドスクリプト演習１</a></h1>
    <h2 class="text-3xl text-white">ログイン認証</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container w-full h-full mx-auto px-2 py-20">

    <div class="mb-10">
      <h3 class="text-xl border-b-2 border-teal-400 pb-2 mb-5">ログイン</h3>
      
      <p class="text-red-600">エラーメッセージを表示</p>
      
    </div>

    <form action="kadai13_2.php" method="POST">
    <div class="mx-auto w-full sm:w-10/12 md:w-8/12 lg:w-4/12 border rounded-md shadow-md p-5">
      <div class="flex flex-col mb-10">
        <label for="" class="text-gray-500 text-left uppercase tracking-wider">Account</label>
        <input type="text" name="user_id" id="" class="bg-white px-2 py-2 border rounded-md outline-none focus:border-teal-200" value="">
      </div>
      <div class="flex flex-col mb-5 sm:mb-10">
        <label for="" class="text-gray-500 text-left uppercase tracking-wider">Password</label>
        <input type="password" name="password" id="" class="px-2 py-2 border rounded-md outline-none focus:border-teal-200" value="">
      </div>
      <div class="flex flex-col sm:flex-row justify-between items-center">
        <a href="kadai14_1.php" class="text-teal-600 hover:text-teal-500 mb-5 sm:mb-0">アカウントの作成</a>
        <button type="submit" class="w-full sm:w-auto text-white text-center leading-10 bg-indigo-700 px-10  sm:mb-0 hover:bg-indigo-600 rounded-md">ログイン</button>
      </div>
    </div>
    </form>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>