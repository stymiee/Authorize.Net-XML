<?php
/*************************************************************************************************

Use the CIM XML API to update a customer profile

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<updateCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5685296</customerProfileId>
  <paymentProfile>
    <billTo>
      <firstName>John</firstName>
      <lastName>Doe</lastName>
      <company/>
      <address>123 Main St.</address>
      <city>Bellevue</city>
      <state>WA</state>
      <zip>98004</zip>
      <country>USA</country>
      <phoneNumber>800-555-1234</phoneNumber>
      <faxNumber>800-555-1234</faxNumber>
    </billTo>
    <payment>
      <creditCard>
        <cardNumber>4111111111111111</cardNumber>
        <expirationDate>2016-08</expirationDate>
      </creditCard>
    </payment>
    <customerPaymentProfileId>4966870</customerPaymentProfileId>
  </paymentProfile>
</updateCustomerPaymentProfileRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<updateCustomerPaymentProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
</updateCustomerPaymentProfileResponse>

*************************************************************************************************/

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->updateCustomerPaymentProfileRequest(array(
        'customerProfileId' => '5685296',
        'paymentProfile' => array(
            'billTo' => array(
                'firstName' => 'John',
                'lastName' => 'Doe',
                'company' => '',
                'address' => '123 Main St.',
                'city' => 'Bellevue',
                'state' => 'WA',
                'zip' => '98004',
                'country' => 'USA',
                'phoneNumber' => '800-555-1234',
                'faxNumber' => '800-555-1234'
            ),
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' => '4111111111111111',
                    'expirationDate' => '2016-08'
                )
            ),
            'customerPaymentProfileId' => '4966870'
        )
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
            CIM :: Update Customer Profile
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
        </table>
        <h2>
            Raw Input/Output
        </h2>
<?php
    echo $xml;
?>
    </body>
</html>
