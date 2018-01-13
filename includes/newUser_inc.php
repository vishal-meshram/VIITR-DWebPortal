<?php

	if(isset($_POST['register'])) {
		include 'DBconn_inc.php';

		$EmpId = mysqli_real_escape_string($conn,$_POST['signup_empid']);
		$EmpFirstname = mysqli_real_escape_string($conn,$_POST['signup_firstname']);
		$EmpLastname = mysqli_real_escape_string($conn,$_POST['signup_lastname']);
		$EmpEmail = mysqli_real_escape_string($conn,$_POST['signup_email']);
		$EmpDept = mysqli_real_escape_string($conn,$_POST['signup_department']);
		$EmpPassword = mysqli_real_escape_string($conn,$_POST['signup_password']);

		//echo $EmpId." ".$EmpFirstname." ".$EmpLastname." ".$EmpEmail." ".$EmpDept." ".$EmpPassword;

		//Error Handlers
		//Check for empty fields
		
		if(empty($EmpId) || empty($EmpFirstname) || empty($EmpLastname) || empty($EmpEmail) || empty($EmpDept) || empty($EmpPassword)  ){
				header("Location: ../login.php?signup=empty");
				exit();
		}else {
			  // check if input characters are valid
				if(!preg_match("/^[a-zA-z]*$/", $EmpFirstname) || !preg_match("/^[a-zA-z]*$/", $EmpLastname)) {
					header("Location: ../login.php?signup=invalid");
					exit();
				}else{
					//check for email
					// Remove all illegal characters from email
					if (!filter_var($EmpEmail, FILTER_VALIDATE_EMAIL)){
						header("Location: ../login.php?signup=invalidemail");
						exit();
					}else{


							//Code to create a folder of name firstname.lastname

							//create file name first
							$filename=$EmpFirstname.".".$EmpLastname;
							$path="C:/Users/Vishal/Desktop/users/".$EmpDept."/".$filename;
							if(!is_dir($path)) {
								//Directory doesnt exists so create it..
								mkdir($path,0777,true);
							}

							// check user is already present
							$sql = "SELECT * FROM users WHERE EmpId='$EmpId'";
							$result = mysqli_query($conn,$sql);
							$resultcheck=mysqli_num_rows($result);

							if($resultcheck > 0){
							header("Location: ../login.php?signup=userpresent");
							exit();
							}else{
								// hashing the password
								$hashPwd = password_hash($EmpPassword, PASSWORD_DEFAULT);
								// Insert the user into the Database
								$sql = "INSERT INTO users(empNumber, empFirstName, empLastName, empEmail, empDepartment,  empPassword) VALUES ('$EmpId','$EmpFirstname','$EmpLastname','$EmpEmail','$EmpDept','$hashPwd'); ";

								$result = mysqli_query($conn,$sql);
								header("Location: ../login.php?signup=success");
								exit();
							}
					}
				}
		}
	}else{
		header("Location: ../login.php?signup=error");
		exit();
	}
?>