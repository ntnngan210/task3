<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('../model/user_model.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm khách hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../Controller/user.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Tên khách hàng </label>
                <input type="text" name="FullName" class="form-control" placeholder="Nhập tên khách hàng">
            </div>
            <div class="form-group">
                <label>Địa chỉ mail</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ mail">
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" name="add_btn" class="btn btn-primary">Thêm </button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="m-0 font-weight-bold text-primary text-center">Quản lý khách hàng 
    </h2>
    <button type="button" name="btn_add" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             Thêm 
            </button>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Mã </th>
            <th> Tên khách hàng </th>
            <th> Địa chỉ email </th>
            <th>Mật khẩu</th>
            <th>Sửa </th>
            <th>Xoá </th>
          </tr>
        </thead>
        <tbody>
     <?php  
          $user = new user_model();
          $list = $user->getUser();
          foreach(
              $list as $i =>$value
          ):
     ?>

          <tr>
          <td> <?php echo $value["id_user"]?> </td>
          <td> <?php echo $value["FullName"]?> </td>
          <td> <?php echo $value["email"]?> </td>
          <td> <?php echo $value["password"]?> </td>
            <td>
                <form action="./adjustUser.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $value["id_user"]?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success">Chỉnh sửa</button>
                </form>
            </td>
            <td>
                <form action="../Controller/user.php" method="POST">
                  <input type="hidden" name="delete_id" value="<?php echo $value["id_user"]?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger">Xóa khách hàng</button>
                </form>
            </td>
          </tr>
        
          <?php 
          endforeach;
    ?>
        </tbody>
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
