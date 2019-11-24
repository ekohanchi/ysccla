<head>
<style>
.center {
	display: block;
	margin-left: auto;
	margin-right: auto;
}
</style>
</head>
<?php
// Include Authorize.Net PHP sdk
// require 'anet_sdk_php/autoload.php';
require 'vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

// Include configuration file
require_once 'config.php';

$paymentID = $statusMsg = '';
$ordStatus = 'error';
$responseArr = array(
    1 => 'Approved',
    2 => 'Declined',
    3 => 'Error',
    4 => 'Held for Review'
);

// check for google captcha
if (verify_google_captcha($_POST['spGoogleCaptchaRes'], $_POST['g-recaptcha-response'], $googleCaptcha_secretkey) == true) {
    // Check whether card information is not empty
    if (! empty($_POST['card_number']) && ! empty($_POST['card_exp_month']) && ! empty($_POST['card_exp_year']) && ! empty($_POST['card_cvc'])) {

        // Retrieve card and user info from the submitted form data
        $donationAmount = $_POST['UMamount'];
        $donationItems = $_POST['purposeCollection'];
        $hhpes_qty = $_POST['hhpes_qty'];
        $hhry_qty = $_POST['hhry_qty'];
        $hhr_qty = $_POST['hhr_qty'];
        $hhy_qty = $_POST['hhy_qty'];
        $donationForHonor = $_POST['donationforHonor'];
        $donationForMemory = $_POST['donationforMemory'];
        $comments = $_POST['comments'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['UMstreet'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['UMzip'];
        $country = $_POST['country'];
        $email = $_POST['UMemail'];
        $phoneNumber = $_POST['UMbillphone'];
        $card_number = preg_replace('/\s+/', '', $_POST['card_number']);
        $card_exp_month = $_POST['card_exp_month'];
        $card_exp_year = $_POST['card_exp_year'];
        $card_exp_year_month = $card_exp_year . '-' . $card_exp_month;
        $card_cvc = $_POST['card_cvc'];

        // Shorten value for description if string length is >255
        if (strlen($donationItems) > 255) {
            $donationItems = substr($donationItems, 0, 251) . '...';
        }

        // Set the transaction's reference ID
        $refID = 'REF' . time();

        date_default_timezone_set('America/Los_Angeles');
        $invoiceNumber = date('Ymd-his', time());
        ;

        // Create a merchantAuthenticationType object with authentication details
        // retrieved from the config file
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(ANET_API_LOGIN_ID);
        $merchantAuthentication->setTransactionKey(ANET_TRANSACTION_KEY);

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($card_number);
        $creditCard->setExpirationDate($card_exp_year_month);
        $creditCard->setCardCode($card_cvc);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create order information
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($invoiceNumber);
        $order->setDescription($donationItems);

        // Set the customer's Bill To address
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($firstName);
        $customerAddress->setLastName($lastName);
        $customerAddress->setAddress($address);
        $customerAddress->setCity($city);
        $customerAddress->setState($state);
        $customerAddress->setZip($zip);
        $customerAddress->setCountry($country);
        $customerAddress->setPhoneNumber($phoneNumber);

        // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setEmail($email);

        // Add some merchant defined fields. These fields won't be stored with the transaction,
        // but will be echoed back in the response.
        $merchantDefinedField1 = new AnetAPI\UserFieldType();
        $merchantDefinedField1->setName("Quantity - Partner Extra Seats - High Holidays");
        $merchantDefinedField1->setValue($hhpes_qty);

        $merchantDefinedField2 = new AnetAPI\UserFieldType();
        $merchantDefinedField2->setName("Quantity - Non Members-High Holiday Seats for both Rosh Hashana and Yom Kippur");
        $merchantDefinedField2->setValue($hhry_qty);

        $merchantDefinedField3 = new AnetAPI\UserFieldType();
        $merchantDefinedField3->setName("Quantity - Non Members-High Holiday Seats for Rosh Hashana");
        $merchantDefinedField3->setValue($hhr_qty);

        $merchantDefinedField4 = new AnetAPI\UserFieldType();
        $merchantDefinedField4->setName("Quantity - Non Members-High Holiday Seats for Yom Kippur");
        $merchantDefinedField4->setValue($hhy_qty);

        $merchantDefinedField5 = new AnetAPI\UserFieldType();
        $merchantDefinedField5->setName("Donation For Honor");
        $merchantDefinedField5->setValue($donationForHonor);

        $merchantDefinedField6 = new AnetAPI\UserFieldType();
        $merchantDefinedField6->setName("Donation For Memory");
        $merchantDefinedField6->setValue($donationForMemory);

        $merchantDefinedField7 = new AnetAPI\UserFieldType();
        $merchantDefinedField7->setName("Comments");
        $merchantDefinedField7->setValue($comments);

        // Create a transaction
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($donationAmount);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->addToUserFields($merchantDefinedField1);
        $transactionRequestType->addToUserFields($merchantDefinedField2);
        $transactionRequestType->addToUserFields($merchantDefinedField3);
        $transactionRequestType->addToUserFields($merchantDefinedField4);
        $transactionRequestType->addToUserFields($merchantDefinedField5);
        $transactionRequestType->addToUserFields($merchantDefinedField6);
        $transactionRequestType->addToUserFields($merchantDefinedField7);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refID);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(constant("\\net\authorize\api\constants\ANetEnvironment::$ANET_ENV"));

        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {
                    // Transaction info
                    $transaction_id = $tresponse->getTransId();
                    $payment_status = $response->getMessages()->getResultCode();
                    $payment_response = $tresponse->getResponseCode();
                    $auth_code = $tresponse->getAuthCode();
                    $message_code = $tresponse->getMessages()[0]->getCode();
                    $message_desc = $tresponse->getMessages()[0]->getDescription();

                    $paymentID = $refID;

                    $ordStatus = 'success';
                    $statusMsg = 'Your Donation Payment has been Successful!';
                } else {
                    $error = "Transaction Failed! \n";
                    if ($tresponse->getErrors() != null) {
                        $error .= " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "<br/>";
                        $error .= " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "<br/>";
                    }
                    $statusMsg = $error;
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $error = "Transaction Failed! \n";
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $error .= " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "<br/>";
                    $error .= " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "<br/>";
                } else {
                    $error .= " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "<br/>";
                    $error .= " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "<br/>";
                }
                $statusMsg = $error;
            }
        } else {
            $statusMsg = "Transaction Failed! No response returned";
        }
    } else {
        $statusMsg = "Error on form submission.";
    }
} else {
    echo 'Invalid captcha. Please try again.';
}

