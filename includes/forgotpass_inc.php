<?php

	if(isset($_POST['sendemail']))
	{
		include_once "DBconn_inc.php";

		//read the email value

		$email =mysqli_real_escape_string($conn,$_POST['forget_email']);

		//check for email validation
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("Location: ../login.php?forgetpass=invalidemail")
			exit();
		}else{

			 // check whether email is presnt in the database
			$sql = "SELECT empNumber FROM users where empEmail='$email'";
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck < 1){
				header("Location: ../login.php?forgetpass=userntpresent")
				exit();
			}else{
				$str = "0123456789hdfaqwerpqiewrpldfzxcvbnmlkjhgafdsqwertyuiop";
				$str = str_shuffle($str);
				$str = substr($str, 10);

				
			}
		}
	}else{
		header("Location: ../login.php?forgetpass=error")
		exit();
	}

?>