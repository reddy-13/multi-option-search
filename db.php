<?php
   
//db host values
define("db_host","localhost");
define("db_user","root");
define("db_password","");
define("db_name","search");

$con = mysqli_connect(db_host,db_user,db_password);
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_select_db($con,db_name)or die(mysqli_error($con));
?>