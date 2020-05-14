<?php session_start();?>
<head>
<title>Symptom Checker</title>
<input type="hidden" id="nav-l" value="symcheck"/>
<?php require("userNav.php");?>

<script type="text/javascript">

function symChecker(){

	$("#response").removeClass("collapse");
	$("#response").addClass("collapse.show");
	$("#part1").addClass("collapse");
	//ajax starts
		$.ajax({
		  type: "POST",  //method
		  url: "symCheckerAjax.php", //target file
		  data: { sym1: $("#sym1").val() , sym2: $("#sym2").val() , sym3: $("#sym3").val() , sym4: $("#sym4").val() , sym5: $("#sym5").val() , sym6: $("#sym6").val() , sym7: $("#sym7").val() },
      //data need to be send
		beforeSend: function() {},
		success: function(data) {
					$('#response').html(data);
		},
		error: function() {
			alert("You have a error");
		}
	});
}

</script>
</head>

<body>

  <div class="jumbotron" id="part1">

    <h3 class="text-center">Select Symptoms From Following.</h3><hr><br>
    <div class="input-group mb-3">
      <div class="input-group-prepend ">
        <label class="input-group-text" for="sym1">Symptom 1 :</label>
      </div>
      <select class="custom-select" id="sym1" name="gender"  >
        <option label="Select Here" value='NULL'>Select Symptom</option>
        <option value="Sore Throat">Sore Throat</option>
        <option value="Cough">Cough</option>
        <option value="Headache">Headache</option>
        <option value="Nausea">Nausea</option>
        <option value="Sneezing">Sneezing</option>
        <option value="Body Aches">Body Aches</option>
        <option value="Watery Eyes">Watery Eyes</option>
        <option value="Fever">Fever</option>
        <option value="Chills">Chills</option>
        <option value="Weakness">Weakness</option>
        <option value="Nasal Congestion">Nasal Congestion</option>
        <option value="Runny Nose">Runny Nose</option>
        <option value="Muscle Pain">Muscle Pain</option>
        <option value="Abdominal Pain">Abdominal Pain</option>
        <option value="Cramps">Cramps</option>
        <option value="Diarrhea">Diarrhea</option>
        <option value="Vomitting">Vomitting</option>
        <option value="Muscle Aches">Muscle Aches</option>
        <option value="Cough With Blood">Cough With Blood</option>
        <option value="Shortness Of Breath">Shortness Of Breath</option>
        <option value="Redness Of Face">Redness Of Face</option>
        <option value="Moles On Skin">Moles On Skin</option>
      </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend ">
        <label class="input-group-text" for="sym2">Symptom 2 :</label>
      </div>
      <select class="custom-select" id="sym2" name="gender"  >
        <option label="Select Here" value='NULL'>Select Symptom</option>
        <option value="Sore Throat">Sore Throat</option>
        <option value="Cough">Cough</option>
        <option value="Headache">Headache</option>
        <option value="Nausea">Nausea</option>
        <option value="Sneezing">Sneezing</option>
        <option value="Body Aches">Body Aches</option>
        <option value="Watery Eyes">Watery Eyes</option>
        <option value="Fever">Fever</option>
        <option value="Chills">Chills</option>
        <option value="Weakness">Weakness</option>
        <option value="Nasal Congestion">Nasal Congestion</option>
        <option value="Runny Nose">Runny Nose</option>
        <option value="Muscle Pain">Muscle Pain</option>
        <option value="Abdominal Pain">Abdominal Pain</option>
        <option value="Cramps">Cramps</option>
        <option value="Diarrhea">Diarrhea</option>
        <option value="Vomitting">Vomitting</option>
        <option value="Muscle Aches">Muscle Aches</option>
        <option value="Cough With Blood">Cough With Blood</option>
        <option value="Shortness Of Breath">Shortness Of Breath</option>
        <option value="Redness Of Face">Redness Of Face</option>
        <option value="Moles On Skin">Moles On Skin</option>
      </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend ">
        <label class="input-group-text" for="sym3">Symptom 3 :</label>
      </div>
      <select class="custom-select" id="sym3" name="gender"  >
        <option label="Select Here" value='NULL'>Select Symptom</option>
        <option value="Sore Throat">Sore Throat</option>
        <option value="Cough">Cough</option>
        <option value="Headache">Headache</option>
        <option value="Nausea">Nausea</option>
        <option value="Sneezing">Sneezing</option>
        <option value="Body Aches">Body Aches</option>
        <option value="Watery Eyes">Watery Eyes</option>
        <option value="Fever">Fever</option>
        <option value="Chills">Chills</option>
        <option value="Weakness">Weakness</option>
        <option value="Nasal Congestion">Nasal Congestion</option>
        <option value="Runny Nose">Runny Nose</option>
        <option value="Muscle Pain">Muscle Pain</option>
        <option value="Abdominal Pain">Abdominal Pain</option>
        <option value="Cramps">Cramps</option>
        <option value="Diarrhea">Diarrhea</option>
        <option value="Vomitting">Vomitting</option>
        <option value="Muscle Aches">Muscle Aches</option>
        <option value="Cough With Blood">Cough With Blood</option>
        <option value="Shortness Of Breath">Shortness Of Breath</option>
        <option value="Redness Of Face">Redness Of Face</option>
        <option value="Moles On Skin">Moles On Skin</option>
      </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend ">
        <label class="input-group-text" for="sym4">Symptom 4 :</label>
      </div>
      <select class="custom-select" id="sym4" name="gender"  >
        <option label="Select Here" value='NULL'>Select Symptom</option>
        <option value="Sore Throat">Sore Throat</option>
        <option value="Cough">Cough</option>
        <option value="Headache">Headache</option>
        <option value="Nausea">Nausea</option>
        <option value="Sneezing">Sneezing</option>
        <option value="Body Aches">Body Aches</option>
        <option value="Watery Eyes">Watery Eyes</option>
        <option value="Fever">Fever</option>
        <option value="Chills">Chills</option>
        <option value="Weakness">Weakness</option>
        <option value="Nasal Congestion">Nasal Congestion</option>
        <option value="Runny Nose">Runny Nose</option>
        <option value="Muscle Pain">Muscle Pain</option>
        <option value="Abdominal Pain">Abdominal Pain</option>
        <option value="Cramps">Cramps</option>
        <option value="Diarrhea">Diarrhea</option>
        <option value="Vomitting">Vomitting</option>
        <option value="Muscle Aches">Muscle Aches</option>
        <option value="Cough With Blood">Cough With Blood</option>
        <option value="Shortness Of Breath">Shortness Of Breath</option>
        <option value="Redness Of Face">Redness Of Face</option>
        <option value="Moles On Skin">Moles On Skin</option>
      </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend ">
        <label class="input-group-text" for="sym5">Symptom 5 :</label>
      </div>
      <select class="custom-select" id="sym5" name="gender">
        <option label="Select Here" value='NULL'>Select Symptom</option>
        <option value="Sore Throat">Sore Throat</option>
        <option value="Cough">Cough</option>
        <option value="Headache">Headache</option>
        <option value="Nausea">Nausea</option>
        <option value="Sneezing">Sneezing</option>
        <option value="Body Aches">Body Aches</option>
        <option value="Watery Eyes">Watery Eyes</option>
        <option value="Fever">Fever</option>
        <option value="Chills">Chills</option>
        <option value="Weakness">Weakness</option>
        <option value="Nasal Congestion">Nasal Congestion</option>
        <option value="Runny Nose">Runny Nose</option>
        <option value="Muscle Pain">Muscle Pain</option>
        <option value="Abdominal Pain">Abdominal Pain</option>
        <option value="Cramps">Cramps</option>
        <option value="Diarrhea">Diarrhea</option>
        <option value="Vomitting">Vomitting</option>
        <option value="Muscle Aches">Muscle Aches</option>
        <option value="Cough With Blood">Cough With Blood</option>
        <option value="Shortness Of Breath">Shortness Of Breath</option>
        <option value="Redness Of Face">Redness Of Face</option>
        <option value="Moles On Skin">Moles On Skin</option>
      </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend ">
        <label class="input-group-text" for="sym6">Symptom 6 :</label>
      </div>
      <select class="custom-select" id="sym6" name="gender"  >
        <option label="Select Here" value='NULL'>Select Symptom</option>
        <option value="Sore Throat">Sore Throat</option>
        <option value="Cough">Cough</option>
        <option value="Headache">Headache</option>
        <option value="Nausea">Nausea</option>
        <option value="Sneezing">Sneezing</option>
        <option value="Body Aches">Body Aches</option>
        <option value="Watery Eyes">Watery Eyes</option>
        <option value="Fever">Fever</option>
        <option value="Chills">Chills</option>
        <option value="Weakness">Weakness</option>
        <option value="Nasal Congestion">Nasal Congestion</option>
        <option value="Runny Nose">Runny Nose</option>
        <option value="Muscle Pain">Muscle Pain</option>
        <option value="Abdominal Pain">Abdominal Pain</option>
        <option value="Cramps">Cramps</option>
        <option value="Diarrhea">Diarrhea</option>
        <option value="Vomitting">Vomitting</option>
        <option value="Muscle Aches">Muscle Aches</option>
        <option value="Cough With Blood">Cough With Blood</option>
        <option value="Shortness Of Breath">Shortness Of Breath</option>
        <option value="Redness Of Face">Redness Of Face</option>
        <option value="Moles On Skin">Moles On Skin</option>
      </select>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend ">
        <label class="input-group-text" for="sym7">Symptom 7 :</label>
      </div>
      <select class="custom-select" id="sym7" name="gender"  >
        <option label="Select Here" value='NULL'>Select Symptom</option>
        <option value="Sore Throat">Sore Throat</option>
        <option value="Cough">Cough</option>
        <option value="Headache">Headache</option>
        <option value="Nausea">Nausea</option>
        <option value="Sneezing">Sneezing</option>
        <option value="Body Aches">Body Aches</option>
        <option value="Watery Eyes">Watery Eyes</option>
        <option value="Fever">Fever</option>
        <option value="Chills">Chills</option>
        <option value="Weakness">Weakness</option>
        <option value="Nasal Congestion">Nasal Congestion</option>
        <option value="Runny Nose">Runny Nose</option>
        <option value="Muscle Pain">Muscle Pain</option>
        <option value="Abdominal Pain">Abdominal Pain</option>
        <option value="Cramps">Cramps</option>
        <option value="Diarrhea">Diarrhea</option>
        <option value="Vomitting">Vomitting</option>
        <option value="Muscle Aches">Muscle Aches</option>
        <option value="Cough With Blood">Cough With Blood</option>
        <option value="Shortness Of Breath">Shortness Of Breath</option>
        <option value="Redness Of Face">Redness Of Face</option>
        <option value="Moles On Skin">Moles On Skin</option>
      </select>
    </div>
    <center><button class="btn btn-success" onclick=symChecker() >
      Find Estimated Solution
    </button></center>
  </div>

  <div class="jumbotron collapse" id="response">
  </div>
</body>
</html>
