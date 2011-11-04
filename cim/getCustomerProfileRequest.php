<?php
/*
<?xml version="1.0"?>
<getCustomerProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
</getCustomerProfileRequest>

<?xml version="1.0" encoding="utf-8"?>
<getCustomerProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <profile>
    <merchantCustomerId>12345</merchantCustomerId>
    <email>user@example.com</email>
    <customerProfileId>5427896</customerProfileId>
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
      <customerPaymentProfileId>4796541</customerPaymentProfileId>
      <payment>
        <creditCard>
          <cardNumber>XXXX1111</cardNumber>
          <expirationDate>XXXX</expirationDate>
        </creditCard>
      </payment>
    </paymentProfiles>
    <paymentProfiles>
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
      <customerPaymentProfileId>4796585</customerPaymentProfileId>
      <payment>
        <creditCard>
          <cardNumber>XXXX1111</cardNumber>
          <expirationDate>XXXX</expirationDate>
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
      <customerAddressId>4907537</customerAddressId>
    </shipToList>
    <shipToList>
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
      <customerAddressId>4907591</customerAddressId>
    </shipToList>
  </profile>
</getCustomerProfileResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getCustomerProfileRequest(array(
        'customerProfileId' => '5427896'
    ));

    echo $xml;

?>