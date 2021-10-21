<?php

    $email = $_GET['email'];
    $code  = $_GET['code'];

    $conn = mysqli_connect('localhost','root','','tlu_phonebook');
    if(!$conn){
        die("Không thể kết nối");
    }

    $sql = "SELECT * FROM db_users WHERE user_email='$email' OR user_code='$code'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $sql_2 = "UPDATE db_users SET user_status = 1 WHERE user_email = '$email'";
        $result_2 = mysqli_query($conn,$sql_2);

        if($result_2 > 0){
            echo 'Tài khoản đã được kích hoạt';
        }
    }else{
       echo 'Không thể kích hoạt.';
    }






?>