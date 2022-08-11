<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUCCESS</title>

</head>

<body>

    <script>
        swal("Thank You!", "See You Soon!", "success");
    </script>
    <h1 style="text-align:center;">YOUR PAYMENT HAS BEEN SUCCESSFULL.</h1>
    <a style="text-decoration:none;color: red; margin-left: 600px; border:1px solid blue; border-radius:5px; padding: 5px;background:skyblue;" class="btn btn-success" href="index.php" role="button">SHOP MORE!</a>

    <?php
    session_start();
    include 'connect.php';

    if (isset($_SESSION['USER_ID'])) {
        $uid = $_SESSION['USER_ID'];
        $ord = $_SESSION['ORDER_ID'];

        $stid = "SELECT * FROM CART WHERE USER_ID=$uid";
        $result = oci_parse($conn, $stid);
        oci_execute($result);

        while ($row = oci_fetch_assoc($result)) {
            $productid = $row['PRODUCT_ID'];
            $quantity = $row['ITEMS'];

            $try = "SELECT USER_ID FROM CART WHERE CART_ID=$productid";

            $tryres = oci_parse($conn, $try);
            oci_execute($tryres);
            $rowrow = oci_fetch_assoc($tryres);
            $cartuser = $rowrow['USER_ID'];



            $sql2 = oci_parse($conn, "INSERT INTO ORDER_ON_LINE(QUENTITY,PRODUCT_ID,USER_ID,ORDER_ID)VALUES($quantity,$productid,$uid,$ord)");
            // $result2 = oci_parse($conn, $sql2);
            $run = oci_execute($sql2);

            if ($run) {
                $sqldelete = "DELETE FROM CART WHERE USER_ID=$uid";
                $deleteres = oci_parse($conn, $sqldelete);
                oci_execute($deleteres);

                header('location:invoice.php');
            }
        }
    }


    ?>

</body>

</html>