function verify_google_captcha($captchaRes, $grecaptchaRes, $secretKey)
{
    if (isset($_POST['spGoogleCaptchaRes']) && isset($_POST['g-recaptcha-response'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
        
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => $secretKey,
            'response' => $grecaptchaRes,
            'remoteip' => $ip);
        $options = array( 'http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $result = json_decode($response);
        
        return $result->success;
    } else {
        return false;
    }
    

}

?>

<div class="status">
	<a href="https://www.ysccla.com/"><img alt="YSCC"
		src="https://www.ysccla.com/wp-content/uploads/2015/04/logo5.png"
		class="center"></a>
	<?php if(!empty($paymentID)){ ?>
	<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>

	<h4>Payment Information</h4>
	<p>
		<b>Reference Number:</b> <?php echo $paymentID; ?></p>
	<p>
		<b>Invoice Number:</b> <?php echo $invoiceNumber; ?></p>
	<p>
		<b>Transaction ID:</b> <?php echo $transaction_id; ?></p>
	<p>
		<b>Status:</b> <?php echo $responseArr[$payment_response]; ?></p>

	<h4>Donation Information</h4>
	<p>
		<b>Details:</b> <?php echo str_replace(",", "<br>", $donationItems); ?></p>
	<p>
		<b>Amount:</b> $ <?php echo $donationAmount.' '.$currency; ?></p>
	<?php }else{ ?>
		<h1 class="error">Your Payment has Failed</h1>
	<p class="error"><?php echo $statusMsg; ?></p>
	<?php } ?>
</div>