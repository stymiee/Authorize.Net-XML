<?php
/*************************************************************************************************

Use the AIM XML API to a Refund transaction (credit)

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <refId>15444549</refId>
  <transactionRequest>
    <transactionType>refundTransaction</transactionType>
    <amount>5</amount>
    <payment>
      <creditCard>
        <cardNumber>XXXX1111</cardNumber>
        <expirationDate>122016</expirationDate>
      </creditCard>
    </payment>
    <authCode>2165668159</authCode>
  </transactionRequest>
</createTransactionRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<createTransactionResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <refId>15444549</refId>
  <messages>
    <resultCode>Error</resultCode>
    <message>
      <code>E00027</code>
      <text>The transaction was unsuccessful.</text>
    </message>
  </messages>
  <transactionResponse>
    <responseCode>3</responseCode>
    <authCode>2165668159</authCode>
    <avsResultCode>P</avsResultCode>
    <cvvResultCode/>
    <cavvResultCode/>
    <transId>0</transId>
    <refTransID/>
    <transHash>9F18DE7ABDD09076F9BADB594EFC4611</transHash>
    <testRequest>0</testRequest>
    <accountNumber>XXXX1111</accountNumber>
    <accountType>Visa</accountType>
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
            'transactionType' => 'refundTransaction',
            'amount' => 5,
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' => 'XXXX1111',
                    'expirationDate' => '122016'
                )
            ),
            'authCode' => '2165668159'
        ),
    ));

    echo $xml;
?>