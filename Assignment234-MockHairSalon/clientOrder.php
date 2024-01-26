<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Place an Order </title>

<link type="text/css" rel="stylesheet" href="style4.css"/>

<?php

include("connect.php");
ini_set("display_errors", 1);
$_SESSION['IDN'] = $IDN;


if (isset($_POST['submitappoint'])){
	if (!empty($_POST['CFirst']) && !empty($_POST['CLast']) && !empty($_POST['CID'])&& !empty($_POST['AppointID']) && !empty($_POST['order']) && !empty($_POST['ship'])){
		$firstC = $_POST['CFirst'];
		$lastC = $_POST['CLast'];
		$CID = $_POST['CID'];
		$AppointID = $_POST['AppointID'];
		
		
		$clientCheck = "SELECT * FROM ClientInfo WHERE FirstName = '$firstC' AND LastName = '$lastC' AND ClientID = '$CID' ";
		
		$run1 = mysqli_query($con,$clientCheck) or die(mysqli_error($con));
		
		if(mysqli_num_rows($run1) > 0) {
			$appointCheck = "SELECT AppointmentID FROM AppointmentInfo WHERE AppointmentID ='$AppointID' ";
			$run2 = mysqli_query($con, $appointCheck) or die(mysqli_error($con));
			if(mysqli_num_rows($run2)>0) {
			
				$order = $_POST['order'];
				$ship = $_POST['ship'];
				$orderN = rand();
				$queryadd = "INSERT INTO OrderDetails(ProductTypeQuantity, Shipping Address,OrderNumber, StylistID,ClientID,AppointmentID) VALUES('$order', '$ship', '$orderN','$IDN','$CID','AppointID') ";	
				$run3 = mysqli_query($con, $queryadd) or die(mysqli_error($con));
				if($run3){
					echo '<script>alert("Successfully Order Placed ");</script>';
				}
				else{
					echo '<script>alert("Unsuccesful");</script>';
					}
			}
			else{
				echo '<script>alert("Please make an appointment");</script>';
				header("location:book.php");
			}
				
		}
		
		else{
			echo '<script>alert("Client not found");</script>';
			}
	}
	else{
		echo '<script>alert("All fields are required");</script>';
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
            <h2> Place a New Client Order</h2>
            <p> All Fields * are required </p>
            
            
            *Client First Name<input type = "text" name ="CFirst" placeholder = "Enter First Name" id = "CFirst">
            
            *Client Last Name<input type = "text" name = "CLast" placeholder="Enter Last Name" id="CLast"  > 
            
            *Client ID<input type = "text" name = "CID" placeholder="Enter ID" id="CID"  > 
            
            *Appointment ID <input type = "text" name="AppointID" placeholder="Enter Appointment ID" id="AppointID" > 
            
            *Product Order<input type = "text" name = "order" placeholder="Enter Date and Time" id="order"  >
            
            *Shipping Address<input type = "text" name = "ship" placeholder="Enter a shipping address" id="ship" >
			
			
            
            
          
			
			  <br><br>
			<input type="submit" class="submit" value = "Submit" id="submitorder" name="submitorder" >  </input> 
           
			
            
                    
                    
                    
                    
                    
            </form> </div>

 


 
 </body>
</html>