<?php
	session_start();
    include "includes/DBconn_inc.php";
/*
$_SESSION['session_empEmail']="vishal.meshram@viit.ac.in";


//code to get all values from user table
$sql = "SELECT * FROM users WHERE empEmail='".$_SESSION['session_empEmail']."' ";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
$id = $row['empNumber'];
$firstname = $row['empFirstName'];
$lastname = $row['empLastName'] ;
$email = $row['empEmail'];
$department = $row['empDepartment'];



echo " $id ->".$id." $firstname -> ".$firstname." $lastname -> ".$lastname."$email ->".$email." $department  ".$department ;*/
$email=$_SESSION['session_empEmail'];
echo $email;

	$sql="SELECT a.AuthorFirstName,a.AuthorLastName,c.pub_paperTitle,c.pub_publicationDate, b.JournalName,b.JournalNumber,b.JournalType FROM authorsjournalpub d INNER JOIN authors a ON d.AuthorEmail=a.AuthorEmail INNER JOIN journals b ON d.JournalId=b.JournalNumber INNER JOIN publications c ON d.pub_publicationId=c.pub_publicationId WHERE a.AuthorEmail='$email' 
		  ";

	$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
			echo $row['AuthorFirstName']."    ";
			echo $row['AuthorLastName']."     ";
			echo $row['pub_paperTitle']."      ";
			echo $row['pub_publicationDate']."      ";

		}
	

?>