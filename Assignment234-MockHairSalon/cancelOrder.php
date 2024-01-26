<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Cancel a Client Order </title>

<link type="text/css" rel="stylesheet" href="style4.css"/>

<?php

include("connect.php");
ini_set("display_errors", 1);
$_SESSION['IDN'] = $IDN;

if (isset($_POST['cancelorder'])){
	if (!empty($_POST['CID']) && !empty($_POST['CON'])){
		
		$CID = $_POST['CID'];
		$CON = $_POST['CON'];
		
		$checkquery1 = "SELECT * FROM OrderDetails WHERE ClientID = '$CID' AND OrderNumber = '$CON' ";
		
		
		
		$run7 = mysqli_query($con,$checkquery1) or die(mysqli_error($con));
		
		if(mysqli_num_rows($run7) > 0){
			$deletequery1 = "DELETE FROM OrderDetails WHERE ClientID = '$CID' AND OrderNumber = '$CON' ";
			
			$run8 = mysqli_query($con, $deletequery1) or die (mysqli_error($con));
			
			if($run8){
				echo '<script>alert("Successfully Canceled ");</script>';
			}
			else{
				echo '<script>alert("Not Successful");</script>';
			}
		}
		else{
			'<script>alert("Order Not Found" Please Try Again");</script>';
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
 

		<form name = "Form" class="box"  id="Form" method="post" <?php echo $_SERVER['PHP_SELF'];?> >
		
		
		
		
		
		
		
		
		
		
		
		

            <h1>The Art of Hair</h1>
            <h2> Cancel an Appointment</h2>
            <p> All Fields * are required </p>
            
            
             
            
            *Client ID Number<input type = "text" name = "CID" placeholder="Enter ID" id="CID"  > 
            
            *Client Order Number<input type = "text" name="CON" placeholder="Enter Order Number" id="CON" > 
            
            
            
            
            
          
			
			  <br><br>
			<input type="submit" class="submit" value = "Submit" id="cancelorder" name="cancelorder" >  </input> 
           
			
            
                    
                    
                    
                    
                    
            </form> </div>

 


 
 </body>
</html>