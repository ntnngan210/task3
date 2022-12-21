<?php
include('./includes/header.php');
include('../model/product_model.php');
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
            <h1 class="display-5 mb-3">Đăng Ký</h1>
            <h4 class="text-danger"><?php $error = isset($_SESSION["Error"])?$_SESSION["Error"]:null;
                echo $error;
            ?></h4>
        </div>
        <div class="row g-4">
            <form class="form-horizontal" method="post" action="login.php">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input  required type="email" name="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input required type="password" name="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>
                <div class="form-outline mb-4">
                    <input required type="text" name="FullName" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Full Name</label>
                </div>
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->

                    </div>


                </div>

                <!-- Submit button -->
                <input type="submit" value="Đăng Ký" name="register-submit"  class="btn mx-auto my-auto btn-primary btn-block mb-4">
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