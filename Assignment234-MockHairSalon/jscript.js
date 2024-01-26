


function Validate(){
	
    
    
	
	var firstName = document.getElementById("First");
    var lastName = document.getElementById("Last");
    var passWord = document.getElementById("PassWord");
    var iDN = document.getElementById("IDN");
    var phoneN = document.getElementById("phone");
    var eMail = document.getElementById("mail");
	var transaction = document.getElementById("transc");
	
    
	var fnRegEx = /^[a-zA-Z]*$/;
    var lnRegEx = /^[a-zA-Z]*$/;
    var pwRegEx = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{1,10}$/;
    var iDNRegEx = /^[0-9]{8}$/;
    var phoneRegEx = /^(\+0?1\s)?\(?\d{3}\)?[\-]?\d{3}[\-]?\d{4}$/;
    var emailRegEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,5}))$/;

    var fnRes = fnRegEx.test(firstName.value);
    if (fnRes == false || firstName.value == ""||firstName.value == null) {
        alert("Please enter your valid first name that consists of only letters");
		firstName.style.borderColor= "red";
		
		return false;
			
        }
    var lnRes = lnRegEx.test(lastName.value);
    if(lnRes==false||lastName.value == ""||lastName.value == null){
        alert("Please enter your valid last name that consists of only letters ");
		lastName.style.borderColor= "red";
		
		return false;
    }

    var pwRes = pwRegEx.test(passWord.value);
    if(pwRes == false||passWord.value == ""||passWord.value == null){
        alert("Please enter a valid password. A valid password contains of ten characters including at least one uppercase and lowercase letter, at least one special character and at least one digit. ");
		passWord.style.borderColor="red";
		return false;
    }
    

    var idRes = iDNRegEx.test(iDN.value);
    if (idRes==false||iDN.value==""||iDN.value == null){
        alert("Please enter Valid Stylist ID# that consists of exatly 8 digits ");
        iDN.style.borderColor="red";
		return false;
    }
	
	var phoneRes = phoneRegEx.test(phoneN.value);
	if (phoneRes == false || phoneN.value== ""|| phoneN.value==null){
		alert("Please enter a valid phone number with 10 digits that can be in form of either XXX-XXX-XXXX or XXXXXXXXXX");
		phoneN.style.borderColor="red";
		return false;
	}
	
	var eRes = emailRegEx.test(eMail.value);
	if (eRes == "" && EmailCon.checked){
		alert("Please enter an email");
		eMail.style.borderColor="red";
		return false;	
	}
	else if(eRes== false && EmailCon.checked){
		alert('Please enter a valid email');
		
		return false;
	}
	if(transaction.value == 'Choose a transaction'){
		alert('Please select a transaction');
		return false;
	}
	
	if (verification(firstName.value, lastName.value, passWord.value, iDN.value)){
		alert('Welcome to The Art of Hair, ' + firstName.value + ' ' + lastName.value + ' You selected: ' + transaction.value);
		return true;
		} 	
		
}





function verification(firstNamev, lastNamev,passWordv,iDNv){
	
	let accounts =[ ['Vashu', 'Patel', 'V@shu7', '31511101'], 
	 ['Ethan', 'Hunt', 'Ehunt&7', '22212234'] ,
	 ['Sherlock', 'Holmes', '$herl0cked', '12345678'] ,
	  ['Cristiano', 'Ronaldo', 'G0@t', '07107070'],
	  ['Sheldon', 'Cooper', 'S#eld0n', '78978978'],
	['KellyJann', 'Pateel', 'KellJ4n$', '11400301'] ]
		
	for(i = 0; i < accounts.length; i++){
		if(accounts[i][0] == firstNamev && accounts[i][1] == lastNamev && accounts[i][2] == passWordv && accounts[i][3] == iDNv.toString()){
			
			return true;
			}
		
		} 
	
	return false;
}

	
	

	
	






   
    