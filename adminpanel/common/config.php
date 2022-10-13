<?
session_start();
$con = mysql_connect("localhost","stark_info","asdfjhru74f");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("stark_book", $con);
?>