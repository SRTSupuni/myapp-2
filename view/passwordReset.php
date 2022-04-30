<?php
include_once("navbar.php");


?>

<!-- Top content -->
<div class="container-fluid">

    <!-- Top Banner-->
    <div class="row">
        <div class="col-md-12 text-center p-5" style="background-image:url('../image/background/1-12.webp');">
            <p class="text-uppercase p-2 m-auto text-white font-weight-lighter" style=" font-family: montserrat,serif; font-size: 40px;">My Profile</p>
            <p class="text-uppercase pt-3 pb-0 m-auto text-white font-weight-lighter "><a class="text-decoration-none" style=" font-family: montserrat,serif; color:#db9200" href="home.php">Home</a> &rarr;
                <a class="text-decoration-none" style=" font-family: montserrat,serif; color:#db9200" href="login.php">My Profile</a> &rarr; Password reset
            </p>
        </div>
    </div>
    <!-- Banner end -->
</div>
<!-- Top Content End -->

<div class="container">

    <!-- Response Alert -->
    <div class="row mt-3">
        <div class="col-sm-8 mx-auto text-center">

        </div>
    </div>
    <!-- Response Alert End -->

    <div class="card mt-4 mb-3">
        <div class="card-body">
            <div class="row">
                <!--  reset password -->
                <div class="col-md-12 text-danger p-5">
                    <p class="pt-5 pb-3" style="font-size: 18px"> Lost your password ? Please enter your email address. You will receive a link to create a new password via email.</p>
                    <form class="pb-5" id="forgetPassword" enctype="multipart/form-data" method="POST" action="">
                        <label class="control-label">Email <span class="text-danger"> *</span></label>
                        <input type="email" class="form-control w-50" name="email" id="email" placeholder="Email" autocomplete="off" required><br>
                        <button type="submit" class="btn button text-white text-uppercase" id="changePW">Reset password</button>
                    </form>
                </div>
                <!--  reset password end -->
            </div>
        </div>
    </div>
</div>
<!-- content end -->
<script>
    document.title = "DIGITAL AGRICULTIRRE CENTER | Forgot Password";
</script>

<?php
include_once("footer.php");
?>