<div class="header-nav animate-dropdown" style="background: #0B83B3;">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer">
                        <ul class="nav navbar-nav">
                            <li class="active dropdown yamm-fw">
                                <a href="index.php" data-hover="dropdown" class="dropdown-toggle">Home</a>

                            </li>
                            <?php
                            $stid = oci_parse($conn, " SELECT TRADER_ID,TRADER_TYPE FROM TRADER WHERE STATUS='ENABLE'");
                            $result = oci_execute($stid);
                            if ($result != false)
                                while ($row = oci_fetch_row($stid)) {
                            ?>

                                <li class="dropdown yamm">
                                    <a href="tradertype.php?trid=<?php echo $row['0']; ?>"> <?php echo $row['1']; ?></a>

                                </li>
                            <?php } ?>
                            <li class="dropdown yamm">
                                <a href="about.php" data-hover="dropdown" class="dropdown-toggle">ABOUT US</a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>