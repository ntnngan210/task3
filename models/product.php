<?php
    class Product{
        public $id;
        public $title;
        public $author;
        public $image;
        public $description;
        public $price;
        public $publisherid;

        function __construct($id,$title,$author,$image,$description,$price,$publisherid)
        {
            $this->id = $id;
            $this->title = $title;
            $this->image = $image;
            $this->author = $author;
            $this->price = $price;
            $this->description = $description;
            $this->publisherid = $publisherid;
        }
        public function getInsert(){
            $conn  = new Database(null,null,null,null);
            $conned = $conn ->getConnect();
            try {
                $sql = "INSERT INTO books (book_isbn,book_title,book_author,book_image,book_descr,book_price,publisherid) VALUES (?,?,?,?,?,?,?)";
                $stmt= $conned->prepare($sql);
                $stmt->execute([$this->id,$this->title,$this->author,$this->image,$this->description,$this->price,$this->publisherid]);
                echo 'insert successfully !!';
            } catch (Throwable $th) {
                echo $th;
            }
            $conn->disConnect($conned);
        }
        public function getBook(){
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
        public function getAllBook(){
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
        public function selectAllLatestBook(){
            $conn  = new Database(null,null,null,null);
            $conned = $conn ->getConnect();
            $row = array();
            try {
                $stmt = $conned->query("SELECT book_isbn, book_image FROM books ORDER BY book_isbn DESC");
                $books = $stmt->fetchAll();
               
                
                return $books;
            } catch (Throwable $th) {
                echo ' fail !!';
            }
        }
        
    }
?>