<?php 
// Include configuration file  
require_once "config.php"; 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>YSCC Donation</title>
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
	<link rel='stylesheet' id='dashicons-css'  href='https://www.ysccla.com/wp-includes/css/dashicons.min.css?ver=5.2.4' type='text/css' media='all' />
<link rel='stylesheet' id='admin-bar-css'  href='https://www.ysccla.com/wp-includes/css/admin-bar.min.css?ver=5.2.4' type='text/css' media='all' />
<link rel='stylesheet' id='wp-block-library-css'  href='https://www.ysccla.com/wp-includes/css/dist/block-library/style.min.css?ver=5.2.4' type='text/css' media='all' />
<link rel='stylesheet' id='zerif_font-css'  href='//fonts.googleapis.com/css?family=Lato%3A300%2C400%2C700%2C400italic%7CMontserrat%3A400%2C700%7CHomemade+Apple&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='zerif_font_all-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300%2C300italic%2C400%2C400italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic&#038;subset=latin&#038;ver=5.2.4' type='text/css' media='all' />
<link rel='stylesheet' id='zerif_bootstrap_style-css'  href='https://www.ysccla.com/wp-content/themes/zerif-lite/css/bootstrap.css?ver=5.2.4' type='text/css' media='all' />
<link rel='stylesheet' id='zerif_fontawesome-css'  href='https://www.ysccla.com/wp-content/themes/zerif-lite/css/font-awesome.min.css?ver=v1' type='text/css' media='all' />
<link rel='stylesheet' id='zerif_style-css'  href='https://www.ysccla.com/wp-content/themes/zerif-lite/style.css?ver=1.8.5.49' type='text/css' media='all' />

