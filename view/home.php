<?php
include_once("navbar.php");
?>
<!-- image carousel-->
<div class="container-fluid">
    <?php
    $response = isset($_GET["response"]) ? $_GET["response"] : "";

    if ($response != "") {
    ?>
        <script>
            Swal.fire("Thank You !!!", "<?php echo $response; ?>", "success");
        </script>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-sm-12 p-0">
            <div id="carouselExampleIndicators" class="carousel slide d-none d-md-block" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="height: 100vh" role="listbox">
                    <!-- first slide -->
                    <div class="carousel-item  active">
                        <img src="../image/slider/banner.jpg" alt="First Slider" class="w-100">
                        <div class="carousel-caption d-md-block text-dark text-left p-0">
                            <h1 class="mb-md-5 animate__animated animate__bounceIn" style="font-size: 8vw;">
                                FRESH <strong>VEGITABLES</strong>
                            </h1>
                            <br>
                            <a class="button btn btn-md text-white text-uppercase animate__animated animate__bounceInLeft">Shop Here</a>
                        </div>
                    </div>
                    <!-- second slide -->
                    <div class="carousel-item">
                        <img src="../image/slider/fruit.jpg" alt="Second Slider" class="w-100">
                        <div class="carousel-caption d-md-block text-right p-0">
                            <h1 class="animate__animated animate__bounceIn" style="font-size: 8vw;">
                                FRESH <br><strong>FRUITS </strong>
                            </h1>
                            <a class=" button btn btn-lg border-0 text-white text-uppercase animate__animated animate__zoomInRight">Shop Now</a>
                        </div>
                    </div>
                    <!-- third slide -->
                    <div class="carousel-item">
                        <img src="../image/slider/fruitandvegitable.jpg" alt="Third Slider" class="w-100">
                        <div class="carousel-caption d-md-block text-center text-white">
                            <h1 data-animation="animated zoomInLeft" style="font-size: 8vw;">
                                <strong>SELL</strong> ANYTHING
                            </h1>
                            <a href="" class=" button btn btn-lg border-0 text-white text-uppercase" data-animation="animated lightSpeedIn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- controls -->
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- image carousel end -->

<!-- content -->
<div class="container-fluid">
    <!--    banner-->
    <div class="row">
        <div class="col-sm-12 text-center p-5" style="background-image:url('../image/background/1-12.webp');">
            <p class="text-uppercase p-2 m-auto text-white font-weight-lighter" style="font-size: 40px;">
                Click here to put your Product Advertisement
                <br>
                <a class="button btn btn-md text-white text-uppercase animate__animated animate__bounceInLeft">Click Here</a>
            </p>
        </div>
    </div>
    <!--    banner end -->
    <!--    collection-->
    <div class="row" id="collection">
        <div class="col-sm-6">
            <div class="card border">
                <div class="card-body" style="background-image: url('../image/background/vegetable1.png'); height:350px;  background-position:right;background-repeat: no-repeat;background-size: contain">
                    <h5 class="card-title text-uppercase pt-2 pl-2 font-weight-lighter" style="font-size: 40px;"><strong>Vegitables</strong></h5>
                    <p class="card-text text-uppercase pt-0 pl-2">select your Vegitables </p>
                    <a href="productFilter.php?collId=2" class=" button btn border-0 ml-2 text-white text-uppercase">Discover</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 ">
            <div class="card border">
                <div class="card-body" style="background-image: url('../image/background/fruit.png'); height: 350px;background-position: right;background-repeat: no-repeat;background-size: contain">
                    <h5 class="card-title text-uppercase pt-2 pl-2 font-weight-lighter" style="font-size: 40px;">
                        <strong>Fruits</strong>
                    </h5>
                    <p class="card-text text-uppercase pt-0 pl-2">select your favorite Fruits </p>
                    <a href="productFilter.php?collId=1" class=" button btn border-0 ml-2 text-white text-uppercase">Discover</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- new arrivals -->
<div class="container-fluid" id="newIn">
    <div class="row mt-5">
        <div class="col-12">
            <h1 class="text-uppercase  font-weight-bold text-dark text-center" style="font-size: 50px; font-family: montserrat,serif"> NEW ARRIVALS</h1>
            <br>
        </div>
    </div>
    <div class="row p-5 ml-5 mr-5">
        <?php
        include_once("../model/product_model.php");
        $product_obj = new Product($conn);

        $getMaleProducts = $product_obj->giveNewFruitProducts();
        while ($ProductArray = $getMaleProducts->fetch_assoc()) {

            $productId = $ProductArray["product_id"];
            $getImages = $product_obj->giveImages_ByProductId($productId);
            $imageArray = $getImages->fetch_assoc();

            include_once("../model/stock_model.php");
            $stock_obj = new Stock($conn);
            $getStock = $stock_obj->giveStockInfo_ByProductId($productId);
            $stockArray = $getStock->fetch_assoc();

        ?>

            <div class="col-sm-6 col-lg-3">
                <a href="viewItem.php?productId=<?php echo $productId; ?>" type="button" class="text-decoration-none text-dark w-100">
                    <div class="card text-center border-0 card_home ">
                        <img style="height: 280px;" class="card-img-top zoom img-fluid" src="../image/pro_img/<?php echo $imageArray["img_name"] ?>" alt="">
                        <div class="card-body ">
                            <span class="productName">
                                <?php echo $ProductArray["product_name"]; ?>
                                250g
                            </span>
                            <span class="productName">
                                <?php echo $stockArray["stock_sell_price of 250g"]; ?>
                            </span>
                        </div>
                    </div>
                </a>
            </div>

        <?php
        }
        ?>
    </div>

    <div class="row p-5 ml-5 mr-5">

        <?php
        include_once("../model/product_model.php");
        $product_obj = new Product($conn);

        $getFemaleProducts = $product_obj->giveNewVegitableProducts();
        while ($ProductArray = $getFemaleProducts->fetch_assoc()) {

            $productId = $ProductArray["product_id"];
            $getImages = $product_obj->giveImages_ByProductId($productId);
            $imageArray = $getImages->fetch_assoc();

            include_once("../model/stock_model.php");
            $stock_obj = new Stock($conn);
            $getStock = $stock_obj->giveStockInfo_ByProductId($productId);
            $stockArray = $getStock->fetch_assoc();
        ?>

            <div class="col-sm-6 col-lg-3">
                <a href="viewItem.php?productId=<?php echo $productId; ?>" type="button" class="text-decoration-none text-dark w-100">
                    <div class="card  text-center  border-0 card_home">
                        <img style="height: 280px;" class="card-img-top zoom img-fluid" src="../image/pro_img/<?php echo $imageArray["img_name"] ?>" alt="">
                        <div class="card-body">
                            <span class="productName">
                                <?php
                                echo $ProductArray["product_name"];
                                ?>
                                250g
                            </span>
                            <span class="productName">
                                <?php
                                echo $stockArray["stock_sell_price of 250g"];
                                ?>
                            </span>
                        </div>
                    </div>
                </a>
            </div>

        <?php
        }
        ?>

    </div>

</div>
<!-- new arrivals end -->
<!--content end -->

<script>
    document.title = "DIGITAL AGRICULTURE CENTER | Home";
</script>
<?php
include_once("footer.php");
?>