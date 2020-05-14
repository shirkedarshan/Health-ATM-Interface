<?php
session_start();
?>
<html lang="en">
<head>
<title>Patient Requests</title>

	<input type="hidden" id="nav-l" value="req"/>
<?php require("docNav.php");
	if( @$_REQUEST['alert']== 'manyreq' ){
		echo'<script>alert("To Many Request To Same Doctor")</script>';
	}else if( @$_REQUEST['alert']== 'success' ){
		echo'<script>alert("Requested Successfully")</script>';
	}
?>
<script type="text/javascript">
		function PatientReference(value)
		{
			var xmlhttp= new XMLHttpRequest();

			xmlhttp.open("GET","patientReqAjax.php?patient_id="+value,true);
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
	<h2 class="text-center">Patient Requests</h2><hr>
	<table class="table table-bordered">
	<thead >
		<tr>
		<th class="text-center alert-info" scope="col">
			Search A Patient Request :
			<input type="text" class="form-control-sm" id="patient_id" placeholder="Enter About Patient" />
			<button class="btn btn-success" onclick=PatientReference(document.getElementById('patient_id').value) />
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
