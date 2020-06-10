<?php
define('DB_SERVER','localhost');
define('DB_USER','id11142931_cms');
define('DB_PASS' ,'dhandhan');
define('DB_NAME', 'id11142931_cms');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>