<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <getTransactionDetailsRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <transId>1111111111</transId>
    </getTransactionDetailsRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getTransactionDetailsRequest(array(
        'transId' => '2155180062'
    ));
?>