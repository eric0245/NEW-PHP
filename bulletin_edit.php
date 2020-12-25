<?php
    session_start();        //啟用 Session。
if (!isset($_SESSION['id'])){   //防止登入機制。
    echo "請登入系統";
    echo "<meta http-equiv='refresh' content='3;url=index.html''>"; 
}else{
    $conn = mysqli_connect("localhost", "root", "", "mydb");      //mysqli_connect，必須要設定ip(本地端為localhost)，帳號、密碼，以及連結的資料庫(mydb)。
    if (mysqli_connect_error($conn))        //返回一個字符串描述的最後連接錯誤。
      die("無法連線資料庫");        //die()函數輸出一條消息，並退出當前腳本，該函數是exit()函數的別名。
    $sql = "update bulletin set title='{$_POST['title']}', content='{$_POST['content']}', type={$_POST['type']}, time='{$_POST['time']}' where bid={$_POST['bid']}"; 
    //echo $sql;
    if (!mysqli_query($conn, $sql)){        //返回一個字符串描述的最後連接錯誤。
     echo("Error description: " . mysqli_error($conn));   
    }
    else  
       echo "修改成功";         //echo代表的是輸出的意思。
    mysqli_close($conn);        //函數關閉先前打開的數據庫連接。
    echo "<meta http-equiv='refresh' content='3;url=bulletin.php''>";       //echo代表的是輸出的意思。
}
?>
