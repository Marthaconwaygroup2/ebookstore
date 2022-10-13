<?
$server="sql111.epizy.com";
$username="epiz_32772278";
$password="6ZvJBuWBBLWfD";
$dbname="epiz_32772278_stark_book";
$con = mysqli_connect($server,$username,$password,$dbname);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// mysql_select_db("stark_book", $con);
?>