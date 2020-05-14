<?php
session_start();
?>
<html>
<head>
<title>Chat</title>

<input type="hidden" id="nav-l" value="chat_a"/>
<?php
	if( $_SESSION["user_type"] == 'patient'){require("userNav.php");
	}elseif( $_SESSION["user_type"] == 'doctor' ){require("docNav.php");
	}else{header("location:logout.php");}

	include "db/conn.php";
?>
	<script type="text/javascript">
	function LoadUserChat(value)
	{
		var xmlhttp= new XMLHttpRequest();

		$("#data_div").removeClass("collapse");
		$("#data_div").addClass("collapse.show");

			xmlhttp.open("GET","chatData.php?doc_id="+value,true);
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
<script type="text/javascript">
	function LoadDocChat(value)
	{
		var xmlhttp= new XMLHttpRequest();

		$("#data_div").removeClass("collapse");
		$("#data_div").addClass("collapse.show");

		xmlhttp.open("GET","chatData.php?patient_id="+value,true);
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
<script>
	function SendChat(value)
	{
		var xmlhttp= new XMLHttpRequest();

		xmlhttp.open("GET","chatInsert.php?msg="+value,true);
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
<script>
$(document).ready(function(){
	$("button#data_btn").click(function(){

	$("#part_1").addClass("collapse");
	$("#part_2").removeClass("collapse");
	$("#part_2").addClass("collapse.show");

	setInterval(function(){
	$("div#response").load("chatData.php")
	},1000);

	});
});
</script>
</head>
<body>
	<?php
	if( $_SESSION['user_type'] == 'patient' ){
		$user_id= $_SESSION['user_id'];
		$sql="select * from doc_ref r inner join doctor d on d.doc_id = r.doc_id where r.status='1' and r.user_id = '$user_id' and d.disabled=0";
		$res= mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );
	}else if( $_SESSION['user_type'] == 'doctor' ){
		$doc_id= $_SESSION['doc_id'];
		$sql="select * from doc_ref r inner join users u on u.user_id = r.user_id where r.status='1' and r.doc_id = '$doc_id'";
		$res= mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );
	}
?>

<div class="jumbotron">
	<?php
	if( $_SESSION["user_type"] == "patient" ){
		echo'<h2 class="text-center">Discuss With Connected Doctors. </h2><hr>';
	}else if( $_SESSION["user_type"] == "doctor" ){
		echo'<h2 class="text-center">Discuss With Connected Patients. </h2><hr>';
	}
?>
	<div class="row">
		<div class="col table-responsive" id="part_1">
		<table class="table table-bordered table-hover text-center">
		<thead>
		<tr>
		<?php
		if( $_SESSION["user_type"] == "patient" ){
			echo'<th scope="col" class="alert alert-info">
			Connected Doctors
			</th>';
		}else if( $_SESSION["user_type"] == "doctor" ){
			echo'
			<th scope="col" class="alert alert-info">
			Connected Patients
			</th>';
			}
	?>
	</tr>
		</thead>
		<tbody >
	<tr>
		<?php
	while($row=mysqli_fetch_assoc($res)){
		if( $_SESSION["user_type"] == 'patient'){
			$doc_id=$row['doc_id'];
			echo "<td scope='col'><button class='btn' id='data_btn' onclick=LoadUserChat('$doc_id')>";
			echo 'Dr.'.$row['doc_name'];
			echo '</button></td></tr>';
		}elseif( $_SESSION["user_type"] == 'doctor' ){

		$user_id=$row['user_id'];
		echo "<td scope='col'><button class='btn' id='data_btn' onclick=LoadDocChat('$user_id')>";
		echo $row['user_name'];
		echo '</button></td></tr>';

		}
	}
mysqli_close($con);
?>
		</tbody>
	</table>
</div>
	<div class="col collapse " data-toggle="modal" id="part_2">
		<div id="response">
			All the best
		</div>
		<div class="input-group mb-3 collapse position-sticky sticky-bottom" id="data_div">
			<input type="text" maxlength="100" class="form-control" id="msg_text" placeholder="Type a message">
		<div class="input-group-append">
			<button class="input-group btn btn-success" id="send_msg" onclick=SendChat(document.getElementById("msg_text").value)>
				<ion-icon name="send"></ion-icon>
			</button>
		</div>
		</div>
		</div>
	</div>
</div>
</body>