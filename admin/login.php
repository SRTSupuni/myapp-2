<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/icon" href="../image/logo/logo2.png">

    <title>DIGITAL AGRICULTIRRE CENTER</title>

    <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/DataTables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../resources/fontawesome/css/all.css">
    <link rel="stylesheet" href="../resources/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="../resources/animate.css/animate.min.css">
    <link rel="stylesheet" href="../css/custom.css">

    <script src="../resources/jquery/jquery-3.6.0.min.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../resources/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="../resources/fancybox/jquery.fancybox.js"></script>
    <script src="../resources/sweetAlerts2/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    <!-- content -->
    <div class="container-fluid">

        <!-- /////////////////// Top Banner ///////////////////// -->
        <div class="row">
            <div class="col-md-12 text-center p-5" style="background-image:url('../image/background/1-12.webp');">
                <p class="text-uppercase p-2 m-auto text-white font-weight-lighter" style=" font-family: montserrat,serif; font-size: 4vw;">Admin Login</p>
                <p class="text-uppercase pt-3 pb-0 m-auto text-white font-weight-lighter ">
                    Admin
                </p>
            </div>
        </div>
        <!-- ///////////////////// Banner End /////////////////////// -->



        <!-- //////////////// Response Alert //////////////////// -->
        <div class="row mt-3">
            <div class="col-sm-8 mx-auto text-center">

            </div>
        </div>
        <!-- //////////////// Response Alert End //////////////////// -->


        <!-- login -->
        <div class="container p-5 mr-5">
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <div class="row">
                        <!--  reset password -->
                        <div class="col-sm-12 p-5">
                            <p class="font-weight-lighter text-uppercase" style="font-family: montserrat,serif; font-size: xx-large">LOGIN</p>
                            <form id="newCustomer" enctype=" multipart/form-data" method="POST" action="">
                                <label class="control-label text-center">Admin Name <span class="text-danger"> *</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="name" value="" required>
                                <br>
                                <label class="control-label">Password <span class="text-danger"> *</span></label>
                                <div class="input-group">
                                    <input type="password" id="pw" class="form-control" name="pw" placeholder="Password" required>
                                    <div style="cursor: pointer;" class="input-group-append" id="pw_append">
                                        <span class="input-group-text">
                                            <i id="pw_icon" class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn button text-white text-uppercase mt-3">Login</button>
                            </form>
                        </div>
                        <!--  reset password end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login end -->
        <!-- content end -->

    </div>
</body>

</html>