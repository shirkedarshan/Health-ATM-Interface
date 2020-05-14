<?php
session_start();
?>

<html lang="en">
<head>
 <title>Disabled Doctors</title>
<input type="hidden" id="nav-l" value="act_doc"/>
<?php
require("adminNav.php");
?>

<script type="text/javascript">
   function DocList(value)
   {
     var xmlhttp= new XMLHttpRequest();

     xmlhttp.open("GET","docdisabled_ajax.php?doc_id="+value,true);
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
  <h2 class="text-center">Search Disabled Doctor</h2><hr>
  <table class="table table-bordered">
  <thead >
    <tr>
      <th class="text-center alert-info" scope="col">
          Enter Doctor Information :
          <input type="text" class="form-control-sm" id="doc_id" placeholder="Enter Doctor Reference" />
          <button class="btn btn-success" onclick=DocList(document.getElementById('doc_id').value) />
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
