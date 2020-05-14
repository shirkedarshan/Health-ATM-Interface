	<html>
<head>
<?php include "../doc/css/bst.html";?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1>Medical Details</h1>
<div align='center'></div>
<form method='POST'>
<table>
<tr>
<td><label>Enter Device ID:</label> <input type="text" name="txtMessage"></td>
<!-- Dropdown                                -->
<td> <label for="cars">Select Device:</label>
  <select id="Details" name="Details">
    <option></option>
    <option value="0">Temperature</option>
    <option value="1">Pulse Rate</option>    
	<option value="2">Body Weight</option>
  </select>
</td>

</tr>
<tr>
<td> <label for="cars">Request/Response:</label>
  <select id="Details" name="Details">
    <option></option>
    <option value="0">Request</option>
    <option value="1">Response</option>    
  </select>
</td></tr>

<tr>
<td><label>Enter Data:</label> <input type="text" name="txtMessage"></td>
</tr>
<!-- <tr>
<td><label>Enter Weight:</label> <input type="text" name="Weight"</td>
</tr>
<tr>
<td><label>Body Temperature:</label> <input type="text" name="Weight"</td>
</tr> -->
<tr>
<td><input type="button" name="Submit" value="Submit Details"></td>
</tr>
<?php
$host="192.168.43.160";
$port=5353;
if(isset($_POST['btnSend'])){
$msg= $_REQUEST['txtMessage'];
$sock = socket_create(AF_INET, SOCK_STREAM, 0);
socket_connect($sock, $host, $port);

socket_write($sock, $msg, strlen($msg));

$reply = socket_read($sock, 1024);
$reply = trim($reply);
$reply = "Server says:\t".$reply;
}
?>
</form>
</div>
</body>
</html>