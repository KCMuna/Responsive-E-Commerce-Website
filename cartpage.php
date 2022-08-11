<?php
session_start();
include 'connect.php';


if(isset($_POST['submit'])){
	if(!empty($_SESSION['cart'])){
	foreach($_POST['quantity'] as $key => $val){
		if($val==0){
			unset($_SESSION['cart'][$key]);
		}else{
			$_SESSION['cart'][$key]['quantity']=$val;

		}
	}
		echo "<script>alert('Your Cart hasbeen Updated');</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Cart</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    

    <!---- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> -->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Icon -->
		<link rel="shortcut icon" href="image/logo_innovative_grocery.png">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<!DOCTYPE html>
<html>
<head>
	<title>Innovative</title>
</head>
<body style="background: #D6DBDF">

	<header>
		<div class="top-bar animate-dropdown" style="background: pink">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
				<?php if(strlen($_SESSION['success']))
				{ ?>

				<li><a href="#" style="color: black"><i class="icon fa fa-user" style="color: black"></i>Welcome- <?php echo htmlentities($_SESSION ['email']);?></a></li>
				
				<?php } ?>
					<li><a href="#" style="color: black"><i class="icon fa fa-user" style="color: black"></i>My Account</a></li>
					<li><a href="#" style="color: black"><i class="icon fa fa-heart" style="color: black"></i>Wishlist</a></li>
					<li><a href="#" style="color: black"><i class="icon fa fa-shopping-cart" style="color: black"></i>My Cart</a></li>
					<?php if(strlen($_SESSION['success'])==0)
					{   ?>				
    
<li><a href="customerlogin.php" style="color: black"><i class="icon fa fa-sign-in" style="color: black"></i>Login</a></li>
<?php }	
else{ ?>
	<li><a href="logout.php" style="color: red"><i class="icon fa fa-sign-out" style="color: red"></i>Logout</a></li>
<?php } ?>				
				</ul>

			</div>

<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
						<a href="#" style="color: blue;" class="dropdown-toggle" ><b><span class="key">SIGN UP</b></a>
						
					</li>
				
				</ul>
			</div>

</div>
	</header>


	
	<?php include('main-header.php');?>


<div class="header-nav animate-dropdown" style="background: blue;">
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
            <div class="nav-bg-class" >
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer" >
		<ul class="nav navbar-nav">
			<li class="active dropdown yamm-fw">
				<a href="#" data-hover="dropdown" class="dropdown-toggle">HOME</a>

			</li>


			<li class="dropdown yamm">
				<a href="#" data-hover="dropdown" class="dropdown-toggle">BUTCHER</a>
								
			</li>

			<li class="dropdown yamm">
				<a href="#" data-hover="dropdown" class="dropdown-toggle">GREENGROCER</a>	
			</li>

			<li class="dropdown yamm">
				<a href="#" data-hover="dropdown" class="dropdown-toggle">BAKERY</a>		
			</li>

			<li class="dropdown yamm">
				<a href="#" data-hover="dropdown" class="dropdown-toggle">DELICATESSEN</a>				
			</li>

			<li class="dropdown yamm">
				<a href="#" data-hover="dropdown" class="dropdown-toggle">FISHMONGER</a>			
			</li>
			<li class="dropdown yamm">
				<a href="#" data-hover="dropdown" class="dropdown-toggle">ABOUT US</a>			
			</li>
				
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>				
	</div>
</div>


            </div>
        </div>
    </div>
</div>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="container">
    <div class="shopping-cart" style="margin-top: 10vh">
      <div class="column-labels">
        <label class="product-image">Image</label>
        <label class="product-details">Product</label>
        <label class="product-price">Price</label>
        <label class="product-quantity">Quantity</label>
        <label class="product-removal">Remove</label>
        <label class="product-line-price">Total</label>
      </div>
      <?php
      
   if(isset($_SESSION['USER_ID'])){
      echo "Your Products";
      $cart_user_id=$_SESSION['USER_ID'];
      

      $cartshowquery="SELECT * FROM CART WHERE USER_ID=$cart_user_id";
      $cartresult=oci_parse($conn,$cartshowquery);
      oci_execute($cartresult);

      $total_price = 0;
      
       
     

    
    while($item5 = oci_fetch_assoc($cartresult))  {
      $productid=$item5['PRODUCT_ID'];
      $product_quantity=$item5['ITEMS'];
      
      $select_query = "SELECT * FROM PRODUCT1 WHERE PRODUCT_ID='$productid'";
      $cart_showing = oci_parse($conn,$select_query);
      oci_execute($cart_showing);

      if (($row = oci_fetch_assoc($cart_showing)) == true) {
        $productid = $row['PRODUCT_ID'];
        $productname = $row['PRODUCT_NAME'];
        $variable = $row['PRICE'];
        $productimage = $row['PRODUCT_IMAGE'];
        $productdesc = $row['DESCRIPTION'];

        

      


       
        if (isset($variable)) {

          $de = $variable * $product_quantity;
      } else {

        $de = $variable * $product_quantity;
    }

      $total_price += $de;


     




     echo   "<div class='product'>
      <div class='product-image'>
        <img src='$productimage' />
      </div>
      <div class='product-details'>
        <div class='product-title'>$productname</div>
        <p class='product-description'>
          $productdesc
        </p>
      </div>
      <div class='product-price'> $variable</div>
      <div class='product-quantity'>
        $product_quantity
      </div>
      <div class='product-removal'>
      <a href='cart.php?productidremove=$productid'  <button class='remove-product'>Remove</button></a>
      </div>
     
    </div>";

      }

    }

   }
?>


      

     

      <?php
   echo "<script>document.writeln(total);</script>";
?>

      <div class="totals">
        <div class="totals-item">
          <label>Subtotal</label>
          <div class="totals-value" id="cart-subtotal"><?php echo $total_price ?></div>
         
        </div>
        
        <div class="totals-item totals-item-total">
          <label>Grand Total</label>
          <div class="totals-value" id="cart-total"><?php echo $total_price ?></div>
        </div>
      </div>
    <form action="checkout.php" method="POST">
    <input type="hidden" name="totalamount" value="<?php echo $totalpriceamount; ?>">
    <input type="hidden" name="userid" value="<?php echo $_SESSION['USER_ID'] ?>">


      <button type="submit" name="cartcheckout"  onclick=showMessage(); class="checkout">Checkout</button>
      </form>
    </div>
    </div>




	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->
</body>
</html>