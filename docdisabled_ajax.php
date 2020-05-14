 <?php
session_start();

  include("db/conn.php");

	$s="select * from doctor where disabled='1'";
	$re = mysqli_query($con,$s) or die( header("location:error.php?error=".mysqli_error($con)."") );


			
			if(mysqli_num_rows($re)==0){
        echo'<tr>
              <td class=" font-weight-bold" scope="col">
                  <center><b>No Doctor Exist For Given Reference Id.</b></center></td>
            </tr>';
			}else{
        echo'<table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">Doctor Id</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Doctor Qualification</th>
                  <th scope="col">Request</th>
                  <th scope="col">Enable Doctor</th></tr>
              </thead>
              <tbody>';

        while($val = mysqli_fetch_assoc($re)){
				  $doc_id = $val['doc_id'];
          $doc_name = $val['doc_name'];
          $doc_spec = $val['doc_spec'];
		  $docDisabled = $val['disabled'];

          echo'
                  <tr class="table-success">
                    <th scope="row">'.$doc_id.'</th>
                    <td><a class="text-decoration-none font-weight-bold" href="docDescp.php?doc_id='.base64_encode($doc_id).'">Dr. '.$doc_name.'</a></td>
                    <td>'.$doc_spec.'</td>';

    echo'<td class="font-weight-bold"><a href="docDescp.php?doc_id='.base64_encode($doc_id).'">View Profile</a></td>';

		echo'<td class="font-weight-bold text-success"><a href="docEnable.php?doc_id='.base64_encode($doc_id).'">Enable</a></td></tr>';
            
	
      }
      echo'</tbody>
    </table>';
  }

mysqli_close($con);
?>
