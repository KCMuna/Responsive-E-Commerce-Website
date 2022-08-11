<?php

error_reporting(0);
?>
<header>
    <div class="top-bar animate-dropdown" style="background: pink">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <?php if (strlen($_SESSION['success'])) { ?>
                            <li><a href="my-account.php" style="color: black"><i class="icon fa fa-user" style="color: black"></i>Welcome
                                    -<?php echo htmlentities($_SESSION['FIRST_NAME']); ?></a></li>

                        <?php } ?>
                        <li><a href="my-account.php" style="color: black"><i class="icon fa fa-user" style="color: black"></i>My Account</a></li>
                        <li><a href="my-cart1.php" style="color: black"><i class="icon fa fa-shopping-cart" style="color: black"></i>My Cart</a></li>

                        <?php if (strlen($_SESSION['success']) == 0) {   ?>
                            <li><a href="customerlogin.php" style="color: black"><i class="icon fa fa-sign-in" style="color: black"></i>Login</a></li>
                        <?php } else { ?>
                            <li><a href="logout.php" style="color: red"><i class="icon fa fa-sign-out" style="color: red"></i>Logout</a></li>
                        <?php } ?>
                    </ul>

                </div>

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="custreg.php" style="color: blue;" class="dropdown-toggle"><b><span class="key">SIGN
                                        UP</b></a>

                        </li>
                        <li class="dropdown dropdown-small">
                            <a href="trader/traderreg.php" style="color: blue;" class="dropdown-toggle"><b><span class="key">Become A
                                        Trader</b></a>

                        </li>

                    </ul>
                </div>

            </div>
</header>