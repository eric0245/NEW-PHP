<?php
    error_reporting(0);       //error_reporting()設置PHP的報錯級別並返回當前級別，相當於禁用錯誤報告。
    session_start();        //啟用 Session。
    if (!isset($_SESSION["counter1"])){     //防止登入機制。
        $_SESSION["counter1"]=1;        //利用 Session 機制儲存資料，讓不同頁面之間可以互相傳遞資料。
    }else{
        $_SESSION["counter1"]++;        //利用 Session 機制儲存資料，讓不同頁面之間可以互相傳遞資料。
    }
    echo "登入{$_SESSION["counter1"]}人次";     //echo代表的是輸出的意思。
?>