<?php

//　汎用的な関数を定義

// htmlspecialchars
//　↓()の中にイコールで書くと初期値が設定できる
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

// セッションデータを参照
function old($key)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return (!empty($_SESSION[$key])) ? h($_SESSION[$key]) : "";
}

// リダイレクトを行う関数
function redirect($location)
{
    header("Location: {$location}");
    exit;
}
