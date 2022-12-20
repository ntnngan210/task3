<?php
  session_start();
  $count = 0;
  // connecto database
  $title = "Full Catalogs of Books";

  require_once "./template/header.php";
  // $database = new Database();
  // $conn =$database->getConnect();
  include "./controllers/product_books.php";

  require_once "./template/header.php";
?>
  <p class="lead text-center text-muted">Full Catalogs of Books</p>
  
      <div class="row">
        <?php foreach($row as $query_row){ ?>
          <div class="col-md-3">
            <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
              <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>">
            </a>
          </div>
        <?php
          
          } ?> 
      </div>
<?php
      

  require_once "./template/footer.php";
?>