

<html>
<head>
<title> HOME </title>
<link type="text/css" rel="stylesheet" href="style4.css"/>
</head>

<body>
<?php

ini_set("display_errors", 1);
include("connect.php");

$first = $_POST['First'];
$last = $_POST['Last'];
$IDN = $_POST['IDN'];
$phone = $_POST['phone'];
$pass = $_POST['PassWord'];
$transc = $_POST['transc'];

$query = "SELECT * FROM StylistRecords WHERE FirstName = '$first' AND LastName = '$last' AND IDN = '$IDN' AND Password = '$pass' ";
$sql = mysqli_query($con, $query);
if(!$sql){
	die('Error: '. mysqli_error($con));
}
if(mysqli_num_rows($sql) > 0){
	if(isset($transc)&& $transc == "Search A Stylist's Account"){
		session_start();
		$_SESSION['IDN'] = $IDN;
		header("location: stylistInfo.php");
	}
	if(isset($transc)&& $transc == "Book a Client Appointment"){
		session_start();
		$_SESSION['IDN'] = $IDN;
		header("location: book.php");
	}
	if(isset($transc)&& $transc == "Place A Client's Order"){
		session_start();		
		$_SESSION['IDN'] = $IDN;
		header("location: clientOrder.php");
	}
	if (isset($transc) && $transc == "Update's a Client's Order"){
		session_start();
		$_SESSION['IDN'] = $IDN;
		header("location: update.php");
	}
	if (isset($transc) && $transc == "Cancel a Client's Appointment"){
		$_SESSION['IDN'] = $IDN;
		header("locaation: cancelAppoint.php");
	}
	if (isset($transc) && $transc == "Cancel a Client's Order"){
		$_SESSION['IDN'] = $IDN;
		header("location: cancelOrder.php");
	}
	if (isset($transc) && $transc == "Create a New Client's Account"){
		$_SESSION['IDN'] = $IDN;
		header("location: createAccount.php");
	}
		
	
	
	else{
		echo("error");
	}

}
else{
	echo '<script>alert("please enter correct information");</script>';
}



?>

 

	
 
</body>
</html>