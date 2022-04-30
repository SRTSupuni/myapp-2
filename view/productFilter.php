<?php
include_once("navbar.php");

$collId = isset($_GET["collId"]) ? $_GET["collId"] : "";

// include_once("../model/product_model.php");
// $product_obj = new Product($conn);

// $searchText = $product_obj->givefilterProducts($collId, $searchText);
?>

<!-- content -->
<div class="container-fluid">

    <input id="collId" type="text" value="<?php echo $collId; ?>">

    <!--  Top  Banner-->
    <div class="row">
        <div class="col-md-12 text-center p-5 pb-5" style="background-image:url('../image/background/1-12.webp');">
            <p class="text-uppercase p-2 m-auto text-white font-weight-lighter" style=" font-family: montserrat,serif; font-size: 40px;">Products</p>
            <p class="text-uppercase pt-3 pb-0 m-auto text-white font-weight-lighter "><a class="text-decoration-none" style=" font-family: montserrat,serif; color:#db9200" href="index.php">Home</a> &rarr; Collection</p>
        </div>
    </div>
    <!--  Top Banner End -->

    <div class="row mt-3">
        <!-- Filter Area    -->
        <div class="col-sm-12 col-md-3 text-muted">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-2 pl-3">
                        <div class="col-sm-4 col-md-12">
                            <form>
                                <input class="form-control searchText mr-sm-2" id="searchText" type="search" placeholder="Search your Product" aria-label="Search">
                                <br>
                                <button class="btn btn-outline-success my-2 my-sm-0 mt-2 float-right" type="submit">Search</button>
                                <div class="result">

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Filter Area End -->

        <!-- View Content -->
        <div class="col col-md-9 text-muted" style="border-left: outset;" id="content">

        </div>
        <!-- View Content End     -->
    </div>

</div>
<!-- content end -->

<script>
    document.title = "DIGITAL AGRICULTIRRE CENTER | Product Filters";
</script>
<script src="../js/productFilter.js"></script>
<?php
include_once("footer.php");
?>