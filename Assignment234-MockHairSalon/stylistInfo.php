<?php
session_start();
?>

<html>
<head>
<title> Stylist Data </title>
<meta charset = "utf-8" />
<link type="text/css" rel="stylesheet" href="style4.css"/>
<style type = "text/css">
	table {
		
		font-family: monospace;
		text-align: center;
		
		
		margin-left: auto;
		margin-right: auto;
		}
	th,tr{
		color:black;
		border-style: solid;
		text-align: center;
	}

	
</style>
</head>
<body>
 <div class="btn">
	<a href="https://web.njit.edu/~vgp5/home.html"><button class="button">Home</button></a>
	<a href="https://web.njit.edu/~vgp5/stylistInfo.php"><button class="button">Stylist Info</button></a>
	<a href="https://web.njit.edu/~vgp5/book.php"><button class="button">Make an Appointment</button></a>
	<a href="https://web.njit.edu/~vgp5/clientOrder.php"><button class="button">Place Order</button></a>
	<a href="https://web.njit.edu/~vgp5/update.php"><button class="button">Update Order</button></a>
	<a href="https://web.njit.edu/~vgp5/cancelAppoint.php"><button class="button">Cancel Appointment</button></a>
	<a href="https://web.njit.edu/~vgp5/cancelOrder.php"><button class="button">Cancel Order</button></a>
	<a href="https://web.njit.edu/~vgp5/createAccount.php"><button class="button">Create Client Account</button></a>
</div> 
 
 
 <br><br>
 <table>
	<th> Stylist First Name </th>
	<th> Stylist Last Name </th>
	<th> Stylist ID  </th>
	<th> Stylist Phone Number </th>
	<th> Stylist Email </th>
	<th> Client First Name </th>
	<th> Client Last Name </th>
	<th> Client ID  </th>
	<th> Appointment Type </th>
	<th> Date and Time </th>
	<th> Appointment ID </th>
	<th> Product </th>
	<th> Shipping Address  </th>
	<th> Order Number </th>
	
 
 </table>
 
 <?php
	
    
	include('connect.php');
	ini_set("display_errors",1);
	
    $IDN = $_SESSION['IDN'];
	
	$sql = "SELECT s.FirstName, s.LastName, s.IDN, s.PhoneNumber, s.EmailAddress, c.FirstName, c.LastName, c.ClientID, a.AppointmentType, a.DateTime, a.AppointmentID, o.ProductTypeQuantity, o.ShippingAddress, o.OrderNumber FROM OrderDetails o JOIN StylistRecords s ON o.StylistID = s.IDN JOIN ClientInfo c ON o.ClientID = c.ClientID JOIN AppointmentInfo a ON o.AppointmentID = a.AppointmentID WHERE s.IDN = '".$IDN."'";
	$result = mysqli_query($con, $sql) or die (mysqli_error($con));
		
	echo '<table>';
	while ($row = mysqli_fetch_array($result){
		echo "<tr><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["PhoneNumber"]."</td><td>". $row["EmailAddress"] . "</td><td>" . $row["FirstName"] . "</td> <td>" . $row["LastName"] . "</td><td>" . $row["ClientID"] . "</td><td>" . $row["AppointmentType"] . "</td> <td>" . $row["DateTime"] . "</td> <td>" . $row["AppointmentID"] . "</td><td>" . $row["ProductTypeQuantity"] . "</td><td>" . $row["ShippingAddress"] . "</td><td>" . $row["OrderNumber"] . "</td></tr>";
			
	}
	echo '</table>';
   
?>


</body>
</html> 



