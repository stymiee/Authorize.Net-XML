<?php
/*************************************************************************************************

Use the CIM XML API to create a customer profile

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createCustomerProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
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
<createCustomerProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
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

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerProfileRequest(array(
        'profile' => array(
			'merchantCustomerId' => '12345',
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

    echo $xml;

?>