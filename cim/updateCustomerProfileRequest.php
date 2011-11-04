<?php
/*
<?xml version="1.0"?>
<updateCustomerProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <profile>
    <merchantCustomerId>12345</merchantCustomerId>
    <description>some description</description>
    <email>newaddress@example.com</email>
    <customerProfileId>5427896</customerProfileId>
  </profile>
</updateCustomerProfileRequest>

<?xml version="1.0" encoding="utf-8"?>
<updateCustomerProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
</updateCustomerProfileResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->updateCustomerProfileRequest(array(
        'profile' => array(
            'merchantCustomerId' => '12345',
            'description' => 'some description',
            'email' => 'newaddress@example.com',
            'customerProfileId' => '5427896'
        )
    ));

    echo $xml;

?>