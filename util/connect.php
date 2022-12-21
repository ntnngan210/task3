<?php 
class connect 
{
    private $servername ;
    private $username ;
    private $password ;
    private $dbname;
    
    private $conn=null;

    public function __construct()
    {
      $this->servername="localhost";
      $this->username="root";
      $this->password="";
      $this->dbname="doanthaylam";
    }
    public function connected()
    {
        try {
          $this->conn = new PDO('mysql:host=' .$this->servername .';dbname=' . $this->dbname, $this->username, $this->password);
  // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
        
       } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
         }
    }
    function open()
    {
      $db = new connect();
      $this->conn=$db->connected();
    }
    function updateQuery($sql, $arr=array())
    {
     $this->open();
       $data = $this->conn->prepare($sql);
       $data->execute($arr);
       return $data->rowCount();
   }
   function selectQuery($sql, $arr=array())
       {
      $this->open();
          $data = $this->conn->prepare($sql);
          $data->execute($arr);
          return $data->fetchAll(PDO::FETCH_ASSOC);
       }
    function getData($table){
      $this->open();
      $data = $this->conn->prepare("select * from $table");
      $data->execute();
      return $data->fetchAll();
    }

     //login_admin
    function login($sql,$email,$password)
    {
      $this->open();
      $data = $this->conn->prepare($sql);
      $data->execute(array($email,$password));
      $row = $data->rowCount();
      $data = $data->fetch(PDO::FETCH_ASSOC);
      if($row>0)
      {
        $_SESSION['id']=$data['id'];
        return 1;
      }
      else
      {
        return false;
      }
    }
     //login_user
     function login_u($sql,$email,$password)
     {
       $this->open();
       $data = $this->conn->prepare($sql);
       $data->execute(array($email,$password));
       $row = $data->rowCount();
       $data = $data->fetch(PDO::FETCH_ASSOC);
       if($row>0)
       {
         $_SESSION['id_user']=$data['id_user'];
         $_SESSION['fullname']=$data['fullname'];
         return true;
       }
       else
       {
         return false;
       }
     }
}

?>