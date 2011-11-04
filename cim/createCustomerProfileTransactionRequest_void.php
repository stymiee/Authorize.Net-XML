<?php
/*
<?xml version="1.0"?>
<createCustomerProfileTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <transaction>
    <profileTransVoid>
      <customerProfileId>5427896</customerProfileId>
      <customerPaymentProfileId>4796541</customerPaymentProfileId>
      <customerShippingAddressId>4907537</customerShippingAddressId>
      <transId>2165736189</transId>
    </profileTransVoid>
  </transaction>
  <extraOptions>&lt;![CDATA[x_customer_ip=100.0.0.1]]&gt;</extraOptions>
</createCustomerProfileTransactionRequest>

<?xml version="1.0" encoding="utf-8"?>
<createCustomerProfileTransactionResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <directResponse>1,1,1,This transaction has been approved.,,P,2165736189,INV000001,,0.00,CC,void,12345,,,,,,,12345,,,,,,,,,,,,,,,,,,80492250B8FE91653C24E90D201C9742,,,,,,,,,,,,,XXXX1111,Visa,,,,,,,,,,,,,,,,,4907537,100.0.0.1]]&gt;</directResponse>
</createCustomerProfileTransactionResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerProfileTransactionRequest(array(
        'transaction' => array(
            'profileTransVoid' => array(
                'customerProfileId' => '5427896',
                'customerPaymentProfileId' => '4796541',
                'customerShippingAddressId' => '4907537',
                'transId' => '2165736189'
            )
        ),
        'extraOptions' => '<![CDATA[x_customer_ip=100.0.0.1]]>'
    ));

    echo $xml;

?>