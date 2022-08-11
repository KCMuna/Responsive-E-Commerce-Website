<?php
include 'connect.php';
session_start();
//error_reporting(0);

$uid = $_SESSION['USER_ID'];

$ord = $_SESSION['ORDER_ID'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INVOICE</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="trader/css/style.css">
	<script src="js/bootstrap.min.css"></script>

</head>

<body>
	<a href="index.php"> <input type="submit" value="Back to HomePage" style="color: rgb(253, 253, 253); background: rgb(59, 57, 57);" class="btn btn-add-products"></a>
	<div class="row">
		<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
			<div class="card">
				<div class="card-header p-4">
					<img src="image/logo.png" alt="Logo" width="100" height="100" />
					<div class="float-right">
						<h3 class="mb-0">Invoice</h3>
						<p>CLECKHUDDERSFAX <br>01-234686</p>
					</div>
				</div>
				<p class="date">Date: 20/02/2020</p>
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-sm-6">
							<?php

							$que = oci_parse($conn, "SELECT * FROM ORDERS WHERE ORDER_ID='$ord'");
							$run = oci_execute($que);

							if ($run) {

								$row = oci_fetch_assoc($que);
							}
							//echo $new['COLLECTION_DAY'];


							?>


						</div>
						<div class="col-sm-3">
							<div>INVOIVE TO:
								<?php echo $_SESSION['FIRST_NAME']; ?> </div>
							<div>ORDER DATE:
								<?php echo $row['ORDER_DATE']; ?>
							</div>
						</div>
						<div class="col-sm-3">

							<?php

							$query = oci_parse($conn, "SELECT * FROM COLLECTION_SLOT WHERE ORDER_ID='$ord'");
							$fetch = oci_execute($query);
							if ($fetch) {

								$new = oci_fetch_assoc($query);
								$slot = ['COLLECTION_ID'];
							}
							?>

							<div>COLLECTION DAY:
								<?php echo $new['COLLECTION_DAY']; ?>

							</div>
							<div>PAYMENT METHOD:
								PayPal
							</div>

						</div>
					</div>
					<div class="table-responsive-sm">


						<table class="table table-striped">
							<thead>
								<tr>
									<th>Product</th>

									<th class="right">Quantity</th>
									<th class="center">TOTAL</th>

								</tr>
							</thead>
							<tbody>

								<?php
								$stid = oci_parse($conn, "SELECT * FROM ORDER_ON_LINE WHERE ORDER_ID='$ord'");
								$num = oci_execute($stid);

								if ($num) {


									while ($data = oci_fetch_assoc($stid)) {

										$pd = $data['PRODUCT_ID'];

										$sql = oci_parse($conn, "SELECT * FROM PRODUCT1 WHERE PRODUCT_ID='$pd'");
										$roww = oci_execute($sql);
										if ($sql) {
											$final = oci_fetch_assoc($sql);





								?>

											<tr>
												<td class="left"><?php echo $final['PRODUCT_NAME']; ?></td>
												<td class="right"><?php echo $data['QUENTITY']; ?></td>

												<td class="right"><?php echo $row['GRAND_TOTAL']; ?></td>
											</tr>

								<?php }
									}
								} ?>

							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-4 col-sm-5">
						</div>
						<div class="col-lg-4 col-sm-5 ml-auto">
							<table class="table table-clear">
								<tbody>

								</tbody>
							</table>
						</div>
						<div class="note" style="margin-left: 15px; margin-top: 100px;color: #969697;">
							<strong>Note:</strong><br>
							Include only 20 products per slot.<br>
							Collection slot are approved only after 24 hour of order placement.<br>
							If you have any question about this invoice. Please Contact in above given number.<br>
						</div>
					</div>
				</div>

				<footer style="background-color: rgb(206, 203, 203); color: rgb(8, 8, 8); text-align: center; margin-top: 30px;">
					<b>&copy; 2021 Innovative Grocery </b> All rights reserved.
				</footer>
			</div>
		</div>

	</div>
	</div>
</body>

</html>