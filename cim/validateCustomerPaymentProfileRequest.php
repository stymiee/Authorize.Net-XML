<?php
/*
<?xml version="1.0"?>
<validateCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
  <customerPaymentProfileId>4796541</customerPaymentProfileId>
  <customerShippingAddressId>4907537</customerShippingAddressId>
  <validationMode>liveMode</validationMode>
</validateCustomerPaymentProfileRequest>

<?xml version="1.0" encoding="utf-8"?>
<validateCustomerPaymentProfileResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <directResponse>1,1,1,This transaction has been approved.,EXOU4R,Y,2165734487,none,Test transaction for ValidateCustomerPaymentProfile.,0.00,CC,auth_only,12345,John,Smith,,123 Main Street,Townsville,NJ,12345,,800-555-1234,,user@example.com,John,Smith,,123 Main Street,Townsville,NJ,12345,,0.00,0.00,0.00,FALSE,none,74FF8237FC25CCD923A4DD745EBF56C1,,2,,,,,,,,,,,XXXX1111,Visa,,,,,,,,,,,,,,,,,4907537</directResponse>
</validateCustomerPaymentProfileResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->validateCustomerPaymentProfileRequest(array(
        'customerProfileId' => '5427896',
        'customerPaymentProfileId' => '4796541',
        'customerShippingAddressId' => '4907537',
        'validationMode' => 'liveMode'
    ));

    echo $xml;

?>