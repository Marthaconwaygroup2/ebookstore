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

if($_SERVER['REQUEST_METHOD']=='POST')
{
$sql=mysql_query("UPDATE `tbl_cms` SET `name` = '".$_REQUEST['txt_title']."', page_title = '', `content` = '".$_POST['FCKeditor1']."' WHERE `tbl_cms`.`id` =2");
?>
<script>window.location="about_us.php?status=success";</script>
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
  <title>Stark Information - Admin - About us</title>
  
  
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
        <h1 class="pagetitle">About us</h1>

        <!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column --><!-- Content unit - One column -->
        <div class="column1-unit">
          <!--<h1>Credits for ideas and reviews</h1>                            
          <p>Persons who contributed with ideas or CMS-portings for Multiflex-3:</p>-->
		  
		  <? if($_REQUEST['status']=='success') { ?>
		  <p align="center" style="color: #FF0000"><strong>About us Content Updates Successfully</strong></p>
		  <? }
		  if($_REQUEST['status']=='wrong') { ?>
		  <p align="center" style="color: #FF0000"><strong>Invalid Admin Name or Admin Password</strong></p>
		  <? } ?>
		  <form action="#" method="post" name="frm_career" id="frm_career">
<table width="100%" align="center" style="width:80%; height:210px;" border="0" cellspacing="0" cellpadding="0">
<?
$title='';
$description='';
$count=0;
$result = mysql_query("SELECT * FROM tbl_cms where id=2");
$count=mysql_num_rows($result);
if($count>0)
{
while($row = mysql_fetch_array($result))
{
$title=$row['name'];
$description=$row['content'];
}
}
?>
 <tr><td height="50" width="20%" align="right">Title</td><td width="2%"></td><td width="78%" align="left"><input type="text" name="txt_title" id="txt_title" value="<?=$title?>"></td></tr>
 <tr><td align="right" valign="top">Description</td></tr>
 <tr><td align="left" valign="middle" >
	<?php
	$oFCKeditor = new FCKeditor('FCKeditor1') ;
	$oFCKeditor->BasePath = 'fckeditor/' ;
	$oFCKeditor->Value = $description ; 
	$oFCKeditor->Create() ;
	?>
	<br><br>
    <input type="submit" value="Submit" name="submit">
</td></tr>
		</form>
		</table>
		
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



