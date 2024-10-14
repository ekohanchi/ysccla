<?php
$TEST = true;

if ($TEST) {
    $ENV = "SANDBOX";
    $MERCHANT_LOGIN_ID = "";
    $MERCHANT_TRANSACTION_KEY = "";
    
    $googleCaptcha_sitekey = "";
    $googleCaptcha_secretkey = "";
} else {
    $ENV = "PRODUCTION";
    $MERCHANT_LOGIN_ID = "";
    $MERCHANT_TRANSACTION_KEY = "";
    
    $googleCaptcha_sitekey = "";
    $googleCaptcha_secretkey = "";
}

$currency = "USD";

// Authorize.Net API configuration
define('ANET_API_LOGIN_ID', $MERCHANT_LOGIN_ID);
define('ANET_TRANSACTION_KEY', $MERCHANT_TRANSACTION_KEY);

$ANET_ENV = $ENV;

?>
