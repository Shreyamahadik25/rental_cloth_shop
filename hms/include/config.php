<?php
/*define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'rental_cloth_shop');*/
$con = mysqli_connect('localhost','root','','rental_cloth_shop',3307);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>