<?php
/*************************************************************************************************

Use the CIM XML API to retrieve a payment profile

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
  <customerPaymentProfileId>4796541</customerPaymentProfileId>
</getCustomerPaymentProfileRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<getCustomerPaymentProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <paymentProfile>
    <billTo>
      <firstName>John</firstName>
      <lastName>Smith</lastName>
      <address>123 Main Street</address>
      <city>Townsville</city>
      <state>NJ</state>
      <zip>12345</zip>
      <phoneNumber>800-555-1234</phoneNumber>
    </billTo>
    <customerPaymentProfileId>4796541</customerPaymentProfileId>
    <payment>
      <creditCard>
        <cardNumber>XXXX1111</cardNumber>
        <expirationDate>XXXX</expirationDate>
      </creditCard>
    </payment>
  </paymentProfile>
</getCustomerPaymentProfileResponse>

*************************************************************************************************/

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getCustomerPaymentProfileRequest(array(
        'customerProfileId' => '5427896',
        'customerPaymentProfileId' => '4796541'
    ));
?>

<!DOCTYPE html>
<html>
<html lang="en">
    <head>
        <title></title>
        <style type="text/css">
            table
            {
                border: 1px solid #cccccc;
                margin: auto;
                border-collapse: collapse;
                max-width: 90%;
            }

            table td
            {
                padding: 3px 5px;
                vertical-align: top;
                border-top: 1px solid #cccccc;
            }

            pre
            {
            	overflow-x: auto; /* Use horizontal scroller if needed; for Firefox 2, not needed in Firefox 3 */
            	white-space: pre-wrap; /* css-3 */
            	white-space: -moz-pre-wrap !important; /* Mozilla, since 1999 */
            	white-space: -pre-wrap; /* Opera 4-6 */
            	white-space: -o-pre-wrap; /* Opera 7 */ /*
            	width: 99%; */
            	word-wrap: break-word; /* Internet Explorer 5.5+ */
            }

            table th
            {
                background: #e5e5e5;
                color: #666666;
            }

            h1, h2
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>
            CIM :: Get Payment Profile
        </h1>
        <h2>
            Results
        </h2>
        <table>
            <tr>
                <th>Response</th>
                <td><?php echo $xml->messages->resultCode; ?></td>
            </tr>
            <tr>
                <th>code</th>
                <td><?php echo $xml->messages->message->code; ?></td>
            </tr>
            <tr>
                <th>Successful?</th>
                <td><?php echo ($xml->isSuccessful()) ? 'yes' : 'no'; ?></td>
            </tr>
            <tr>
                <th>Error?</th>
                <td><?php echo ($xml->isError()) ? 'yes' : 'no'; ?></td>
            </tr>
            <tr>
                <th>firstName</th>
                <td><?php echo $xml->paymentProfile->billTo->firstName; ?></td>
            </tr>
            <tr>
                <th>lastName</th>
                <td><?php echo $xml->paymentProfile->billTo->lastName; ?></td>
            </tr>
            <tr>
                <th>address</th>
                <td><?php echo $xml->paymentProfile->billTo->address; ?></td>
            </tr>
            <tr>
                <th>city</th>
                <td><?php echo $xml->paymentProfile->billTo->city; ?></td>
            </tr>
            <tr>
                <th>state</th>
                <td><?php echo $xml->paymentProfile->billTo->state; ?></td>
            </tr>
            <tr>
                <th>zip</th>
                <td><?php echo $xml->paymentProfile->billTo->zip; ?></td>
            </tr>
            <tr>
                <th>phoneNumber</th>
                <td><?php echo $xml->paymentProfile->billTo->phoneNumber; ?></td>
            </tr>
            <tr>
                <th>customerPaymentProfileId</th>
                <td><?php echo $xml->customerPaymentProfileId; ?></td>
            </tr>
            <tr>
                <th>cardNumber</th>
                <td><?php echo $xml->payment->creditCard->cardNumber; ?></td>
            </tr>
            <tr>
                <th>expirationDate</th>
                <td><?php echo $xml->payment->creditCard->expirationDate; ?></td>
            </tr>
        </table>
        <h2>
            Raw Input/Output
        </h2>
<?php
    echo $xml;
?>
    </body>
</html>
