<?php
    class Publicsher{
        public $id;
        public $name;
       

        function __construct($id,$name)
        {
            $this->id = $id;
            $this->name = $name;
        
        }
        public function getInsert(){
            $conn  = new Database(null,null,null,null);
            $conned = $conn ->getConnect();
            try {
                $sql = "INSERT INTO books (,) VALUES (?,?)";
                $stmt= $conned->prepare($sql);
                $stmt->execute([$this->id,$this->name]);
                echo 'insert successfully !!';
            } catch (Throwable $th) {
                echo $th;
            }
            $conn->disConnect($conned);
        }
        public function getPublisher(){
            $conn  = new Database(null,null,null,null);
            $conned = $conn ->getConnect();
            try {
                $stmt = $conned->prepare("SELECT * FROM books WHERE book_isbn=?");
                $stmt->execute([$this->id]); 
                $book = $stmt->fetch();
                return $book;

            } catch (Throwable $th) {
                echo ' fail !!';
            }

            $conn->disConnect($conned);
        }
        public function getAllPublisher(){
            $conn  = new Database(null,null,null,null);
            $conned = $conn ->getConnect();
            try {
                $stmt = $conned->query("SELECT * FROM books");
                $book = $stmt->fetchAll();
                return $book;

            } catch (Throwable $th) {
                echo ' fail !!';
            }
            $conn->disConnect($conned);
        }
       
        
    }
?>