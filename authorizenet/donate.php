<?php 
// Include configuration file  
require_once 'config.php'; 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>YSCC Donation</title>
</head>
<body>
<script src="donate.js"></script>
If you have received an honor on Shabbat and would like to donate to the <b>Young Sephardic Community Center</b>, you may do so by filling out the form below.<br>
All donations are tax deductible and donors will receive a summary of donations at the end of the year.<br>
You can also pay for high holiday tickets or sponsor Shabbat Kiddush through the form below.
    <!--form name="epayform" action="https://www.usaepay.com/gate.php" method="POST" onSubmit="return postSubmission();">
        <input type="hidden" name="UMkey" value="RY3C24gRz1mUp9gAnFbH11Ae0g47dfeX"-->
    <form name="epayform" action="donatepayment.php" method="POST" onSubmit="return postSubmission();">
        <input type="hidden" name="UMinvoice">
        <input type="hidden" name="UMamount">
        <input type="hidden" name="purposeCollection">
        <table style="width: 100%;">
            <tr>
                <td>
                    <div>
                        <table>
                            <tr>
				<td colspan="2"><b><font size="2"color="#ff0000">* </font>Donation Amount:</b>&nbsp;<input type="text" name="UMamount" id="AmountId" value="0.00"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Donation Purpose:</b><br>
                                <input type="checkbox" name="purpose" value="Pay My contribution ( bought a mitzvah)"> Pay My contribution ( bought a mitzvah)<br />
                                <input type="checkbox" name="purpose" value="$1360 a year - Partnership for family"> $1360 a year - Partnership for family<br />
                                <input type="checkbox" name="purpose" value="$800 a year - Newly wed"> $800 a year - Newly wed <br />
                                <input type="checkbox" name="purpose" value="$600 a year - Single"> $600 a year - Single <br />
                                <input type="checkbox" name="purpose" value="$100 - Partner Extra Seats - high holidays" id="hhpes" onclick="addqty('hhpes', 'hhpes_qty_id')"> $100 - Partner Extra Seats - high holidays --- Quantity: <input type="text" name="hhpes_qty" id="hhpes_qty_id" value="0" maxlength="2" size="2"> <br />
                                <input type="checkbox" name="purpose" value="$360 per seat - Non Members-High Holiday Seats for both Rosh Hashana &#038; Yom Kippur" id="hhry" onclick="addqty('hhry', 'hhry_qty_id')"> $360 per seat - Non Members-High Holiday Seats for both Rosh Hashana &#038; Yom Kippur  --- Quantity: <input type="text" name="hhry_qty" id="hhry_qty_id" value="0" maxlength="2" size="2"><br />
                                <input type="checkbox" name="purpose" value="$180 per seat - Non Members-High Holiday Seats-Rosh Hashana" id="hhr" onclick="addqty('hhr', 'hhr_qty_id')"> $180 per seat - Non Members-High Holiday Seats-Rosh Hashana  --- Quantity: <input type="text" name="hhr_qty" id="hhr_qty_id" value="0" maxlength="2" size="2"><br />
                                <input type="checkbox" name="purpose" value="$180 per seat - Non Members-High Holiday Seats-Yom Kippur" id="hhy" onclick="addqty('hhy', 'hhy_qty_id')"> $180 per seat - Non Members-High Holiday Seats-Yom Kippur  --- Quantity: <input type="text" name="hhy_qty" id="hhy_qty_id" value="0" maxlength="2" size="2"><br />
                                <input type="checkbox" name="purpose" value="$350 - Main Minyan-Basic Kiddush"> $350 - Main Minyan-Basic Kiddush (Please specify in honor/memory of name below)<br />
                                <input type="checkbox" name="purpose" value="$350 - 1st &#038; Ashkenaz Minyan-Basic Kiddush"> $350 - 1st &#038; Ashkenaz Minyan-Basic Kiddush (Please specify in honor/memory of name below)<br />
                                <input type="checkbox" name="purpose" value="$150 - Seudat Shlishit"> $150 - Seudat Shlishit (Please specify in honor/memory of name below)<br />
                                <input type="checkbox" name="purpose" value="Fund - Kids Program"> Fund &#8211; Kids Program<br />
                                <input type="checkbox" name="purpose" value="Fund - Help the Needy"> Fund &#8211; Help the Needy<br />
                                <input type="checkbox" name="purpose" value="Fund - Torah Learning"> Fund &#8211; Torah Learning<br />
                                <input type="checkbox" name="purpose" value="Event"> Event (Please specify event in comment box)<br />
                                <input type="checkbox" name="purpose" value="Associate YSCC"> Associate YSCC<br />
                                <input type="checkbox" name="purpose" value="Other"> Other<br /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Anonymous</b><br>
                                <input type="checkbox" name="anonymous"> I prefer to make this donation anonymously</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>General</b><br>
                                This donation is In Honor of:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="donationfor"><br>
                                This donation is In Memory of:&nbsp;<input type="text" name="donationfor"><br>
                                Comments:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="comments"> </textarea></td>
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
                                <td align="right"><font size="2"color="#ff0000">* </font>Card Type:</td>
                                <td>
                                    <p>
                                        <select size="1" name="payment_type">
                                            <option value="Visa">Visa</option>
                                            <option value="MasterCard">MasterCard</option>
                                            <option value="American Express">American Express</option>
                                            <option value="Discover">Discover</option>
                                        </select>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Name on Card:</td>
                                <td><input type="text" name="UMname" size="25" value=""></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Card Billing Address:</td>
                                <td><input type="text" name="UMstreet" size="25" value=""></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Card Billing Zipcode:</td>
                                <td><input type="text" name="UMzip" size="10" value=""></td>
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
                                <td><input type="text" name="UMbillphone" size="20" value=""></td>
                            </tr>
                            <tr>
                                <td align="right"><font size="2"color="#ff0000">* </font>Email Address:</td>
                                <td><input type="text" name="UMemail" id="UMemail" size="20" value=""></td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;&nbsp;&nbsp;</td>
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
    <a target="_blank" href="https://www.ysccla.com/terms-of-service-refund-privacy-policy/">Refund Policy</a>




</body>
</html>