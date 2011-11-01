<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <getTransactionListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <batchId>12345</batchId>
    </getTransactionListRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getTransactionListRequest(array(
        'batchId' => '12345'
    ));
?>