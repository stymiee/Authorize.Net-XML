<?php
/*************************************************************************************************

Use the CIM XML API to create a customer profile

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createCustomerProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
  </merchantAuthentication>
  <profile>
    <merchantCustomerId>12345</merchantCustomerId>
    <email>user@example.com</email>
    <paymentProfiles>
      <billTo>
        <firstName>John</firstName>
        <lastName>Smith</lastName>
        <address>123 Main Street</address>
        <city>Townsville</city>
        <state>NJ</state>
        <zip>12345</zip>
        <phoneNumber>800-555-1234</phoneNumber>
      </billTo>
      <payment>
        <creditCard>
          <cardNumber>4111111111111111</cardNumber>
          <expirationDate>2016-08</expirationDate>
        </creditCard>
      </payment>
    </paymentProfiles>
    <shipToList>
      <firstName>John</firstName>
      <lastName>Smith</lastName>
      <address>123 Main Street</address>
      <city>Townsville</city>
      <state>NJ</state>
      <zip>12345</zip>
      <phoneNumber>800-555-1234</phoneNumber>
    </shipToList>
  </profile>
  <validationMode>liveMode</validationMode>
</createCustomerProfileRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<createCustomerProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <customerProfileId>5427896</customerProfileId>
  <customerPaymentProfileIdList>
    <numericString>4796541</numericString>
  </customerPaymentProfileIdList>
  <customerShippingAddressIdList>
    <numericString>4907537</numericString>
  </customerShippingAddressIdList>
  <validationDirectResponseList>
    <string>1,1,1,This transaction has been approved.,EY6CR8,Y,2165732750,none,Test transaction for ValidateCustomerPaymentProfile.,0.00,CC,auth_only,12345,John,Smith,,123 Main Street,Townsville,NJ,12345,,800-555-1234,,user@example.com,none,none,none,none,none,none,none,none,0.00,0.00,0.00,FALSE,none,72784EF27A4DD684150C39B923FC4478,,2,,,,,,,,,,,XXXX1111,Visa,,,,,,,,,,,,,,,,</string>
  </validationDirectResponseList>
</createCustomerProfileResponse>

*************************************************************************************************/

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerProfileRequest(array(
        'profile' => array(
			'merchantCustomerId' => '87657',
			'email' => 'user@example.com',
			'paymentProfiles' => array(
				'billTo' => array(
					'firstName' => 'John',
					'lastName' => 'Smith',
					'address' => '123 Main Street',
					'city' => 'Townsville',
					'state' => 'NJ',
					'zip' => '12345',
					'phoneNumber' => '800-555-1234'
				),
				'payment' => array(
					'creditCard' => array(
					'cardNumber' => '4111111111111111',
					'expirationDate' => '2016-08',
					),
				),
			),
    		'shipToList' => array(
    		    'firstName' => 'John',
				'lastName' => 'Smith',
				'address' => '123 Main Street',
				'city' => 'Townsville',
				'state' => 'NJ',
				'zip' => '12345',
				'phoneNumber' => '800-555-1234'
    		),
		),
		'validationMode' => 'liveMode'
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
            CIM :: Create Customer Profile
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
                <th>Customer Profile ID</th>
                <td><?php echo $xml->customerProfileId; ?></td>
            </tr>
            <tr>
                <th>Customer Payment Profile ID</th>
                <td><?php echo $xml->customerPaymentProfileIdList->numericString; ?></td>
            </tr>
            <tr>
                <th>Customer Shipping Address ID</th>
                <td><?php echo $xml->customerShippingAddressIdList->numericString; ?></td>
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
