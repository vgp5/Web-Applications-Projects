<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Update an Order </title>

<link type="text/css" rel="stylesheet" href="style4.css"/>

<?php

include("connect.php");
ini_set("display_errors", 1);

$_SESSION['IDN'] = $IDN;

if (isset($_POST['update'])){
	if (!empty($_POST['CID'])&&  !empty($_POST['ordern']) && !empty($_POST['updateO'])){
	
		$CID = $_POST['CID'];
		$ordern = $_POST['ordern'];
		$updateO = $_POST['updateO'];
		
		$orderExists = "SELECT * FROM OrderDetails WHERE ClientID = '$CID' AND OrderNumber = '$ordern' ";
		$check = mysqli_query($con, $orderExists);
		if(!$check){
			die('Error: '. mysqli_error($con));
		}
		
		if(mysqli_num_rows($check) > 0){
			
							
			$updateO = $_POST['updateO'];
			$updateQuery = "UPDATE OrderDetails SET ProductTypeQuantity = CONCAT(ProductTypeQuantity,'$updateO') WHERE OrderNumber = ' ,$ordern' ";
			$run4 = mysqli_query($con, $updateQuery) or die(mysqli_error($con));
			if($run4){
							
				echo '<script>alert("Successfully Order Updated ");</script>';
			}
			else{
				echo '<script>alert("Unsuccesful");</script>';
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
 
 
 <body>
 
<div>
<form name = "Form" class="box"  id="Form" method="post" <?php echo $_SERVER['PHP_SELF'];?> >
		
	
		

            <h1>The Art of Hair</h1>
            <h2> Update Client Order</h2>
            <p> All Fields * are required </p>
            
            
            
            
            *Client ID<input type = "text" name = "CID" placeholder="Enter ID" id="CID"  > 
            
            *Client Order Number <input type = "text" name="ordern" placeholder="Enter Order Number" id="ordern" > 
            
            *Update Order<input type = "text" name = "updateO" placeholder="Enter Item for Update" id="updateO"  >
            
            
			
			
            
            
          
			
			  <br><br>
			<input type="submit" class="submit" value = "Submit" id="update" name="update" >  </input> 
           
			
            
                    
                    
                    
                    
                    
            </form> </div>

 


 
 </body>
</html>