<?php
/*
<?xml version="1.0"?>
<createCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
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
  </paymentProfile>
  <validationMode>liveMode</validationMode>
</createCustomerPaymentProfileRequest>

<?xml version="1.0" encoding="utf-8"?>
<createCustomerPaymentProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <customerPaymentProfileId>4796585</customerPaymentProfileId>
  <validationDirectResponse>1,1,1,This transaction has been approved.,293A0L,Y,2165733490,none,Test transaction for ValidateCustomerPaymentProfile.,0.00,CC,auth_only,none,John,Doe,,123 Main St.,Bellevue,WA,98004,USA,800-555-1234,800-555-1234,email@example.com,none,none,none,none,none,none,none,none,0.00,0.00,0.00,FALSE,none,E924B95B48C5E65B811AFB21A45F1FC6,,2,,,,,,,,,,,XXXX1111,Visa,,,,,,,,,,,,,,,,</validationDirectResponse>
</createCustomerPaymentProfileResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerPaymentProfileRequest(array(
        'customerProfileId' => '5427896',
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
            )
        ),
        'validationMode' => 'liveMode'
    ));

    echo $xml;

?>