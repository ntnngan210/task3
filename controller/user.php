<?php
include "../model/user_model.php";
function add_User()
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $FullName = $_POST["FullName"];
    $user = new user_model(null, $password, $email, $FullName);
    $user->add_u();
}
function delete_User()
{
    $id_user = $_POST["delete_id"];
    $user = new user_model();
    $user->delete_u($id_user);
}
function adjust_User()
{
    $id_user = $_POST["adjust_id"];
    $email = $_POST["adjust_email"];
    $password = $_POST["adjust_password"];
    $FullName = $_POST["adjust_name"];
    $user = new user_model($id_user, $password, $email, $FullName);
    $user->adjust_u();
}
if (isset($_POST["add_btn"])) {
    add_User();
    header("Location:http://localhost:/doanthaylamnay/view_admin/home.php");
}
if (isset($_POST["delete_btn"])) {
    delete_User();
    header("Location:http://localhost:/doanthaylamnay/view_admin/home.php");
}
if (isset($_POST["adjust_btn"])) {
    adjust_User();
    header("Location:http://localhost:/doanthaylamnay/view_admin/home.php");
}
$btn_login = $_POST["login-submit"];
$btn_register = $_POST['register-submit'];
function Register()
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $FullName = $_POST["username"];
    $user = new user_model(null, $password, $email, $FullName);
    $user->add_u();
}
function success()
{

    echo "<script>alert('Đăng ký thành công');</script>";
}
if (isset($btn_login)) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new user_model();
    if ($user->login_user($email, $password)) {
        header("Location:http://localhost:/doanthaylamnay/view_user/home.php");
    } else {
        header("Location:http://localhost:/doanthaylamnay/view_user/index.php");
    }
}

if (isset($_POST["register-submit"])) {
    if (Register()) {
        success();
        header("Location:http://localhost:/doanthaylamnay/view_user/index.php");
    } else {
        header("Location:http://localhost:/doanthaylamnay/view_user/index.php");
    }
}
