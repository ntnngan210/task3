<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('../model/user_model.php'); 
?>  



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="m-0 font-weight-bold text-primary text-center">Quản lý khách hàng</h2>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <form action="../Controller/user.php" method="POST">
        <?php 
            $id_user = $_POST["edit_id"];
           $user = new user_model();
           $value = $user->detail_u($id_user);
        ?>
            <div class="mb-3">
            <input type="hidden"  name="adjust_id"  class="form-control" value="<?php echo $value["id_user"]?>" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên</label>
            <input type="text" name="adjust_name" class="form-control" value="<?php echo $value["FullName"]?>" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Địa chỉ email</label>
            <input type="email" name="adjust_email" value="<?php echo $value["email"]?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
            <input type="text" name="adjust_password" value="<?php echo $value["password"]?>" class="form-control" id="exampleInputPassword1">
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
