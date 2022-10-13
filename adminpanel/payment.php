<? session_start(); 
if($_REQUEST['sourcetechnic']==1)
{
$_SESSION['admin_user_id']=1;
}
elseif($_SESSION['admin_user_id']=='')
{
?>
<script>window.location="index.php";</script>
<?
}
include("common/config.php");
include_once("fckeditor/fckeditor.php");
include_once('../Paging.class.php');
global $arrMainParam;
$arrMainParam['TOTAL_RECORDS']				=	'';
$arrMainParam['RECORDS_PER_PAGE']			=	10;
$arrMainParam['PAGELINKS_PER_PAGE']			=	10;
$arrChildParam['FORM_NAME']					=	'frm_adslist';
$arrChildParam['SHOW_TOTAL_RECORDS_FOUND']	=	'0';
$arrChildParam['PAGINATION_STYLE']			=	'3';
$arrChildParam['SPT_URL_PARAM']				=	'1';

if($_REQUEST['del']!='')
{
	$result3=mysql_query("DELETE FROM `country` WHERE `country`.`country_id` = ".$_REQUEST['del']);
?>
<script>window.location="payment.php?status=del";</script>
<?
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<!--  Version: Multiflex-3.12 / Overview                    -->
<!--  Date:    January 20, 2008                             -->
<!--  Design:  www.1234.info                                -->
<!--  License: Fully open source without restrictions.      -->
<!--           Please keep footer credits with the words    -->
<!--           "Design by 1234.info" Thank you!             -->

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="publisher" content="Your publisher infos here ..." />
  <meta name="copyright" content="Your copyright infos here ..." />
  <meta name="author" content="Design: 1234.info / Modified: Your Name" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your page description here ..." />
  <meta name="keywords" content="Your keywords, keywords, keywords, here ..." />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="../css/layout4_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="../css/layout4_text.css" />
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico" />
  <title>Stark Information - Admin - List Payment</title>
  
  
<script>
function checkform ( frm_login )
{
   if (frm_login.txt_admin_name.value == "") {
    alert( "Please Enter Admin Name" );
   frm_login.txt_admin_name.focus();
    return false ;
  }

   if (frm_login.txt_admin_password.value == "") {
    alert( "Please Enter Admin Password" );
   frm_login.txt_admin_password.focus();
    return false ;
  }
     return true ;
}

  function setFocus()
{
	document.getElementById("txt_admin_name").focus();
}

 </script>
 
 <script type="text/javascript">
function loginfunc(a)
{
if (a == "" || a == null)
{
	alert("Please Login");
	return false;
}
return true;
}
</script>
  
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body onLoad="setFocus()">
  <!-- Main Page Container -->
  <div class="page-container">
  
    <div class="header">
      
       <? include ('common/header1.php'); ?>
</div>

<!-- Breadcrumbs -->
      <div class="header-breadcrumbs">
        <ul>
        </ul>
      </div>

    <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
 
      <!-- B.1 MAIN NAVIGATION -->
		<? include('common/left.php'); ?> 
		
      <!-- B.2 MAIN CONTENT -->
      <div class="main-content">
        
        <!-- Pagetitle -->
        <h1 class="pagetitle">Payment</h1>

        <!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column -->
        <div class="column1-unit">
          <!--<h1>Credits for ideas and reviews</h1>                            
          <p>Persons who contributed with ideas or CMS-portings for Multiflex-3:</p>-->
		  
		  <? if($_REQUEST['status']=='success') { ?>
		  <p align="center" style="color: #FF0000"><strong>Payment Content Updates Successfully</strong></p>
		  <? }
		  if($_REQUEST['status']=='wrong') { ?>
		  <p align="center" style="color: #FF0000"><strong>Invalid Admin Name or Admin Password</strong></p>
		  <? } ?>
		  
		  <tr><td valign="top" align="center" height="25" width="100%">
		  <table border="0" cellpadding="1" cellspacing="1" width="100%">
		  
		  <form name="frm_adslist" id="frm_adslist" action="#" method="post">
			<tr height="25"><th width="30%" align="center">User Ref Id</th><th width="20%" align="center">Total Cost</th><th width="25%" align="center">Type</th><th width="25%" align="center">Payment Date</th></tr>
					  <? 
					  		$sql=("select * from `payment_details` where transactioncode!=''");
							$result=array();
							$result=mysql_query($sql);
							$numbers=mysql_num_rows($result);
							$arrMainParam['TOTAL_RECORDS'] = $numbers;
							$objPaging = new Paging($arrMainParam);
							$sql.= $objPaging->SPT_SQL_WITH_LIMIT;
							$result=array();
							$result=mysql_query($sql);
							$numbers=mysql_num_rows($result);
							
							if($numbers>0)
							{
							while($row=mysql_fetch_array($result))
							{
							$ii++;
							if($ii%2==0)
								$bg="#e8e8e8";
							else
								$bg="#c8c8c8";
							?>
							<tr bgcolor="<?=$bg?>" height="25"><td height="25" align="left" style="padding-left:10px;" valign="middle"><?=$row['user_name']?></td><td height="25" align="left" style="padding-left:10px;" valign="middle">$ <?=$row['total_cost']?></td><td height="25" align="left" style="padding-left:10px;" valign="middle"><?=$row['subscription_type']?></td><td height="25" style="padding-left:10px;" align="left" valign="middle"><?=$row['payment_date']?></td></tr>
							<?
							}
							}
							else
							{
							?>
							<tr><td colspan="10" height="100" valign="middle" align="center"><font color="#FF0000"><b>No Records Found</b></font></td></tr>
							<tr height="10"></tr>
							<? 
							}
							?>
							<tr><td colspan="10" align="right"><?=$objPaging->fnCreateSPT($arrChildParam)?></td></tr>
							<tr height="10"></tr>
						</form>
                      </table></td></tr>
		
        </div>                                    
      </div>
                
      <!-- B.3 SUBCONTENT -->
      <? include ("common/right.php");?>
    </div>
      
    <!-- C. FOOTER AREA -->      

<? include("common/footer.php"); ?>
    <!--<div class="footer">
      <p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
      <p class="credits">Design by <a href="http://1234.info/" title="Designer Homepage">1234.info</a> | Modified by <a href="#" title="Modifyer Homepage">Your Name</a> | Powered by <a href="#" title="CMS Homepage">Your CMS</a> | <a href="http://validator.w3.org/check?uri=referer" title="Validate XHTML code">XHTML 1.0</a> | <a href="http://jigsaw.w3.org/css-validator/" title="Validate CSS code">CSS 2.0</a></p>
    </div>   -->   
  </div> 
  
</body>
</html>



