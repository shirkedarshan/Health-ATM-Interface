<?php
session_start();
?>
<html lang="en">
<head>
	<title>Search A Doctor</title>
	<input type="hidden" id="nav-l" value="connd"/>
<?php require("userNav.php");
	if( @$_REQUEST['alert']== 'manyreq' ){
		echo'<script>alert("To Many Request To Same Doctor")</script>';
	}else if( @$_REQUEST['alert']== 'success' ){
		echo'<script>alert("Requested Successfully")</script>';
	}
?>
<script type="text/javascript">
		function DocReference(value)
		{
			var xmlhttp= new XMLHttpRequest();

			xmlhttp.open("GET","userConnAjax.php?doc_id="+value,true);
			//the file get_city.php is their in this folder itself
			xmlhttp.send();

			xmlhttp.onreadystatechange=function()
			{
				if(xmlhttp.readyState==4)
				{
				document.getElementById('response').innerHTML=xmlhttp.responseText;
}
			}

		}

	</script>

</head>
<body>
<div class="jumbotron table-responsive">
	<h2 class="text-center">Search A Doctor</h2><hr>
	<table class="table table-bordered">
	<thead >
		<tr>
		<th class="text-center alert-info" scope="col">
			Search By Doctor Information :
			<input type="text" class="form-control-sm" id="doc_id" placeholder="Enter Doctor Information" />
			<button class="btn btn-success" onclick=DocReference(document.getElementById('doc_id').value) />
				Search
			</button>
			</form>
		</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td scope="col">
			<div id="response"></div>
		</td>
		</tr>
	</tbody>
</table>
</div>
