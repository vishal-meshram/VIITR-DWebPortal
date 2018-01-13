<?php
	session_start();


	if(isset($_POST['submit'])){
		include "DBconn_inc.php";

		// Loop to add multiple authors into "author" table
		foreach ($_POST['email'] as $key => $value) {
			//Query to check whether the author is already present into the database
			$query = "SELECT AuthorEmail 
			          FROM   authors 
			          WHERE  AuthorEmail = '".mysqli_real_escape_string($conn,$_POST['email'][$key])."' LIMIT 1 
			         ";
			$resultSet = mysqli_query($conn,$query);
			$rows = mysqli_num_rows($resultSet);

			if($rows == 0){
				// If author is not present then isnert the record

				// Query to insert values into authors table	
				$query = "INSERT INTO authors(AuthorId, AuthorFirstName, AuthorLastName, AuthorEmail, AuthorType, 
			          AuthorDepartment) VALUES ('" 
			          							. mysqli_real_escape_string($conn,intval($_POST['empid'][$key])). 
			          							"','" 
			          							. mysqli_real_escape_string($conn,$_POST['firstname'][$key]).
			          							"','" 
			          							. mysqli_real_escape_string($conn,$_POST['lastname'][$key]).
			          							"','" 
			          							. mysqli_real_escape_string($conn,$_POST['email'][$key]).
			          							"','" 
			          							. mysqli_real_escape_string($conn,$_POST['author_type'][$key]).
			          							"','" 
			          						.     mysqli_real_escape_string($conn,$_POST['author_department'][$key]). "')
										  		" ;
				//execute the query		 
				$insert = mysqli_query($conn,$query);
				//check if record is inserted successfully if not return on papers page with error	
				if(!$insert){
					header("Location: ../publication.php?paper=errorauthortable");
					exit();
				}
			} // end of IF condition

		} //end of for..each loop
	
		//Now enter the data into journal table and into publication table

		$presentedAt = mysqli_real_escape_string($conn,$_POST['location']);
		$journalName = mysqli_real_escape_string($conn,$_POST['journalname']);
		$journalNumber = intval(mysqli_real_escape_string($conn,$_POST['journalnumber']));
		$impactFactor = floatval(mysqli_real_escape_string($conn,$_POST['impactfactor']));
		$confLocation = mysqli_real_escape_string($conn,$_POST['conflocation']);
		$Unpaid = mysqli_real_escape_string($conn,$_POST['unpaid']);
		$journalType = mysqli_real_escape_string($conn,$_POST['journaltype']);

		$paperTitle = mysqli_real_escape_string($conn,$_POST['papertitle']);
		$noOfPages = intval(mysqli_real_escape_string($conn,$_POST['noofpages']));
		$issueNo = intval(mysqli_real_escape_string($conn,$_POST['issueno']));
		$volumeNo = intval(mysqli_real_escape_string($conn,$_POST['volumeno']));
		$publicationDate = mysqli_real_escape_string($conn,$_POST['publicationdate']);
		$paperId = 'a';
/*
		echo "  presentedAt: ",$presentedAt;
		echo "  journalName: ",$journalName;
		echo "  journalNumber: ",$journalNumber;
		echo "  impactfactor: ",$impactFactor;
		echo "  conflocation: ",$confLocation;
		echo "  Unpaid: ",$Unpaid;
		echo "  journalType: ",$journalType;
	*/	
		//error handling
		//chcking Empty fields
		
		if(empty($presentedAt) || empty($journalName) || empty($journalNumber) || empty($impactFactor) || empty($confLocation) ||empty($Unpaid) || empty($journalType) || empty($paperTitle) || empty($noOfPages) || empty($issueNo) || empty($volumeNo) ||empty($publicationDate)){
					header("Location: ../publication.php?paper=empty");
					exit();
		}else{
				//checking for invalid future date
				$date=date('d-m-Y');
				if(strtotime($publicationDate) > strtotime($date)){
					header("Location: ../publication.php?paper=invaliddate");
					exit();		
			 	}else{
						// First check whether the Journal is already in the table
						$query = "SELECT JournalNumber 
			          			  FROM   journals 
			          			  WHERE  JournalNumber = '$journalNumber' LIMIT 1 ";
						$resultSet = mysqli_query($conn,$query);
						$rows = mysqli_num_rows($resultSet);

						// If journal is not present then only insert the record
						if($rows == 0){
							//query to insert the journal in the table
							$sql = "INSERT INTO journals (PaperPublishedAt, JournalName, JournalNumber,  
							           JournalImapctFactor, ConfLocation, JournalPaid, JournalType) 
									VALUES ('$presentedAt','$journalName','$journalNumber','$impactFactor',
									   '$confLocation','$Unpaid','$journalType')
								   ";

									$result=mysqli_query($conn,$sql);

									if(!$result) {
										header("Location: ../publication.php?paper=errorjournaltable");
										exit();
									}
						} // End of IF condition of checking journal is present or not

						//Logic to create paperId: uploaded date & time attached with email
						$d =  date("d-m-Y-G-i-s"); //capture date & time 
						$useremail = $_SESSION['session_empEmail']; 
						//Create a paper ID using users email and papername
						$paperId = $useremail.$d; //concat email and date
						
						//Code to upload a file	
						$firstName = $_SESSION['session_empFirstName'];
						$lastName = $_SESSION['session_empLastName'];
						$dept = $_SESSION['session_empDepartment'];

						$temp = $firstName.".".$lastName."/";
						$path = "C:/Users/Vishal/Desktop/users/"."$dept"."/";	
						$target = $path.$temp; //$target is the location where we are going o store the document

						//echo "Target path to store file on disk",$target;

						$filename = $_FILES['FileUpload']['name'];	//read the file name from form	

						//echo "The Name of the file is",$filename; 
						$filetempname = $_FILES['FileUpload']['tmp_name'];
						$fileTarget = $target.$filename;
						$result=move_uploaded_file($filetempname, $fileTarget);

						//converting date format from javascript to mysql							
						$date_field=date('Y-m-d',strtotime($publicationDate));
						
						/*
						echo "Printing date after conversion",$date_field;
						echo " paperId: ",$paperId;
						echo " paperTitle: ",$paperTitle;
						echo " noofpages: ",$noOfPages;
						echo " issueNo: ",$issueNo;
						echo " date_field: ";$publicationDate;
						echo " pub_paperPath: ";$target;
						echo " filename: ";$filename;*/

						$sql = "INSERT INTO publications (pub_publicationId, pub_paperTitle, pub_noOfPages, 
								pub_issueNo, pub_volumeNo, pub_publicationDate, pub_paperPath,pub_paperSoftCopy)
								VALUES ('$paperId','$paperTitle','$noOfPages','$issueNo','$volumeNo',
										'$date_field','$target','$filename')";

						$result=mysqli_query($conn,$sql);

						if(!$result) {
								//die(mysqli_error());
								header("Location: ../publication.php?paper=errorpapertable");
								exit();
						}

						//Inserting records into the Relation table
						foreach ($_POST['email'] as $key => $value) {

							$query = " INSERT INTO authorsjournalpub(AuthorEmail, JournalId, pub_publicationId) 
				           				VALUES ('".mysqli_real_escape_string($conn,$_POST['email'][$key])."',
			          			 		'$journalNumber','$paperId')
						 			 " ;
							//execute the query		 
							$insert = mysqli_query($conn,$query);

							if(!$insert) {
								//die(mysqli_error());
								header("Location: ../publication.php?paper=errorrelationtable");
								exit();
							}
						}

						header("Location: ../publication.php?paper=sucess");
						exit();
				}
			}// end of ELSE condition of inserting records into journal and paper tables

	}else{
			header("Location: ../publication.php?paper=error");
			exit();
	 	}
?>