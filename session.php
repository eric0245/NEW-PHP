<?php
    error_reporting(0);   //error_reporting()設置PHP的報錯級別並返回當前級別，相當於禁用錯誤報告。
    
    $conn = mysqli_connect("localhost","root","", "mydb");    //mysqli_connect，必須要設定ip(本地端為localhost)，帳號、密碼，以及連結的資料庫(mydb)。
    if (mysqli_connect_error($conn))    //返回一個字符串描述的最後連接錯誤。
        die("資料庫連線錯誤");    //die()函數輸出一條消息，並退出當前腳本，該函數是exit()函數的別名。

    mysqli_set_charset($conn, "utf8");
    $result=mysqli_query($conn, "select * from user");
    
    $login=FALSE;
    while ($row=mysqli_fetch_array($result)) {    //mysqli_fetch_array從$result擷取每筆資料。
        if ($_POST["id"] == $row["id"] && $_POST["pwd"]==$row["pwd"])     //取得表單欄位的內容。
        $login=TRUE;
    }
    
    if  (!$_POST["id"] || !$_POST["pwd"]){    //取得表單欄位的內容。
           echo "請輸入帳號/密碼"; 
           echo "<meta http-equiv='refresh' content='3;url=login.html''>";              
    }
    elseif ($login==TRUE){
      session_start();
      $_SESSION["id"] = $_POST['id'];   //防止登入機制。
      echo "歡迎登入";    
      echo "<meta http-equiv='refresh' content='0;url=bulletin.php''>";   
    }
    else{
      echo "帳號密碼錯誤";    //echo代表的是輸出的意思。
      echo "<meta http-equiv='refresh' content='3;url=login.html''>";          
    }
?>