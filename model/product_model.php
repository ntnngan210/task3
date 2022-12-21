<?php 
include "../util/connect.php";
    class product_model extends connect
{
        private $id_product;
        private $name_product;
        private $price;
        private $img;
        private $table = 'product';
    function __construct($id_product ='',$name_product ='',$price='',$img='')
    {
        $this->id_product = $id_product;
        $this->name_product = $name_product;
        $this->price=$price;
        $this->img = $img;
    }

    function get_id_product()
    {
        return $this->id_product;
    }
    function get_name_product()
    {
        return $this->name_product;
    }
    function get_price()
    {
        return $this->price;
    }
    function get_img()
    {
        return $this->img;
    }
    function getProduct(){
        return $this->getData($this->table);
   }
   function add_p(){
        $data = 
        [$this->id_product,
        $this->name_product,
        $this->price,
        $this->img
    ];
        $sql = "INSERT INTO $this->table (`id_product`, `name_product`, `price`, `img`) VALUES (?,?,?,?)";
        $this->updateQuery($sql,$data);
    }
    function detail_p($id_product)
   {
        $sql="select * from $this->table where id_product=? ";
        $arr= array($id_product);
        $data= parent::selectQuery($sql, $arr);
        if (Count($data)>0)
            return $data[0];
            return 0;
   }
    function delete_p($id_product)
   {
        $product = $this->detail_p($id_product);
        $img = '../images/' .$product['img'];
        unlink($img);
        $sql="delete from $this->table where id_product= ?";
        $this->updateQuery($sql,array($id_product));
   }
   function adjust_p(){
    $data = 
        [
        $this->name_product,
        $this->price,
        $this->img,
        $this->id_product
    ];
        $sql = "UPDATE $this->table SET name_product = ?, price = ?, img = ? WHERE id_product = ?";
        $this->updateQuery($sql,$data);
   }
}


?>