<?php 
include "../model/admin_model.php";
$btn = $_POST["login_btn"];

if(isset($btn))
{
    $email = $_POST["email_admin"];
    $password =$_POST["password_admin"];
    $admin = new admin_model();
    if($admin->loginAdmin($email,$password))
        {
            header("Location:http://localhost:/doanthaylamnay/view_admin/home.php");
        }
    else
        {   
            header("Location:http://localhost:/doanthaylamnay/view_admin/index.php");
        }
}
