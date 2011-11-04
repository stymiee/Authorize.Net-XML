<?php
/*
<?xml version="1.0"?>
<getCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
  <customerPaymentProfileId>4796541</customerPaymentProfileId>
</getCustomerPaymentProfileRequest>

<?xml version="1.0" encoding="utf-8"?>
<getCustomerPaymentProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
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
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getCustomerPaymentProfileRequest(array(
        'customerProfileId' => '5427896',
        'customerPaymentProfileId' => '4796541'
    ));

    echo $xml;

?>