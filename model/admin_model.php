<?php 
include "../util/connect.php";
 class admin_model extends connect
 {
    private $id;
    private $password;
    private $email;
    private $table_name = 'admin';
    function __construct($id ='',$password ='',$email='')
    {
        $this->id = $id;
        $this->email = $email;
        $this->password=$password;
    }

    function get_id()
    {
        return $this->id;
    }

    function get_password()
    {
        return $this->password;
    }

    function get_email()
    {
        return $this->email;
    }

    function loginAdmin($email,$password)
   {
            $sql="select id from $this->table_name  where email = ? and password = ?";
            return  $this->login($sql,$email,$password);
   }
 }
?>