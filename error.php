<?php
session_start();
?>
<head>
<title>Error</title>

<?php
include "./css/bst.html";
include ("./css/js.html");
include ("loading.php");
?>
</head>

<div class="jumbotron">
<h1 class="text-info font-weight-bold">Error :</h1><hr>
<div class="alert alert-danger text-center font-weight-bold" role="alert">
<?php
if( @$_REQUEST["error"] ){
	echo $_REQUEST["error"];
}else{
	echo"Please Check Your Internet Connection. <br>";
	echo"Something Went Wrong.";
}
?>
</div>

<center>
<?php

@$referer=filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

if(!empty($referer)){

	echo'<p class="btn btn-success"><a  class="text-decoration-none text-light"  href="'. $referer .'" title="Return to the previous page">&laquo; Go back</a></p>';

}else{

	echo '<p class="btn btn-success"><a  class="text-decoration-none text-light" href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a></p>';

}
?>
</center>
</div>