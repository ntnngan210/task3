<?php
include('./includes/header.php');
include('../model/product_model.php');
?>
<?php
$itemCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
$productIdDelete = isset($_GET['delete']) ? $_GET['delete'] : null;
$update = isset($_POST['update']) ? $_POST['update'] : null;
if ($update) {
    $itemCart[$_POST['productId']]['quantity'] = $_POST['quantity'];
} else if ($productIdDelete) {
    foreach ($itemCart as $key => $value) {
        if ($value['productId'] == $productIdDelete) {
            unset($itemCart[$value['productId']]);
        }
    }
} else {
    if ($itemCart) {
        foreach ($itemCart as $key => $value) {
            if ($value['productId'] == $_POST['productId']) {
                $itemCart[$value['productId']]['quantity'] = $itemCart[$value['productId']]['quantity'] + $_POST['quantity'];
            } else {
                $itemCart[$_POST['productId']] = array(
                    'productId' => $_POST['productId'],
                    'quantity' => $_POST['quantity'],
                    'productName' => $_POST['productName'],
                    'productImage' => $_POST['productImage'],
                    'productPrice' => $_POST['productPrice']
                );
            }
        }
    } else {
        $itemCart[$_POST['productId']] = array(
            'productId' => $_POST['productId'],
            'quantity' => $_POST['quantity'],
            'productName' => $_POST['productName'],
            'productImage' => $_POST['productImage'],
            'productPrice' => $_POST['productPrice']
        );
    }
}
$_SESSION['cart'] = $itemCart;

?>
<body>



<!-- Navbar Start -->
<?php
include('./includes/navbar.php')
?>
<!-- Navbar End -->




<!-- Blog Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Giỏ hàng</h1>
        </div>
        <div class="row g-4">
            <table class="table">
                <tbody>
                <tr>
                    <td width="39" height="63">STT</td>
                    <td width="183">Tên Sản Phẩm</td>
                    <td width="132">Ảnh Sản Phẩm</td>
                    <td width="122">Đơn giá</td>
                    <td width="75">Số Lượng</td>
                    <td width="104">Thành Tiền</td>
                    <td width="41">Xóa</td>
                </tr>

                <?php $index = 1;
                $total = 0;
                foreach ($itemCart as $key => $value) {

                    $price = (int)$value['quantity'] * (int)$value['productPrice'];
                    ?>
                    <tr>
                        <td><?php echo $index; ?>&nbsp;</td>
                        <td><?php echo $value['productName']; ?>&nbsp;</td>
                        <td><img src="../images/<?php echo $value['productImage']; ?>" >&nbsp;</td>
                        <td><?php echo $value['productPrice']; ?>&nbsp;</td>
                        <td>
                            <form id="form1" action="cart.php" method="POST">
                                <input type="number" name="quantity" value="<?php echo $value['quantity']; ?>" &nbsp;>
                                <input type="hidden" name="productId" value="<?php echo $value["productId"]; ?>">
                                <input type="hidden" name="update" value="<?php echo $value["productId"]; ?>">
                                <input type="submit" value="Cập nhật"/>
                            </form>
                        </td>
                        <td><?php echo number_format($price); ?>&nbsp;</td>
                        <td><a href="cart.php?delete=<?php echo $value['productId']; ?>">X</a></td>

                    </tr>
                    <?php $index++;
                    $total += $price;
                } ?>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3" style="color: red; font-size: 24px;">Tổng Tiền : <?php echo number_format($total) ?> VNĐ</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

                </tbody>

            </table>
                </div>

                <!-- Submit button -->
                <!-- Register buttons -->

            </form>
        </div>
    </div>
</div>
<!-- Blog End -->


<!-- Footer Start -->
<?php
include('./includes/footer.php')
?>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>