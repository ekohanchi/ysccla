<?php
$MERCHANT_LOGIN_ID = "4v67QKpXzeA";
$MERCHANT_TRANSACTION_KEY = "673G48xK7yg4HL5Y";

$ENV = SANDBOX;
//$ENV = PRODUCTION;

// Product Details
$itemName = "Demo Product";
$itemNumber = "PN12345";
//$itemPrice = 25;
//$donationAmount = 25;
$currency = "USD";  

// Authorize.Net API configuration
define('ANET_API_LOGIN_ID', $MERCHANT_LOGIN_ID);
define('ANET_TRANSACTION_KEY', $MERCHANT_TRANSACTION_KEY);
$ANET_ENV = $ENV; 


// class SampleCodeConstants
// {
//     //merchant credentials
//     const MERCHANT_LOGIN_ID = "4v67QKpXzeA";
//     const MERCHANT_TRANSACTION_KEY = "673G48xK7yg4HL5Y";
// }
?>