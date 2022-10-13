<?
$_SESSION['title']="itEANz Events";
include("common/config.php");
include_once('Paging.class.php');
global $arrMainParam;
$arrMainParam['TOTAL_RECORDS']				=	'';
$arrMainParam['RECORDS_PER_PAGE']			=	6;
$arrMainParam['PAGELINKS_PER_PAGE']			=	10;
$arrChildParam['FORM_NAME']					=	'frm_events';
$arrChildParam['SHOW_TOTAL_RECORDS_FOUND']	=	'0';
$arrChildParam['PAGINATION_STYLE']			=	'3';
$arrChildParam['SPT_URL_PARAM']				=	'1';

if($_REQUEST['prod_ids']!='') {
mysql_query("INSERT INTO `add_cart` (`cart_id`, `product_id`, `cookie_id`, `entry_date`) VALUES (NULL, ".$_REQUEST['prod_ids'].", '".$_COOKIE['chk_id']."', '".date("Y-m-d")."')");
$_REQUEST['prod_ids']='';
?>
<script>window.location="cart_info.php?status=insert"</script>
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
  <title>Stark Information - Product Information</title>
  
<script>
function setCookie(value)
{
document.cookie="add_cart?prod_id=" +escape(value);
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
		  <li><a href="products.php">Products</a></li>
          <li>Product Information</li>
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
        <h1 class="pagetitle">Product Information</h1>

        <!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column -->
        <div class="column1-unit">
          <!--<h1>Credits for ideas and reviews</h1>                            
          <p>Persons who contributed with ideas or CMS-portings for Multiflex-3:</p>-->
          
		  <form action="#" name="frm_events" id="frm_events" onSubmit="return checkform(this);" method="post">
			<table border="1" cellpadding="1" cellspacing="1" style="padding:2px; vertical-align:top;" width="100%" align="center">
			<tr height="10"></tr>
			<?
			$sql="SELECT * FROM `products` where product_id=".$_REQUEST['pid'];
			$result=mysql_query($sql);
			$numbers=mysql_num_rows($result);
			 
			if($numbers>0)
			{
			$nn=0;
			while($row = mysql_fetch_array($result))
			{
			?>
			<tr><td valign="top" align="center"><img src="img/product/<?=$row['product_image']?>" class="cllink" width="100" height="100" border="0" title="Click to Open Full View"><br /><?=$row['product_name']?><br />$ <?=$row['product_price']?> <a href="product_info.php?prod_ids=<?=$row['product_id']?>" class="add_cart">Add to cart</a><br /><br /><b>Product Information : </b><br />
			<?=$row['product_description']?>
			</td></tr>
			<?
			}
			}
			?>
			</tr>
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



