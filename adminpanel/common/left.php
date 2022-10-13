      <div class="main-navigation">

        <!-- Navigation Level 3 -->
        <div class="round-border-topright"></div>
        <h1 class="first">Quick Links</h1>

        <!-- Navigation with grid style -->
        <dl class="nav3-grid">
          <dt><a href="home.php">Index</a></dt>
		  <dt><a href="#" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">CMS</a></dt>
            <dd><a href="homes.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Home</a></dd>
			<dd><a href="about_us.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">About us</a></dd>
			<dd><a href="contact.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Contact us</a></dd>
		  <dt><a href="#" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Product</a></dt>
            <dd><a href="list_product.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">List Product</a></dd>
			<dd><a href="add_product.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Add Product</a></dd>
		  <dt><a href="payment.php" onclick="javascript:return loginfunc(<?=$_SESSION['admin_user_id']?>)">Payment</a></dt>
		  <? if($_SESSION['admin_user_id']!='') { ?>
		  <dt><a href="logout.php">Logout</a></dt>
		  <? } ?>   
		  
        </dl>                        

        
      </div>
