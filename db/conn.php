<?php

//$con=mysqli_connect('remotemysql.com','lzBt3sXSkJ','oDy6p7Rwto','lzBt3sXSkJ','3306') or die( header("location:error.php?error=".mysqli_error($con)."") );

 $con=mysqli_connect('localhost','root','','doc') or die( header("location:error.php?error=".mysqli_error($con)."") );
// mysqli_select_db($con,'doc') or die("Check DB Exists or Not?");

?>
