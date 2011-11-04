<?php
/*
<?xml version="1.0"?>
<getCustomerShippingAddressRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
  <customerAddressId>4907537</customerAddressId>
</getCustomerShippingAddressRequest>

<?xml version="1.0" encoding="utf-8"?>
<getCustomerShippingAddressResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <address>
    <firstName>John</firstName>
    <lastName>Smith</lastName>
    <address>123 Main Street</address>
    <city>Townsville</city>
    <state>NJ</state>
    <zip>12345</zip>
    <phoneNumber>800-555-1234</phoneNumber>
    <customerAddressId>4907537</customerAddressId>
  </address>
</getCustomerShippingAddressResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getCustomerShippingAddressRequest(array(
        'customerProfileId' => '5427896',
        'customerAddressId' => '4907537'
    ));

    echo $xml;

?>