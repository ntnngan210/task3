<?php 
    include "../model/product_model.php";
    function add_Product(){
        $name_product = $_POST["productname"];
        $price =$_POST["price"];
        //lay ten
        $img_location=$_FILES['img']['name'];
        // upload file
        $img=basename($_FILES['img']['name']);
        $img=str_replace(' ','|',$img);

        $tmppath="../images/".$img;
        move_uploaded_file($_FILES['img']['tmp_name'],$tmppath);
        $product = new product_model(null,$name_product,$price,$img);
        $product->add_p();
    }
    function delete_Product(){
        $id_product = $_POST["delete_id"];
        $product = new product_model();
        
        $product->delete_p($id_product);
    }
    function adjust_Product(){
        $id_product = $_POST["adjust_id"];
        $name_product = $_POST["adjust_name"];
        $price =$_POST["adjust_price"];
        $exist_img =$_POST['exist_img'];
        $img_location =$_FILES['img']['name'];
        if($img_location != '')
        {
            $update_img =$_FILES['img']['name'];
            $img = basename($_FILES['img']['name']);
            $img = str_replace('','|','$img');
            $link = "../images/" .$img;
            move_uploaded_file($_FILES['img']['link_name'],$link);
            $img = '../images/' .$exist_img;
            unlink($img);
        }
        else
        {
            $update_img=$exist_img;
        }
        $product = new product_model($id_product,$name_product,$price,$update_img);
        $product->adjust_p($id_product);
    }
    if(isset($_POST["add_btn"]))
    {
        add_Product();
        header("Location:http://localhost:/doanthaylamnay/view_admin/product.php");
    }
    if(isset($_POST["delete_btn"]))
    {
        delete_Product();
        header("Location:http://localhost:/doanthaylamnay/view_admin/product.php");
    }
    if(isset($_POST["adjust_btn"]))
    {
        adjust_Product();
        header("Location:http://localhost:/doanthaylamnay/view_admin/product.php");
    }
