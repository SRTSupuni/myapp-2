<?php

include_once("navbar.php");


?>
<script>
    window.location = "login.php?response=<?php echo $response; ?>&res_status=<?php echo $status; ?>";
</script>


<!-- content -->
<div class="container-fluid">
    <!--    banner-->
    <div class="row">
        <div class="col-md-12 text-center p-5" style="background-image:url('../image/background/1-12.webp');">
            <p class="text-uppercase p-2 m-auto text-white font-weight-lighter" style=" font-family: montserrat,serif; font-size: 40px;">My Profile</p>
            <p class="text-uppercase pt-3 pb-0 m-auto text-white font-weight-lighter ">
                <a class="text-decoration-none" style=" font-family: montserrat,serif; color:#db9200" href="home.php">Home</a> &rarr;
                <a class="text-decoration-none" style=" font-family: montserrat,serif; color:#db9200" href="dashboard.php">My Profile</a> &rarr; Change Password
            </p>
        </div>
    </div>
    <!--    banner end -->
</div>
<div class="container">

    <!-- Response Alert -->
    <div class="row mt-3">
        <div class="col-sm-8 mx-auto text-center">

        </div>
    </div>
    <!-- Response Alert End -->

    <div class="card mt-3 mb-3">
        <div class="card-body">

            <!-- reset password -->
            <form class="pb-5 mt-3" id="changePw" enctype="multipart/form-data" method="POST" action="">

                <input type="hidden" name="customerId" id="customerId" value="<?php echo $cusId; ?>">


                <div class="row mt-2">
                    <div class="col-sm-6 text-muted text-right">
                        <label for="" class="control-label">New Password <i class="text-danger">*</i></label>
                    </div>
                    <div class="col-sm-6 text-muted">
                        <div class="input-group">
                            <input type="password" name="Npw" id="Npw" class="form-control" required>
                            <div style="cursor: pointer;" class="input-group-append" id="pw_append">
                                <span class="input-group-text">
                                    <i id="pw_icon" class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="progress" style="width: 90%;">
                            <div id="progressBar" class="progress-bar" role="progressbar"></div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-6 text-muted text-right"><label for="" class="control-label">Retype New Password <i class="text-danger">*</i></label></div>
                    <div class="col-sm-6 text-muted">
                        <div class="input-group">
                            <input type="password" name="cpw" id="cpw" class="form-control" value="" required>
                            <div style="cursor: pointer;" class="input-group-append" id="cpw_append">
                                <span class="input-group-text">
                                    <i id="cpw_icon" class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6 ml-auto text-muted"><button type="submit" class="btn btn-block button text-white text-uppercase float-right">Reset password</button></div>
                </div>

            </form>
            <!-- reset password end -->
        </div>
    </div>

</div>
<!-- content end -->
<script>
    document.title = "DIGITAL AGRICULTIRRE CENTER | Reset Password";
</script>

<script src="../js/changePassword.js"></script>

<?php
include_once("footer.php");
?>