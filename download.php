<?
session_start();
include("common/config.php");
//echo "hi".$_SESSION['user_name']."hi";

if($_SESSION['user_name']=='')
{
header("Location:index.php?sess=failed");
}

/*if($_COOKIE['prod_id']!='') {
$_COOKIE['prod_id']='';
mysql_query("INSERT INTO `add_cart` (`cart_id`, `product_id`, `cookie_id`, `entry_date`) VALUES (NULL, ".$_COOKIE['prod_id'].", ".$_COOKIE['chk_id'].", '".date("Y-m-d")."')");
?>
<script>window.location="cart_info.php?status=insert"</script>
<?
}*/


if($_REQUEST['pid']!='') { 
mysql_query("DELETE FROM `add_cart` WHERE `add_cart`.`cart_id` = ".$_REQUEST['pid']);
?>
<script>window.location="cart_info.php?status=del"</script>
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
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout4_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout4_text.css" />
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico" />
  <title>Stark Information - Download EBook</title>
  
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=700,left = 126,top = 82');");
}
</script>
  
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>
  <!-- Main Page Container -->
  <div class="page-container">
  
    <div class="header">
      
       <? include ('common/header1.php'); ?>
</div>

<!-- Breadcrumbs -->
      <div class="header-breadcrumbs">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li>Download EBook</li>
        </ul>

        <!-- Search form -->                  
        <div class="searchform">
          <form action="search.php" method="get">
            <fieldset>
              <input name="field" class="field"  value=" Search..." />
              <input type="submit" name="button" class="button" value="GO!" />
            </fieldset>
          </form>
        </div>
      </div>

    <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
 
      <!-- B.1 MAIN NAVIGATION -->
		<? include('common/left.php'); ?> 
		
      <!-- B.2 MAIN CONTENT -->
      <div class="main-content">
        
        <!-- Pagetitle -->
        <h1 class="pagetitle">Download EBook</h1>

        <!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column -->
        <div class="column1-unit">
          <!--<h1>Credits for ideas and reviews</h1>                            
          <p>Persons who contributed with ideas or CMS-portings for Multiflex-3:</p>-->
          <? if($_REQUEST['status']=='del') { ?>
			<p align="center" style="color:#FF0000;"><strong>Product Removed Successfully</strong></p>
			<? } 
			if($_REQUEST['status']=='insert') { ?>
			<p align="center" style="color:#FF0000;"><strong>Product Removed Successfully</strong></p>
			<? } ?>
		  <form action="#" name="frm_events" id="frm_events" onSubmit="return checkform(this);" method="post">
			<table border="0" cellpadding="1" cellspacing="1" style="padding:2px; vertical-align:top;" width="100%" align="center">
			
			<? 
			$result=mysql_query($sql="SELECT * FROM `add_cart` INNER JOIN products ON add_cart.product_id=products.product_id where cookie_id=".$_SESSION['user_name']);
			$total=0;
			$nn=0;
			while($row = mysql_fetch_array($result))
			{
				$total+=$row['product_price'];
				$nn++;
			?>
			<!--<tr><td>Book <?=$nn?></td><td><a href="javascript:popUp('pdf/<?=$row['product_url']?>')" class="download"><?=$row['product_name']?></a></td></tr>-->
			<tr><td>Book <?=$nn?></td><td><a href="downloads.php?f=<?=$row['product_url']?>" class="download">Download - <?=$row['product_name']?></a></td></tr
			<? } 
			$_SESSION['user_name']='';
			mysql_query("DELETE FROM `add_cart` WHERE `add_cart`.`cookie_id` = ".$_COOKIE['chk_id']);
			?>
			<script> document.cookie="chk_id="; </script>
			
			</table>
			</form>
		  
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



