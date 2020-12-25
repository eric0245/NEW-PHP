<?php
    session_start();        //將session清空
if (!isset($_SESSION['id'])){          //防止登入機制。
    echo "請登入系統";
    echo "<meta http-equiv='refresh' content='3;url=index.html''>";        //echo代表的是輸出的意思。
}else{
    $conn = mysqli_connect("localhost", "root", "", "mydb");    //mysqli_connect，必須要設定ip(本地端為localhost)，帳號、密碼，以及連結的資料庫(mydb)。
    if (mysqli_connect_error($conn))
      die("無法連線資料庫");
    $sql="insert into bulletin(title, content, type, time) values ('{$_POST['title']}', '{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')"; 
    //echo $sql;
    if (!mysqli_query($conn, $sql)){
     echo("Error description: " . mysqli_error($conn));   
    }
    else  
       echo "新增佈告成功";   
    mysqli_close($conn);
    echo "<meta http-equiv='refresh' content='3;url=bulletin.php''>"; 
}
?>