</head>
<body>
<script src="donate.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<a href="https://www.ysccla.com/"><img alt="YSCC" src="https://www.ysccla.com/wp-content/uploads/2015/04/logo5.png" class="center"></a>
<br>
If you have received an honor on Shabbat and would like to donate to the <b>Young Sephardic Community Center</b>, you may do so by filling out the form below.<br>
All donations are tax deductible and donors will receive a summary of donations at the end of the year.<br>
You can also pay for high holiday tickets or sponsor Shabbat Kiddush through the form below.
    <!--form name="epayform" action="https://www.usaepay.com/gate.php" method="POST" onSubmit="return postSubmission();">
        <input type="hidden" name="UMkey" value="RY3C24gRz1mUp9gAnFbH11Ae0g47dfeX"-->
    <form name="epayform" action="donatepayment.php" method="POST" onSubmit="return postSubmission();">
        <input type="hidden" name="UMinvoice">
        <input type="hidden" name="UMamount">
        <input type="hidden" name="purposeCollection">
        <table style="width: 100%; margin-left:  25px;">
            <tr>
                <td>
                    <div>
                        <table>
                            <tr>
				<td colspan="2"><b><font size="2"color="#ff0000">* </font>Donation Amount:</b>&nbsp;<input type="text" name="UMamount" id="AmountId" value="0.00" onblur="addDotToAmount();"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Donation Purpose:</b><br>
                                <input type="checkbox" name="purpose" value="Pay My contribution ( bought a mitzvah)"> Pay My contribution ( bought a mitzvah)<br />
                                <input type="checkbox" name="purpose" value="$1800 a year - Partnership for family"> $1800 a year - Partnership for family<br />
                                <input type="checkbox" name="purpose" value="$1200 a year - Newly wed"> $1200 a year - Newly wed <br />
                                <input type="checkbox" name="purpose" value="$1000 a year - Single"> $1000 a year - Single <br />
                                <input type="checkbox" name="purpose" value="$100 - Partner Extra Seats - high holidays" id="hhpes" onclick="addqty('hhpes', 'hhpes_qty_id')"> $100 - Partner Extra Seats - high holidays --- Quantity: <input type="text" name="hhpes_qty" id="hhpes_qty_id" value="0" maxlength="2" size="2"> <br />
                                <input type="checkbox" name="purpose" value="$700 per seat - Non Members-High Holiday Seats for both Rosh Hashana &#038; Yom Kippur" id="hhry" onclick="addqty('hhry', 'hhry_qty_id')"> $700 per seat - Non Members-High Holiday Seats for both Rosh Hashana &#038; Yom Kippur --- Quantity: <input type="text" name="hhry_qty" id="hhry_qty_id" value="0" maxlength="2" size="2"><br />
                                <input type="checkbox" name="purpose" value="$360 per seat - Non Members-High Holiday Seats-Rosh Hashana" id="hhr" onclick="addqty('hhr', 'hhr_qty_id')"> $360 per seat - Non Members-High Holiday Seats-Rosh Hashana --- Quantity: <input type="text" name="hhr_qty" id="hhr_qty_id" value="0" maxlength="2" size="2"><br />
                                <input type="checkbox" name="purpose" value="$360 per seat - Non Members-High Holiday Seats-Yom Kippur" id="hhy" onclick="addqty('hhy', 'hhy_qty_id')"> $360 per seat - Non Members-High Holiday Seats-Yom Kippur --- Quantity: <input type="text" name="hhy_qty" id="hhy_qty_id" value="0" maxlength="2" size="2"><br />
                                <input type="checkbox" name="purpose" value="$500 - Main Minyan-Basic Kiddush"> $500 - Main Minyan-Basic Kiddush (Please specify in honor/memory of name below)<br />
                                <input type="checkbox" name="purpose" value="$500 - 1st &#038; Ashkenaz Minyan-Basic Kiddush"> $500 - 1st &#038; Ashkenaz Minyan-Basic Kiddush (Please specify in honor/memory of name below)<br />
                                <input type="checkbox" name="purpose" value="$180 - Seudat Shlishit"> $180 - Seudat Shlishit (Please specify in honor/memory of name below)<br />
                                <input type="checkbox" name="purpose" value="Fund - Kids Program"> Fund &#8211; Kids Program<br />
                                <input type="checkbox" name="purpose" value="Fund - Help the Needy"> Fund &#8211; Help the Needy<br />
                                <input type="checkbox" name="purpose" value="Fund - Torah Learning"> Fund &#8211; Torah Learning<br />
                                <input type="checkbox" name="purpose" value="Event"> Event (Please specify event in comment box)<br />
                                <input type="checkbox" name="purpose" value="Associate YSCC"> Associate YSCC<br />
                                <input type="checkbox" name="purpose" value="Other"> Other<br /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Donation Frequency</b><br>
                                <input type="radio" name="frequency" value="One-time" checked="checked" onclick="ShowHideFreq(true)"> One-time<br>
                                <input type="radio" name="frequency" id="frequency" value="Recurring" onclick="ShowHideFreq(false)"> Recurring<br>
                                <div id="freq" style="display: none">
                                <span style="display:inline-block; padding-left: 2em;">
									<input type="hidden" name="recurringSelected" value="true">
									Number of months: <input type="text" name="recurringMonths" id="recurringMonths" size=5 maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"><br>
                                	<font size="1px">&#9830; Enter the number of months this donation will be recurring for.<br></font>
                                	<input type="checkbox" name="foreverRecurring" id="foreverRecurring" onclick="setRecurringToOngoing()"> Ongoing Recurring<br>
                                	<font size="1px">&#9830; Clicking this checkbox means the donation will be ongoing and not have an end date.<br></font>
                                </span>
                                </div>
                                <br></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Anonymous</b><br>
                                <input type="checkbox" name="anonymous"> I prefer to make this donation anonymously</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>General</b><br>
                                This donation is In Honor of:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="donationforHonor"><br>
                                This donation is In Memory of:&nbsp;<input type="text" name="donationforMemory"><br>
                                Comments: <textarea name="comments" maxlength="255"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Secure Payment Form</b></td>
                            </tr>
                            <tr>
                                <td colspan="2"><p align="center">
                                        <img border="0" src="https://secure.usaepay.com/images/visa.gif" width="44" height="28" hspace="3"> <img border="0" src="https://secure.usaepay.com/images/mastercard.gif" width="44" height="28" hspace="3"> <img border="0" src="https://secure.usaepay.com/images/amex.gif" width="44" height="28" hspace="3"> <img border="0" src="https://secure.usaepay.com/images/discover.gif" width="44" height="28" hspace="3"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Credit Card Information:</b></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Name on Card:</td>
                                <td><input type="text" name="firstName" size="20" value="" placeholder="firstName"><input type="text" name="lastName" size="20" value="" placeholder="lastName"></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Address:</td>
                                <td><input type="text" name="UMstreet" size="25" value=""></td>
                            </tr>
                            <tr>
                                <td align="right">City:</td>
                                <td><input type="text" name="city" size="25" value=""></td>
                            </tr>
                            <tr>
                                <td align="right">State:</td>
                                <td><input type="text" name="state" size="2" value="CA" placeholder="CA"></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Zip:</td>
                                <td><input type="text" name="UMzip" size="10" value=""></td>
                            </tr>
                            <tr>
                                <td align="right">Country:</td>
                                <td><input type="text" name="country" size="3" value="USA" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Card Number:</td>
                                <td><input type="text" name="card_number" size="17" placeholder="1234 1234 1234 1234" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Card Expiration Date:</td>
                                <td><input type="text" name="card_exp_month" size="2" placeholder="MM"><input type="text" name="card_exp_year" size="4" placeholder="YYYY"></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Card ID (CVV2/CID) Number:<br> &nbsp; <font size="1">[<a
                                        target="_blank" href="https://secure.usaepay.com/cvv.htm">What is the Card ID?</a>]
                                </font></td>
                                <td><input type="text" name="card_cvc" size="5" placeholder="CVV" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Phone Number:</td>
                                <td><input type="text" name="UMbillphone" size="20" value="" placeholder="123-456-7890"></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Email Address:</td>
                                <td><input type="text" name="UMemail" id="UMemail" size="20" value=""></td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
 								<td>
 									<input type="hidden" id="spGoogleCaptchaRes" name="spGoogleCaptchaRes" value="" required="required">
 								</td>
     							<td>
     								<div id="spGoogleCaptcha"></div>
     							</td>
							</tr>
                            <tr>
                                <td colspan="2">
                                    <p align="center">
                                        <input type="submit" name="submitbutton" value="Process Payment &gt;&gt;">
                                    </p>

                                </td>
                            </tr>
                        </table>
                    </div>
                    
            </tr>
        </table>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
    /** Recapta **/
    function wpspfCheckGrecaptcha() {
    	var spGoogleCaptchaRes = jQuery('#spGoogleCaptchaRes').val();
    	if (spGoogleCaptchaRes == '') {
    		return false;
    	} else {
    		return true;
    	}
    }
    var verifyCallback = function(token) {
    	jQuery('#spGoogleCaptchaRes').val(token);
    };

    var expiredCallback = function() {
    	var tokenBlank = '';
    	jQuery('#spGoogleCaptchaRes').val(tokenBlank);
    };

    var captchaTheme = 'light';
    var sitekey = '<?php echo $googleCaptcha_sitekey; ?>';
    var onloadCallback = function() {
    	grecaptcha.render('spGoogleCaptcha', {
    		'sitekey' : sitekey,
    		'callback' : verifyCallback,
    		'expired-callback' : expiredCallback,
    		'theme' : captchaTheme
    	});
    };
    </script>
    <a target="_blank" href="https://www.ysccla.com/terms-of-service-refund-privacy-policy/">Refund Policy</a>
</body>
</html>
