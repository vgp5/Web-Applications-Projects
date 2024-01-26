<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Cancel an Appointment </title>

<link type="text/css" rel="stylesheet" href="style4.css"/>

<?php

include("connect.php");
ini_set("display_errors", 1);
$_SESSION['IDN'] = $IDN;

if (isset($_POST['cancelappoint'])){
	if (!empty($_POST['CID']) && !empty($_POST['AppointID'])){
		
		$CID = $_POST['CID'];
		$AppointID = $_POST['AppointID'];
		
		$checkAppoint = "SELECT * FROM AppointmentInfo WHERE ClientID = '$CID' AND AppointmentID = '$AppointID' ";
		
		$run5 = mysqli_query($con, $checkAppoint) or die(mysqli_error($con));
		if (mysqli_num_rows($run5) > 0){
			
		
			$deletequery = "DELETE FROM AppointmentInfo WHERE ClientID = '$CID' AND AppointmentID = '$AppointID' ";
			$run6 = mysqli_query($con,$deletequery) or die(mysqli_error($con));
			
			if($run6){
				echo '<script>alert("Successfully Canceled ");</script>';
			}
			else{
				echo '<script>alert("Not Successful");</script>';
				}	
		}
		else{
			echo '<script>alert("No Appointment or Client ID Found");</script>';
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
            <h2> Cancel An Appointment</h2>
            <p> All Fields * are required </p>
            
            
             
            
            *Client ID Number<input type = "text" name = "CID" placeholder="Enter ID" id="CID"  > 
            
            *Appointment ID <input type = "text" name="AppointID" placeholder="Enter Appointment ID" id="AppointID" > 
            
            
            
            
            
          
			
			  <br><br>
			<input type="submit" class="submit" value = "Submit" id="cancelappoint" name="cancelappoint" >  </input> 
           
			
            
                    
                    
                    
                    
                    
            </form> </div>

 

 
 </body>
</html>