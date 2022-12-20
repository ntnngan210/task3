<?php
include './models/product.php';
include './database/dbhelper.php';
 $conn = new Database(null,null,null,null);
 $list_product = new Product($book_isbn,"","","","","","");
 $row =$list_product->getBook();
?>