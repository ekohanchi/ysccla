function ShowHideFreq(reset) {
	var chkYes = document.getElementById("frequency");
    var frequency = document.getElementById("freq");
    frequency.style.display = chkYes.checked ? "block" : "none";
    if (Boolean(reset)) {
    	document.getElementById("idUMschedule").selectedIndex=0;
    	document.getElementsByName("UMstart")[0].value="";
    	document.getElementsByName("UMnumleft")[0].value="";
    	
    }
}

function EnableOtherAmount() {
	document.getElementsByName('RadioAmount')[11].checked=true;
}

function addqty(field, qtyfield) {
    if(document.getElementById(field).checked) {
        document.getElementById(qtyfield).value="1";
    } else {
        document.getElementById(qtyfield).value="0";
    }
 }
 function postSubmission() {	 
	 if (verifyAmount() == false) {
		 return false;
	 } else if (verifyPhone() == false) {
		 return false;
	 } else if (verifyEmail() == false) {
		 return false;
	 }
	 collectPurpose();
 }

 function verifyAmount() {	 
	    // Check to see if an amount is selected, set the amount value
	    var ischecked=false;
	    var amount=0;
	    var radios = document.getElementsByName('RadioAmount');
	    for (var i = 0, length = radios.length; i < length; i++) {
	       if (radios[i].checked) {
	           ischecked=true;
	           amount=radios[i].value;
	           if (amount=="other") {
	                amount=document.getElementById("OtherAmountId").value;
	           }
	           break;
	       }
	    }
	    
	    if (!(Boolean(ischecked) && Boolean(amount>0))) {
	        alert("Enter a value amount & make sure it is greater than 0.00. Current amount value is set to: " + amount);
	        return false;
	    }
	    document.getElementsByName("UMamount")[0].value = amount;
	    //console.log("value: " + document.getElementsByName("UMamount")[0].value)
 }
 function verifyPhone() {
	 // Check to see if a phone number is entered
	 if(document.getElementsByName("UMbillphone")[0].value =='') {
	        alert("Enter a phone number");
	        return false;
	 }
	 // Check to see if entered phone number is valid
	 /*var rePhone = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
	 var sPhone = document.getElementsByName("UMbillphone")[0].value;
	 if(!sPhone.match(rePhone)) {
	        alert("Enter a valid phone number");
	        return false;
	 }*/
 }
 function verifyEmail() {
	    // Check to see if an email address is entered
	    if(document.getElementById("UMemail").value =='') {
	        alert("Enter an email address");
	        return false;
	    }
	    // Check to see if entered email address is valid
	    var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
	    var sEmail = document.getElementById("UMemail").value;
	    if(!sEmail.match(reEmail)) {
	        alert("Enter a valid email address");
	        return false;
	    }
}
 function collectPurpose() {
	 var purpose_array = [];
	 var purposes = document.getElementsByName('purpose');
	 var nr_purposes = purposes.length;
	 for (var i=0; i<nr_purposes; i++) {
		 if(purposes[i].checked == true) {
			 purpose_array.push(purposes[i].value + " ");
		 }
	 }
	 document.getElementsByName("purposeCollection")[0].value = purpose_array;
 }
 var populateValues = function() {
    var now = new Date().valueOf();
    document.getElementsByName("UMinvoice")[0].value = now;
 }
 window.onload=populateValues;