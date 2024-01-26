<!DOCTYPE html>
<html lang = "en">
 <head>
 <title> Stylist Database </title>
 <meta charset = "utf-8" />
 
 <style>
body 
{
    background-image: url("hairsal.jpg");
	background-size: cover;
	margin: 0;
    padding: 0;
	justify-content: center;
    font-family: cursive;
	color: white;
  
	
}
table, th, td {
	border:1px solid goldenrod;
	margin-left:auto;
	margin-right:auto; 
	background-color: 
	black; width:50%;
	
	
}
#Home {
	display:flex;
	justify-content: center;
	background: black;
    margin-left: auto;
	margin-right: auto;
    text-align: center;
    border: 3px solid darkgoldenrod;
    padding: 14px 10px;
    color: white;
	font-size: 20px;
    border-radius: 45px; 
	text-align: center;
	width: 200px;
    height: 100px;
}

input#Home:hover {
	background: darkgoldenrod;
}
 </style>
 
 
 
 </head>
 <body>
  
 <table> 
	<th>  First Name </th>
	<th>  Last Name </th>
	<th>  Password </th>
	<th>  Stylist ID </th>
	<th>  Phone Number </th>
	<th>  Email Address </th>
 <?php
// Connect to MySQL
//Makes DB connection
$servername = "sql1.njit.edu";
$username = "vgp5";
$password = "N@irobi555";
$dbname = "vgp5";
$con = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_error())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * FROM StylistRecords";
$result = $con-> query($sql);

if ($result->num_rows > 0){
	while ($row = $result-> fetch_assoc()){
		echo "<tr><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["Password"] . "</td><td>" . $row["IDN"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["EmailAddress"] . "</td></tr>";
	}
}	
else{
	echo "No results";
}
$con-> close();
 ?>
 </table>
 <br><br>
 <form action = "https://web.njit.edu/~vgp5/Assignment3.html" method = "post" >
				<input type = "submit" value = "Home" id = "Home"/>	
			</form>
 </body>
</html>