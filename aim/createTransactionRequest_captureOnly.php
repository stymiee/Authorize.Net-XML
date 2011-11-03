<?php
/*************************************************************************************************

Use the AIM XML API to a Unlinked Capture (refund for a transaction NOT performed through the API)

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <refId>23079223</refId>
  <transactionRequest>
    <transactionType>captureOnlyTransaction</transactionType>
    <amount>5</amount>
    <payment>
      <creditCard>
        <cardNumber>5424000000000015</cardNumber>
        <expirationDate>122016</expirationDate>
      </creditCard>
    </payment>
    <authCode>123456</authCode>
  </transactionRequest>
</createTransactionRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<createTransactionResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <refId>23079223</refId>
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <transactionResponse>
    <responseCode>1</responseCode>
    <authCode>123456</authCode>
    <avsResultCode>P</avsResultCode>
    <cvvResultCode/>
    <cavvResultCode/>
    <transId>2165668077</transId>
    <refTransID/>
    <transHash>4557B8624CA624621E776DB8891F69A8</transHash>
    <testRequest>0</testRequest>
    <accountNumber>XXXX0015</accountNumber>
    <accountType>MasterCard</accountType>
    <messages>
      <message>
        <code>1</code>
        <description>This transaction has been approved.</description>
      </message>
    </messages>
  </transactionResponse>
</createTransactionResponse>

*************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createTransactionRequest(array(
        'refId' => rand(1000000, 100000000),
        'transactionRequest' => array(
            'transactionType' => 'captureOnlyTransaction',
            'amount' => 5,
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' => '5424000000000015',
                    'expirationDate' => '122016'
                )
            ),
            'authCode' => '123456'
        ),
    ));

    echo $xml;
?>