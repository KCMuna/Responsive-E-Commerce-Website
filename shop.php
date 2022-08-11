<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>SHOP LIST</div>
        <nav class="yamm megamenu-horizontal" role="navigation">

            <ul class="nav">
                <li class="dropdown menu-item" style="background: #D9F2F9">
                    <?php
                    $stid = oci_parse($conn, " SELECT SHOP_ID,SHOP_NAME FROM SHOP WHERE STATUS='ENABLE' ");
                    $result = oci_execute($stid);
                    if ($result != false)
                        while ($row = oci_fetch_row($stid)) { ?>
                        <a href="shop-product.php?scid=<?php echo $row['0']; ?>" class="dropdown-toggle"><i class="icon fa fa-home fa-fw"></i>
                            <?php echo $row['1']; ?></a>
                    <?php } ?>

                </li>
            </ul>
        </nav>
    </div>
</div>