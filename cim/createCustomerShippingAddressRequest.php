<?php
/*
<?xml version="1.0"?>
<createCustomerShippingAddressRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
  <address>
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
  </address>
</createCustomerShippingAddressRequest>

<?xml version="1.0" encoding="utf-8"?>
<createCustomerShippingAddressResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <customerAddressId>4907591</customerAddressId>
</createCustomerShippingAddressResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerShippingAddressRequest(array(
        'customerProfileId' => '5427896',
        'address' => array(
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
        )
    ));

    echo $xml;

?>