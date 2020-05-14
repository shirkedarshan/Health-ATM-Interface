<?php
session_start();
?>
<html lang="en">
<head>
<title>Check Activities</title>
<?php
if( $_SESSION["user_type"] == 'admin' ){
	echo'<input type="hidden" id="nav-l" value="checkact"/>';
	require("adminNav.php");
	include("db/conn.php");
}else{
	header("location:login.php");
}
?>
<script type="text/javascript">
	function ActReference(value)
	{
		var xmlhttp= new XMLHttpRequest();

		xmlhttp.open("GET","medicineListAjax.php?medicineInfo="+value,true);
		//the file get_city.php is their in this folder itself
		xmlhttp.send();

		xmlhttp.onreadystatechange=function()
		{
		if(xmlhttp.readyState==4){
			document.getElementById('response').innerHTML=xmlhttp.responseText;
		}
	}

}

</script>

</head>
<body>
<div class="jumbotron table-responsive">
<h2 class="text-center">Check Medicines</h2><hr>
<table class="table table-bordered">
<thead >
	<tr>
	<th class="text-center alert-info" scope="col">
	Search A Medicine :
	<input type="text" class="form-control-sm" id="medicineInfo" placeholder="Enter Info To Search" />
	<button class="btn btn-success" onclick=ActReference(document.getElementById('medicineInfo').value) />
	Search
	</button>
	</form>
	</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td scope="col">
	<div class="table-responsive" id="response"></div>
	</td>
	</tr>
	</tbody>
</table>
</div>