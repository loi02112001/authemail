<?php
    $email = 'loi65732102@gmail.com';
    $password_raw = '123';

    $conn = mysqli_connect('localhost', 'root', '', 'tlu_phonebook');
    if(!$conn){
        die('Không thể kết nối');
    }

    $sql = "SELECT * FROM db_users WHERE user_email = '$email'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $password_hash = $row['user_pass'];
        if(password_verify($password_raw, $password_hash)){
            echo 'Đăng nhập thành công';
        }else{
            echo 'Mật khẩu không khớp';
        }
    }else{
        echo 'Email không tồn tại';
    }
?>