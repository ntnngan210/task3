<?php 
include_once "../util/connect.php";
 class user_model extends connect
 {
    private $id_user;
    private $password;
    private $email;
    private $FullName;
    private $table = 'user';
    function __construct($id_user ='',$password ='',$email='',$FullName='')
    {
        $this->id_user = $id_user;
        $this->email = $email;
        $this->password=$password;
        $this->FullName = $FullName;
    }

    function get_id_user()
    {
        return $this->id_user;
    }

    function get_password()
    {
        return $this->password;
    }

    function get_email()
    {
        return $this->email;
    }

    function get_fullname()
    {
        return $this->FullName;
    }

    function login_user($email,$password)
   {
            $sql="select id_user from $this->table  where email = ? and password = ?";
            return  $this->login_u($sql,$email,$password);
   }
   function getUser(){
        return $this->getData($this->table);
   }
   function add_u(){
        $data = 
        [$this->id_user,
        $this->password,
        $this->email,
        $this->FullName
    ];
        $sql = "INSERT INTO $this->table (`id_user`, `password`, `email`, `FullName`) VALUES (?,?,?,?)";
        $this->updateQuery($sql,$data);
   }
   function delete_u($id_user)
   {
       $sql="delete from $this->table where id_user= ?";
       $this->updateQuery($sql,array($id_user));
       
   }
   function detail_u($id_user)
   {
        $sql="select * from $this->table where id_user=? ";
        $arr= array($id_user);
        $data= parent::selectQuery($sql, $arr);
        if (Count($data)>0)
            return $data[0];
        return 0;
   }
   function adjust_u(){
    $data = 
        [
        $this->password,
        $this->email,
        $this->FullName,
        $this->id_user
    ];
        $sql = "UPDATE $this->table SET password = ?, email = ?, FullName = ? WHERE id_user = ?";
        $this->updateQuery($sql,$data);
   }
 }
?>