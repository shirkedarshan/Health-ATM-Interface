<?php
session_start();

include "db/conn.php";

  $user_pass=mysqli_real_escape_string($con,$_REQUEST['user_pass']);
  $username=mysqli_real_escape_string($con,$_REQUEST['username']);

if( @$_REQUEST["vercode"] != @$_SESSION['vercode'] ){
	mysqli_close($con);
	header('location: login.php?vercode_status=error');
}
else{

    $sql ="Select * from users where username='$username' AND user_pass='$user_pass' AND user_type='admin' ";
    $result=mysqli_query($con,$sql) or die( header("location:error.php?error=".mysqli_error($con)."") );

    $sql1="Select * from users where username='$username' AND user_pass='$user_pass' AND user_type='patient' ";
    $result1=mysqli_query($con,$sql1) or die( header("location:error.php?error=".mysqli_error($con)."") );

		$sql2="Select * from users where username='$username' AND user_pass='$user_pass' AND user_type='doctor' ";
    $result2=mysqli_query($con,$sql2) or die( header("location:error.php?error=".mysqli_error($con)."") );

    if(mysqli_num_rows($result)>0){														//admin_exist

        $row=mysqli_fetch_assoc($result);

        $text=session_id();
        $_SESSION["session_id"]=$text;
        $_SESSION['user_id']=$row['user_id'];

		$_SESSION['user_name']=$row['user_name'];
		$_SESSION['user_contact']=$row['user_contact'];
        $_SESSION['user_gender']=$row['user_gender'];
        $_SESSION['user_bdate']=$row['user_bdate'];
        $_SESSION['user_type']=$row['user_type'];

        mysqli_close($con);
        header('location: userProfile.php');
        }
    else if(mysqli_num_rows($result1)>0){											//patient_exist

        $row=mysqli_fetch_assoc($result1);

        $text=session_id();
        $_SESSION["session_id"]=$text;
        $_SESSION['user_id']=$row['user_id'];

		$_SESSION['user_name']=$row['user_name'];
		$_SESSION['user_contact']=$row['user_contact'];
        $_SESSION['user_gender']=$row['user_gender'];
        $_SESSION['user_bdate']=$row['user_bdate'];
        $_SESSION['user_type']=$row['user_type'];
        $_SESSION['chat_status']='0';

		mysqli_close($con);
        header('location: userProfile.php');
    }
    elseif(mysqli_num_rows($result2)>0){											//doctor_exist

        $row=mysqli_fetch_assoc($result2);

        $text=session_id();
        $_SESSION["session_id"]=$text;
        $_SESSION['user_id']=$row['user_id'];
        $user_id = $_SESSION['user_id'];

		$_SESSION['user_name']=$row['user_name'];
		$_SESSION['user_contact']=$row['user_contact'];
        $_SESSION['user_gender']=$row['user_gender'];
        $_SESSION['user_bdate']=$row['user_bdate'];
        $_SESSION['user_type']=$row['user_type'];
        $_SESSION['chat_status']='0';

        $sql3="Select doc_id from doctor where user_id='$user_id' and disabled=0";
        $result3=mysqli_query($con,$sql3) or die( header("location:error.php?error=".mysqli_error($con)."") );

        $doc_id=mysqli_fetch_assoc($result3);
        $doc_id=$doc_id['doc_id'];
        $_SESSION['doc_id'] = $doc_id;


		mysqli_close($con);
        header('location: userProfile.php');
    }
		else{
			mysqli_close($con);
            header('location: login.php?login_status=error');
    }
}
	?>
