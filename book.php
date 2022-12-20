<?php
  session_start();
  $book_isbn = $_GET['bookisbn'];
  // connecto database
  require_once "./controllers/product_detail.php";

  


  $title = $row['book_title'];
  require "./template/header.php";
?>
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="books.php">Books</a> > <?php echo $row['book_title']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['book_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Book Description</h4>
          <p><?php echo $row['book_descr']; ?></p>
          <h4>Book Details</h4>
          <table class="table">


          	
            <tr>
              <td>ISBN</td>
              <td><?php echo $row["book_isbn"]; ?></td>
            </tr>
            <tr>
              <td>Title</td>
              <td><?php echo $row["book_title"]; ?></td>
            </tr>
            <tr>
              <td>Author</td>
              <td><?php echo $row["book_author"]; ?></td>
            </tr>
            <tr>
              <td>Price</td>
              <td><?php echo $row["book_price"]; ?></td>
            </tr>
           
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
  require "./template/footer.php";
?>