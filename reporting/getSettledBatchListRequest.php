<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <getSettledBatchListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name> YOUR_USER_LOGIN</name>
            <transactionKey> YOUR_TRANSACTION_KEY</transactionKey>
        </merchantAuthentication>
        <includeStatistics>true</includeStatistics>
        <firstSettlementDate>2010-09-01T08:15:30</firstSettlementDate>
        <lastSettlementDate>2010-09-30T08:15:30</lastSettlementDate>
    </getSettledBatchListRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getSettledBatchListRequest(array(
        'includeStatistics' => 'true',
        'firstSettlementDate' => '2011-09-01T08:15:30',
        'lastSettlementDate' => '2011-09-30T08:15:30',
    ));

?>