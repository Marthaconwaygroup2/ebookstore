<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<!--  Version: Multiflex-3.12 / Header-1 (Default)          -->
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
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="../css/header1_setup.css" />
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
  <title>Multiflex-3.12 / Header-1</title>
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>
  <!-- Main Page Container -->
  <div class="page-container">
 
  <!-- How to implement this header in your Multiflex-3 Layout:           -->
  <!-- 1. Copy the marked rows below                                      -->
  <!-- 2. Paste and replace marked rows in your "layoutNN.html" file      -->
  <!-- 3. Open CSS-file "header1_setup.css", and follow its instructions  -->

  <!-- START COPY here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          <h1><a href="home.php" title="Go to Start page">Stark Information</a></h1>
          <h2>Skynet is the future</h2>
        </div>
    
        <!-- Navigation Level 0 -->
        <div class="nav0">
          <!--<ul>
            <li><a href="#" title="Pagina home in Italiano"><img src="img/flag_italy.gif" alt="Image description" /></a></li>
            <li><a href="#" title="Homepage auf Deutsch"><img src="img/flag_germany.gif" alt="Image description" /></a></li>
            <li><a href="#" title="Hemsidan p&aring; svenska"><img src="img/flag_sweden.gif" alt="Image description" /></a></li>
          </ul>-->
        </div>			

        <!-- Navigation Level 1 -->
        <div class="nav1">
          <ul>
            <!--<li><a href="index.php" title="Go to Start page">Home</a></li> 
            <li><a href="about_us.php" title="Get to know who we are">About us</a></li>
            <li><a href="contact.php" title="Get in touch with us">Contact us</a></li>																		
            <li><a href="#" title="Get an overview of website">Sitemap</a></li>-->
          </ul>
        </div>              
      </div>
      
      <!-- A.2 HEADER MIDDLE -->
      <div class="header-middle">    
   
        <!-- Site message -->
        <div class="sitemessage">
          <h1>EASY &bull; FLEXIBLE &bull; ROBUST</h1>
          <h2>The third generation Multiflex is<br /> here, now with cooler design<br /> features and easier code!</h2>
          <h3><a href="about_us.php">&rsaquo;&rsaquo;&nbsp;More details</a></h3>
        </div>        
      </div>
      
      <!-- A.3 HEADER BOTTOM -->
      <div class="header-bottom">
      
        <!-- Navigation Level 2 (Drop-down menus) -->
        <div class="nav2">
	
          <!-- Navigation item -->
          <ul>
            <li><a href="home.php">Index</a></li>
          </ul>
          
          <!-- Navigation item -->
          <ul>
            <li><a href="#">CMS<!--[if IE 7]><!--></a><!--<![endif]-->
              <!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul>
                  <li><a href="homes.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Home</a></li>
                  <li><a href="about_us.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">About us</a></li>
                  <li><a href="contact.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Contact us</a></li>                                  
                </ul>
              <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
          </ul>          

          <!-- Navigation item -->
          <ul>
            <li><a href="#" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Product<!--[if IE 7]><!--></a><!--<![endif]-->
              <!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul>
                  <li><a href="list_product.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">List Product</a></li>
				  <li><a href="add_product.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Add Product</a></li>
                </ul>
              <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
          </ul>   
		  
		  <ul>
            <li><a href="payment.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Payment<!--[if IE 7]><!--></a><!--<![endif]-->
              <!--[if lte IE 6]><table><tr><td><![endif]-->
                <!--<ul>
                  <li><a href="list_product.php">List Payment</a></li>
                </ul>-->
              <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
          </ul> 
		  
		  <? if($_SESSION['admin_user_id']!='') { ?>
		  <ul>
            <li><a href="logout.php">Logout</a>
            </li>
          </ul>
		  <? } ?>    
        </div>
	  </div>

      <!-- A.4 HEADER BREADCRUMBS -->

      
    </div>

  <!-- END COPY here -->

  </div> 
  
</body>
</html>



