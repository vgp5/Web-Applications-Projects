<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Book an Appointment </title>

<link type="text/css" rel="stylesheet" href="style4.css"/>

<?php

include("connect.php");
ini_set("display_errors", 1);
$IDN = $_SESSION['IDN'];

if (isset($_POST['submitappoint'])){
	if (!empty($_POST['CFirst']) && !empty($_POST['CLast']) && !empty($_POST['CID'])&& !empty($_POST['Appoint']) && !empty($_POST['time'])){
		$firstC = $_POST['CFirst'];
		$lastC = $_POST['CLast'];
		$CID = $_POST['CID'];
		$Appoint = $_POST['Appoint'];
		$time = $_POST['time'];
		$random = rand();
		$bookquery = "SELECT * FROM ClientInfo WHERE FirstName ='$firstC' AND LastName = '$lastC' AND ClientID = '$CID' ";
		
		$run1 = mysqli_query($con,$bookquery) or die(mysqli_error($con));
		
		if (mysqli_num_rows($run1)> 0){
			$appointquery = "INSERT INTO AppointmentInfo(AppointmentType, DateTime, StylistID, ClientID, AppointmentID) VALUES('$Appoint','$time', '$IDN','$CID','$random')";
			$run2 = mysqli_query($con, $appointquery) or die(mysqli_error($con));
			if ($run2){
				echo '<script>alert("Successfully Submitted ");</script>';
			}
		
		
			else{
				echo '<script>alert("Not Successful");</script>';
				}	
		}
		else{
			echo '<script>alert("Client Does not exist");</script>';
		}
	}
	else{
		echo '<script>alert("All fields are required!");</script>';
		}
}

?>	

 </head>
 <body>
<div class="btn">
	<a href="home.html"><button class="button">Home</button></a>
	<a href="stylistInfo.php"><button class="button">Stylist Info</button></a>
	<a href="book.php"><button class="button">Make an Appointment</button></a>
	<a href="clientOrder.php"><button class="button">Place Order</button></a>
	<a href="update.php"><button class="button">Update Order</button></a>
	<a href="cancelAppoint.php"><button class="button">Cancel Appointment</button></a>
	<a href="cancelOrder.php"><button class="button">Cancel Order</button></a>
	<a href="createAccount.php"><button class="button">Create Client Account</button></a>
</div>  
 
	<div>
		<form name = "Form" class="box"  id="Form" method="post" <?php echo $_SERVER['PHP_SELF'];?> >
		
		
		
		
		
		
		
		
		
		
		
		

            <h1>The Art of Hair</h1>
            <h2> Create a New Client Appointment</h2>
            <p> All Fields * are required </p>
            
            
            *Client First Name<input type = "text" name ="CFirst" placeholder = "Enter First Name" id = "CFirst">
            
            *Client Last Name<input type = "text" name = "CLast" placeholder="Enter Last Name" id="CLast"  > 
            
            *Client ID<input type = "text" name = "CID" placeholder="Enter ID" id="CID"  > 
            
            *Appointment Type <input type = "text" name="Appoint" placeholder="Enter Appointment Type" id="Appoint" > 
            
            *Date and Time<input type = "text" name = "time" placeholder="Enter Date and Time" id="time"  >
            
            
            
            
          
			
			 <br><br>
			<input type="submit" value = "Submit" class="submit" id="submitappoint" name="submitappoint" >  </input> 
           
			
            
                    
                    
                    
                    
                    
            </form> </div>

 


 
</body>
</html> 