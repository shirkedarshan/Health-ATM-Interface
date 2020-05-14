<?php
session_start();
?>
<html lang="en">
<head>
	<title>Feedback</title>
	<input type="hidden" id="nav-l" value="feedb"/>
<?php
	if( $_SESSION["user_type"] == 'patient'){require("userNav.php");
	}elseif( $_SESSION["user_type"] == 'doctor' ){require("docNav.php");
	}else{header("location:logout.php");}
?>
<script type="text/javascript">
	function SendFb(value)
	{
		var xmlhttp= new XMLHttpRequest();

		xmlhttp.open("GET","feedbackAction.php?feedback="+value,true);
		//the file get_city.php is their in this folder itself
		xmlhttp.send();

		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4){
				document.getElementById('response').innerHTML=xmlhttp.responseText;
			}
		}
	}
</script>
</head>
<body>
	<div class="jumbotron shadow-lg">
	<center><h2>Feedback</h2>
		<p class="text-secondary">( Your Feedback Is Valuable For Us To Improve Our Service For You. )</p>
	</center><hr>

		<div class="form-group ">
		<label class="font-weight-bold " for="fb"><h4>Write Your Feedback Here:</h4></label>
		<textarea class="form-control" name="feedback" id="fb" rows="4"></textarea>
		<div id="response">
		</div>
	</div>

	<button class="btn btn-success float-right" onclick=SendFb(document.getElementById('fb').value)>
		Submit Feedback
	</button><br>
</div>
