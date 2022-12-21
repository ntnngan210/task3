<?php
//include_once "../model/user_model.php";
include_once "../controller/user.php";

if(isset($_POST["login"])){
    $user = new user_model();
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $login = $user->login_user($email,$pass);

    if($login){
        $message = "Đăng nhập thành công";
        header("Location: index.php");
    }else{
        $message = "Sai thong tin dang nhap";
        header("Location: dangnnhap.php");
    }
}
if(isset($_POST["registration"])){

//    $email = $_POST["email"];
//    $pass = $_POST["pass"];
//    $name = $_POST["name"];
    $login = add_User();
    echo 'hahaha';
    var_dump($login);
    exit();

//    if($login){
//        $message = "Đăng nhập thành công";
//        header("Location: index.php");
//    }else{
//        $message = "Sai thong tin dang nhap";
//        header("Location: dangnnhap.php");
//    }
}
?>