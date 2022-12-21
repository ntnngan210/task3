<?php
include_once "../model/user_model.php";
$user = new user_model();
if(isset($_POST["login"])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $login = $user->login_user($email,$pass);
    if($login){
        $message = "Đăng nhập thành công";
        header("Location: index.php");
    }

}

?>