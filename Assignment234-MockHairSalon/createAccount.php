<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Create a Client Account </title>

<link type="text/css" rel="stylesheet" href="style4.css"/>

<?php

include("connect.php");
ini_set("display_errors", 1);
$_SESSION['IDN'] = $IDN;

if (isset($_POST['createaccount'])){
	if (!empty($_POST['CFirst']) && !empty($_POST['CLast']) && !empty($_POST['CID'])){
		$firstC = $_POST['CFirst'];
		$lastC = $_POST['CLast'];
		$CID = $_POST['CID'];
		
		$checkquery3 = "SELECT * FROM ClientInfo WHERE FirstName = '$firstC' AND LastName = '$lastC' AND ClientID = '$CID' ";
		
		$run8 = mysqli_query($con,$checkquery3) or die(mysqli_error($con));
		
		if (mysqli_num_rows($run8) > 0){
			echo '<script>alert("Account already exists");</script>';
		
				
		}
		else{
			
			$createQ = "INSERT INTO ClientInfo(FirstName, LastName, ClientID) VALUES('$firstC','$lastC','$CID')";
		
			$run9 = mysqli_query($con,$createQ) or die(mysqli_error($con));
	
			if($run9){
				echo '<script>alert("Successfully Created ")</script>';
			}
			else{
				echo '<script>alert("Not Successful")</script>';
				}
		}
	}
	else{
		echo '<script>alert("All fields are required!")</script>';
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
            
            
            
            
            
            
          
			
			  <br><br>
			<input type="submit" class="submit" value = "Submit" id="createaccount" name="createaccount" >  </input> 
           
			
            
                    
                    
                    
                    
                    
            </form> </div>

 


 
 </body>
</html>