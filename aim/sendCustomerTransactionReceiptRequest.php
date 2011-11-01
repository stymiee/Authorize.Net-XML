<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <sendCustomerTransactionReceiptRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
          <merchantAuthentication>
              <name>MyLoginName</name>
              <transactionKey>MyTransKey</transactionKey>
         </merchantAuthentication>
        <refId>123456</refId>
        <transId>1234567890</transId>
        <customerEmail>somebody@somewhere.com</customerEmail>
         <emailSettings>
            <setting>
                <settingName>headerEmailReceipt</settingName>
                <settingValue><![CDATA[<html><head></head><body>some HEADER stuff</body></html>]]></settingValue>
            </setting>
            <setting>
               <settingName>footerEmailReceipt</settingName>
               <settingValue><![CDATA[<html><head></head><body>some FOOTER stuff</body></html>]]></settingValue>
            </setting>
         </emailSettings>
    </sendCustomerTransactionReceiptRequest>
*/
    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createTransactionRequest(array(
        'refId' => rand(1000000, 100000000),
        'transId' => '12345',
        'customerEmail' => 'user@example.com',
        'emailSettings' => array(
            'setting' => array(
                'settingName' => 'headerEmailReceipt'.
                'settingValue' => '<![CDATA[<html><head></head><body>some HEADER stuff</body></html>]]>'
            ),
            'setting' => array(
                'settingName' => 'footerEmailReceipt'.
                'settingValue' => '<![CDATA[<html><head></head><body>some FOOTER stuff</body></html>]]>'
            ),
        ),
    ));

?>