<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('../model/product_model.php'); 
?>  



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="m-0 font-weight-bold text-primary text-center">Quản lý sản phẩm</h2>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <form action="../Controller/product.php" method="POST" enctype="multipart/form-data">
        <?php 
            $id_product = $_POST["edit_id"];
           $product = new product_model();
           $value = $product->detail_p($id_product);
        ?>
            <div class="mb-3">
            <input type="hidden"  name="adjust_id"  class="form-control" value="<?php echo $value["id_product"]?>" id="id_product">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên sản phẩm</label>
            <input type="text" name="adjust_name" class="form-control" value="<?php echo $value["name_product"]?>" id="name_product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá sản phẩm</label>
            <input type="text" name="adjust_price" value="<?php echo $value["price"]?>" class="form-control" id="price" aria-describedby="Price">
            </div>
            <div class="mb-3">
            <input type="hidden"  name="exist_img"  class="form-control" value="<?php echo $value["img"]?>" id="img">
            </div>
            <div class="mb-3">
            <label>Ảnh minh hoạ sản phẩm</label> <br>
            <input type="file" name="img" accept="image/*" value="<?php echo $value["img"]?>" id="file">
            </div>
            <button type="submit" name="adjust_btn" class="btn btn-success">Sửa</button>
        </form>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<footer>
 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</footer>
