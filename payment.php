<?php
session_start();
include 'connect.php';

if (isset($_SESSION['ORDER_ID'])) {
    $order = $_SESSION['ORDER_ID'];
} else {
    header('location:my-cart1.php');
}

if (isset($_POST['payment'])) {

    $sub_total_price = $_POST['payment'];
    $uid = $_POST['user'];
    $totalquantity = $_POST['items'];
    $day = $_POST['day'];
    $hour = $_POST['hour'];
    $currentuserid = $_SESSION['USER_ID'];
    $delivDate = date('d-m-Y h:i:s', time());


    $stid = "INSERT INTO ORDERS(ORDER_DATE,ORDER_QTY,USER_ID,GRAND_TOTAL,STATUS)
    VALUES(TO_DATE('" . $delivDate . "','dd-mm-yy hh24:mi:ss'),$totalquantity,'$uid',$sub_total_price,'NOW')";
    $result = oci_parse($conn, $stid);
    oci_execute($result);

    $new = oci_parse($conn, " SELECT * FROM ORDERS WHERE STATUS='NOW' ");
    $n = oci_execute($new);

    if ($n) {
        $row = oci_fetch_row($new);
        $order_id = $row['0'];

        $up = oci_parse($conn, "UPDATE ORDERS SET STATUS='NULL' WHERE ORDER_ID='$order_id'");
        $ex = oci_execute($up);

        if ($ex) {
            $_SESSION['ORDER_ID'] = $order_id;
        }
    }

    if (isset($_SESSION['USER_ID']) == $currentuserid) {
        $query = "SELECT ORDER_ID FROM ORDERS ";
        $res = oci_parse($conn, $query);
        oci_execute($res);
        $row = oci_fetch_assoc($res);
        $order = $row['ORDER_ID'];


        $sql = "INSERT INTO COLLECTION_SLOT(COLLECTION_DAY,COLLECTION_TIME,ORDER_ID)VALUES('$day','$hour',$order)";
        $new = oci_parse($conn, $sql);
        oci_execute($new);
    }
}

//paypal link
$paypal = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
//Test PayPal API URL
$paypalemail = 'sb-439amd5822668@business.example.com';
?>

<form action="<?php echo $paypal; ?>" method="POST">
    <!-- Paypal business test account email id so that you can collect the payments. -->
    <input type="hidden" name="business" value="<?php echo $paypalemail; ?>">
    <!-- Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">
    <!-- Details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="Products">
    <input type="hidden" name="item_number" value="<?php echo $totalquantity; ?>">
    <input type="hidden" name="amount" value="<?php echo $sub_total_price; ?>">
    <input type="hidden" name="currency_code" value="GBP">
    <input type="hidden" name="day" value="<?php echo $day; ?>">
    <input type="hidden" name="hour" value="<?php echo $hour; ?>">
    <!-- URLs -->
    <input type='hidden' name='cancel_return' value='http://localhost/OneClick/cancel.php'>
    <input type='hidden' name='return' value='http://localhost/innovativegrocery/success.php'>
    <!-- payment button. -->
    <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
    <img alt="" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
</form>
</div>
</div>


</div>
</div>

</div>