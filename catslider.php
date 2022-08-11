<div class="side-menu animate-dropdown outer-bottom-xs" >
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item" style="background: #D9F2F9">
              <?php 
              $stid = oci_parse($conn, " SELECT CATEGORY_ID,CATEGORY_NAME FROM CATEGORY ");
	         $result = oci_execute($stid);
               if ($result !=false)
	        while( $row= oci_fetch_row($stid))
            {       
    ?>
                <a href="category.php?cid=<?php echo $row['0'];?>"><i class="icon fa fa-list-alt"></i>
                <?php echo $row['1'];?></a>
                <?php }?>
                        
</li>
</ul>
    </nav>
</div>