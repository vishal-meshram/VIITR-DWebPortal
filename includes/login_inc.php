<?php
//session starts here
	session_start();

	
	if(isset($_POST['login'])){
		include "DBconn_inc.php";

		$uid = mysqli_real_escape_string($conn,$_POST['username']);
		$pass = mysqli_real_escape_string($conn,$_POST['pwd']);

		//Error checking 
		//checking for empty fields
		if(empty($uid) || empty($pass)){
			header("Location: ../login.php?login=empty");
			exit();
		}else{

			$sql = "SELECT * FROM users WHERE empEmail='$uid'";
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck < 1)
			{
				header("Location: ../login.php?login=error");
				exit();
			}else{
				if($row = mysqli_fetch_assoc($result))
				//Dehashing the password
				$deHashedPwd = password_verify($pass,$row['empPassword']);
				if($deHashedPwd == false){
					header("Location: ../login.php?login=wrongpwd");
					exit();
				}elseif ($deHashedPwd == true){
					//Set Session variables here and login success
					$_SESSION['session_empNo']=$row['empNumber'];
					$_SESSION['session_empFirstName']=$row['empFirstName'];
					$_SESSION['session_empLastName']=$row['empLastName'];
					$_SESSION['session_empEmail']=$row['empEmail'];
					$_SESSION['session_empDepartment']=$row['empDepartment'];
					
					header("Location: ../main.php?login=success");
					exit();
				}
			}
		}
	}else{
		header("Location: ../login.php?login=error");
		exit();
	}

?>