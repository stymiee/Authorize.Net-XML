<?php
/*
<?xml version="1.0"?>
<deleteCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
  <customerPaymentProfileId>4796541</customerPaymentProfileId>
</deleteCustomerPaymentProfileRequest>

<?xml version="1.0" encoding="utf-8"?>
<deleteCustomerPaymentProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
</deleteCustomerPaymentProfileResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->deleteCustomerPaymentProfileRequest(array(
        'customerProfileId' => '5427896',
        'customerPaymentProfileId' => '4796541'
    ));

    echo $xml;

?>