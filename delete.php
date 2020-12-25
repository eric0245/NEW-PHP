<?php
    error_reporting();      //error_reporting()設置PHP的報錯級別並返回當前級別，相當於禁用錯誤報告。
    $conn=mysqli_connect("localhost","root","","mydb");     //mysqli_connect，必須要設定ip(本地端為localhost)，帳號、密碼，以及連結的資料庫(mydb)。
    // delete from bulletin where bid=???
    $sql="delete from bulletin where bid={$_GET[bid]}";
    //echo $sql;
    if (!mysqli_query($conn, $sql))
        echo "刪除錯誤";
    else{
        echo "刪除成功；回前頁中...";
        echo "<meta http-equiv='refresh' content='3;url=bulletin.php'>"; 
    }
?>