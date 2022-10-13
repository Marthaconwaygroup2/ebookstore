<?
session_start();
include("common/config.php");
if($_REQUEST['inid']!='') { 
$transinfoarray=$_SESSION["trans_array"];
/*$transactioncode=$transinfoarray[0]['transactioncode'];
$transaction_time=$transinfoarray[0]['transaction_time'];
$ref_no=$transinfoarray[0]['ref_no'];*/

$transactioncode=$_REQUEST['tx'];
$transaction_time=$_REQUEST['st'];
$ref_no=$_REQUEST['cm'];

$abc=mktime(0,0,0,date("m"),date("d")+60,date("Y"));
$result = mysql_query("UPDATE `payment_details` SET `transinfoarray` = '".$transinfoarray."', `transactioncode` = '".$transactioncode."', `transaction_time` = '".$transaction_time."', `ref_no` = '".$ref_no."', `expiry_date` ='".date("Y-m-d", $abc)."' WHERE `payment_id` = ".$_REQUEST['inid']);

$results = mysql_fetch_array(mysql_query("SELECT user_name FROM payment_details where payment_id=".$_REQUEST['inid']));
	$_SESSION['user_name']=$results['user_name'];
		
$_REQUEST['inid']='';


?>
<script>window.location="download.php";</script>
<?
}
?>
