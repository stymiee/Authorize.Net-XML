<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <getBatchStatisticsRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <batchId>12345</batchId>
    </getBatchStatisticsRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getBatchStatisticsRequest(array(
        'batchId' => '12345'
    ));

?>