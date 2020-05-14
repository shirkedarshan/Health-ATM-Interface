<?php session_start(); ?>
<html lang="en">
<head>
<title>Feedback History</title>
<input type="hidden" id="nav-l" value="checkfb"/>
<?php require("adminNav.php");
?>

<script type="text/javascript">
	function FbReference(value)
	{
		var xmlhttp= new XMLHttpRequest();

		xmlhttp.open("GET","feedbackHistoryAjax.php?user_id="+value,true);
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
	<h2 class="text-center">Search For Feedbacks</h2><hr>
	<table class="table table-bordered">
	<thead >
	<tr>
	<th class="text-center alert-info" scope="col">
	Search By User Information :
	<input type="text" class="form-control-sm" id="user_id" placeholder="Enter User Information" />
	<button class="btn btn-success" onclick=FbReference(document.getElementById('user_id').value) />
	Search
	</button>
	</form>
	</th></tr></thead>
	<tbody>
	<tr>
	<td scope="col">
		<div id="response"></div>
	</td>
	</tr>
	</tbody>
	</table>
	</div>
</body>
