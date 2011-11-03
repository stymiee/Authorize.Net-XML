<?php
/*************************************************************************************************

Use the AIM XML API to send a customer a transaction receipt

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<sendCustomerTransactionReceiptRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <refId>22689483</refId>
  <transId>2165665581</transId>
  <customerEmail>user@example.com</customerEmail>
  <emailSettings>
    <setting>
      <settingName>footerEmailReceipt</settingName>
      <settingValue>&lt;![CDATA[&lt;html&gt;&lt;head&gt;&lt;/head&gt;&lt;body&gt;some
      FOOTER stuff&lt;/body&gt;&lt;/html&gt;]]&gt;</settingValue>
    </setting>
  </emailSettings>
</sendCustomerTransactionReceiptRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<sendCustomerTransactionReceiptResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <refId>22689483</refId>
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
</sendCustomerTransactionReceiptResponse>

**************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->sendCustomerTransactionReceiptRequest(array(
        'refId' => rand(1000000, 100000000),
        'transId' => '2165665581',
        'customerEmail' => 'user@example.com',
        'emailSettings' => array(
            'setting' => array(
                'settingName' => 'headerEmailReceipt',
                'settingValue' => '<![CDATA[<html><head></head><body>some HEADER stuff</body></html>]]>'
            ),
            'setting' => array(
                'settingName' => 'footerEmailReceipt',
                'settingValue' => '<![CDATA[<html><head></head><body>some FOOTER stuff</body></html>]]>'
            ),
        ),
    ));

/*

*/

    echo $xml;
?>