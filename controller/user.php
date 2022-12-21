<?php
include "../model/user_model.php";
$_SESSION["Error"]= null;
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
$btn_login = isset($_POST["login-submit"]) ? true : false;
$btn_register = isset($_POST['register-submit']) ? true : false;
function Register()
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $FullName = $_POST["FullName"];

    $user = new user_model(null, $password, $email, $FullName);
    $sql = "select * from user  where email = ?";
    $array = array($email);
    $userData = $user->selectQuery($sql, $array);
    if (count($userData) > 1) {
        $_SESSION["Error"] = 'Email đã được đăng ký!';
        return false;
    } else {
        $user->add_u();
        return true;
    }
}

function success()
{

    echo "<script>alert('Đăng ký thành công');</script>";
}

if ($btn_login) {
    $_SESSION["Error"] =null;
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new user_model();
    if ($user->login_user($email, $password)) {
        header("Location: ../view_user/index.php");

    } else {
        header("Location: ../view_user/dangnhap.php");
    }
}

if ($btn_register) {
    $_SESSION["Error"] =null;
    if (Register()) {
        success();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = new user_model();
        if ($user->login_user($email, $password)) {
            header("Location: ../view_user/index.php");

        } else {
            header("Location: ../view_user/dangnhap.php");
        }
    } else {
        header("Location: ../view_user/dangky.php");
    }
}
