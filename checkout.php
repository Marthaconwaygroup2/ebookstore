<?
include("common/config.php");
$result=mysql_query($sql="SELECT * FROM `add_cart` INNER JOIN products ON add_cart.product_id=products.product_id where cookie_id=".$_COOKIE['chk_id']);
$total=0;
if(mysql_num_rows($result)>0)
{
while($row = mysql_fetch_array($result))
{
	$total+=$row['product_price'];
}
			
$result = mysql_query("INSERT INTO `payment_details` ( `payment_id` , `user_name` , `payment_date` , `total_cost` , `subscription_type` , `transinfoarray` , `transactioncode` , `transaction_time` , `ref_no`, `expiry_date` ) VALUES ( NULL , '".$_COOKIE['chk_id']."', '".date("Y-m-d")."', '$total', 'Products', '', '', '', '' , '')");

$inid=mysql_insert_id();

$_SESSION['inid']=$inid;
header('Location:https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=alex.bylund@gmail.com&undefined_quantity=1&item_name=Products&amount='.$total.'&return=http://www.starkinformation.com/payment_success.php?inid='.$inid.'&sub_type=Products&cost='.$total.'&cancel_return=http://www.starkinformation.com/cart_info.php');
}
else
{
?>
<script>window.location="cart_info.php?status=empty";</script>
<?
}
?>