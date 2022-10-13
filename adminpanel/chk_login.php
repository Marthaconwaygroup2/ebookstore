<?
include("common/config.php");
if($_REQUEST['sbmt_login']=='Login') {
$res=mysql_query("select * from admin where username='".$_REQUEST['txt_admin_name']."' and password='".$_REQUEST['txt_admin_password']."'");
$cnt=mysql_num_rows($res);
if($cnt>0) {
while($row=mysql_fetch_array($res)) { 
$_SESSION['admin_user_id']=$row['user_id'];
?>
<script>window.location="home.php?status=success";</script>
<?
}
}
else
{
?>
<script>window.location="index.php?status=wrong";</script>
<?
}
}
?>