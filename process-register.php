<?php
    include('send.php');
    //Nhan du lieu gui sang
    if(isset($_POST['sbmRegister'])){
        $user  = $_POST['txtUser'];
        $email = $_POST['txtEmail'];
        $pass1 = $_POST['txtPass1'];
        $pass2 = $_POST['txtPass2'];
    }
    //Nhiem vu cua javascript:coi nhu du lieu nhap da hop le
    //Nhiem vu cua PHP:kiem tra Email da ton tai chua,neu chua thi moi chen va gui email
    //b1:Ket noi db sever
    $conn = mysqli_connect('localhost', 'root', '', 'tlu_phonebook');
    if(!$conn){
        die("Không thể kết nối");
    }
    //B2:Truy van du lieu de kiem tra email:
    $sql = "SELECT * FROM db_users WHERE user_email='$email' OR user_name='$user'";
    $result = mysqli_query($conn,$sql);
   //B3:Xu li du lieu 
    if(mysqli_num_rows($result) > 0){
        echo 'Email hoặc Username đã tồn tại';
    } else{
        //Bam mat khau
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $code = md5(uniqid(rand(), true));
        $sql_2 = "INSERT INTO db_users (user_name, user_email, user_pass,user_code) VALUES ('$user','$email','$pass_hash','$code')";
        $result_2 = mysqli_query($conn,$sql_2);

        if($result_2 >=1){
            sendEmail($email,$code);
        }
    }
?>