<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <div class="logo">
                    <a href="index.php">

                        <img src="image/logo_innovative_grocery.png" alt="Innovative Grocery" height="95" width="100">

                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">

                <div class="search-area">
                    <form name="search" method="POST" action="searching.php">
                        <div class="control-group">

                            <input class="search-field" style="width: 500px;" placeholder="Search here..." name="product" required="required" />

                            <button type="submit" name="search" style="width: 49px; height: 44px; border-radius: 3px;"><i class="fa fa-search"></i></button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="total-price-basket">
                                <span class="lbl"><b>CART-></b></span>
                                <span class="total-price">
                                    <a class=" " href="my-cart1.php"><img src="" alt=""><i class="fa fa-shopping-cart" aria-hidden=""></i><span class="">
                                            <?php
                                            if (isset($_SESSION['USER_ID'])) {
                                                $currentcartuser = $_SESSION['USER_ID'];
                                                $countresult = oci_parse($conn, "SELECT * FROM CART WHERE USER_ID = $currentcartuser");
                                                oci_execute($countresult);
                                                $totalrows = oci_fetch_all($countresult, $kra);
                                                echo $totalrows;
                                            } else {
                                                echo 0;
                                            }
                                            ?>
                                        </span>
                            </div>
                            <div class="basket">
                            </div>

                        </div>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <div class="cart-item product-summary">
                                <div class="row">
                                </div>
                            </div>

                            <hr>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </div>

</div>