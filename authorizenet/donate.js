function ShowHideFreq(reset) {
	var chkYes = document.getElementById("frequency");
	var frequency = document.getElementById("freq");
	frequency.style.display = chkYes.checked ? "block" : "none";
	// if recurringSelected element is not found and not set to true, then the value for recurringMonths will be cleared
	var recurringSelected = document.getElementsByName("recurringSelected")[0].value;
	if (recurringSelected != true) {
		document.getElementById("recurringMonths").value = "";
		document.getElementById('foreverRecurring').checked = false;
	}
}

function EnableOtherAmount() {
	document.getElementsByName('RadioAmount')[11].checked = true;
}

function addqty(field, qtyfield) {
	if (document.getElementById(field).checked) {
		document.getElementById(qtyfield).value = "1";
	} else {
		document.getElementById(qtyfield).value = "0";
	}
}
function postSubmission() {
	if (verifyAmount() == false) {
		return false;;
	} else if (verifyNonEmptyRecMonthCount() == false) {
		return false;;
	} else if (verifyCC() == false) {
		return false;
	} else if (verifyCVV() == false) {
		return false;
	} else if (verifyPhone() == false) {
		return false;
	} else if (verifyEmail() == false) {
		return false;
	}
	collectPurpose();
}

function addDotToAmount() {
	var amount =  document.getElementById("AmountId").value;
	if (!(amount .includes('.'))) {
		document.getElementById("AmountId").value = amount.concat('.00');
	}
}

function verifyAmount() {
	var isChecked = false;
	var amount = 0;
	amount = document.getElementById("AmountId").value;
	if (!(Boolean(amount > 0))) {
		alert("Enter a value amount & make sure it is greater than 0.00. Current amount value is set to: "
				+ amount);
		return false;
	}

}
function verifyRadioAmount() {
	// Check to see if an amount is selected, set the amount value
	var ischecked = false;
	var amount = 0;
	var radios = document.getElementsByName('RadioAmount');
	for (var i = 0, length = radios.length; i < length; i++) {
		if (radios[i].checked) {
			ischecked = true;
			amount = radios[i].value;
			if (amount == "other") {
				amount = document.getElementById("OtherAmountId").value;
			}
			break;
		}
	}

	if (!(Boolean(ischecked) && Boolean(amount > 0))) {
		alert("Enter a value amount & make sure it is greater than 0.00. Current amount value is set to: "
				+ amount);
		return false;
	}
	document.getElementsByName("UMamount")[0].value = amount;
	// console.log("value: " + document.getElementsByName("UMamount")[0].value)
}
function verifyPhone() {
	// Check to see if a phone number is entered
	if (document.getElementsByName("UMbillphone")[0].value == '') {
		alert("Enter a phone number");
		return false;
	}
	// Check to see if entered phone number is valid
	/*
	 * var rePhone = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g; var sPhone =
	 * document.getElementsByName("UMbillphone")[0].value;
	 * if(!sPhone.match(rePhone)) { alert("Enter a valid phone number"); return
	 * false; }
	 */
}
function verifyEmail() {
	// Check to see if an email address is entered
	if (document.getElementById("UMemail").value == '') {
		alert("Enter an email address");
		return false;
	}
	// Check to see if entered email address is valid
	var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
	var sEmail = document.getElementById("UMemail").value;
	if (!sEmail.match(reEmail)) {
		alert("Enter a valid email address");
		return false;
	}
}
function verifyCC() {
	// Check to see if CVV number is entered
	if (document.getElementsByName("card_number")[0].value == '') {
		alert("Enter a number for CC");
		return false;
	}

	var regexCVV = new RegExp("^[0-9]+$");
	var CVV = document.getElementsByName("card_number")[0].value;
	if (!regexCVV.test(CVV)) {
		alert("Enter a valid number for CC");
		return false;
	}
}
function verifyCVV() {
	// Check to see if CVV number is entered
	if (document.getElementsByName("card_cvc")[0].value == '') {
		alert("Enter a number for CC CVV");
		return false;
	}

	var regexCVV = new RegExp("^[0-9]+$");
	var CVV = document.getElementsByName("card_cvc")[0].value;
	if (!regexCVV.test(CVV)) {
		alert("Enter a valid number for CC CVV");
		return false;
	}
}
function collectPurpose() {
	var purpose_array = [];
	var purposes = document.getElementsByName('purpose');
	var nr_purposes = purposes.length;
	for (var i = 0; i < nr_purposes; i++) {
		if (purposes[i].checked == true) {
			purpose_array.push(purposes[i].value + " ");
		}
	}
	document.getElementsByName("purposeCollection")[0].value = purpose_array;
}
function verifyNonEmptyRecMonthCount() {
	var recurringSelected = document.querySelector('input[name="frequency"]:checked').value
	if (recurringSelected == "Recurring") {
		var value = document.getElementById('recurringMonths').value;
		if(!value.match(/\S/)) {
	        alert ('There must be a value set for the number of recurring months.');
	        return false;
		} else if(value == "0") {
			alert ('The value set for the number of recurring months must be greater than 0.');
			return false;
	    } else {
	        return true;
	    }
	} else {
		return true;
	}
}

function setRecurringToOngoing() {
	var foreverRec = document.getElementById('foreverRecurring').checked;
	if (foreverRec) {
		document.getElementById('recurringMonths').value = "9999";
		document.getElementById('recurringMonths').readOnly = true;
	} else {
		document.getElementById('recurringMonths').value = "";
		document.getElementById('recurringMonths').readOnly = false;
	}
}
var populateValues = function() {
	var now = new Date().valueOf();
	document.getElementsByName("UMinvoice")[0].value = now;
}
window.onload = populateValues;
