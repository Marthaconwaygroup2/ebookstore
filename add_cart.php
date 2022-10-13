<?
include("common/config.php");
echo "hi".$_POST['prod_ids']."ji";
if($_POST['prod_ids']!='') {
echo "hi".$_POST['prod_ids']."ji";
//mysql_query("INSERT INTO `add_cart` (`cart_id`, `product_id`, `cookie_id`, `entry_date`) VALUES (NULL, ".$_REQUEST['prod_ids'].", '".$_COOKIE['chk_id']."', '".date("Y-m-d")."')");
$_REQUEST['prod_ids']='';
exit();
?>
<script>window.location="cart_info.php?status=insert"</script>
<?
}
?>