<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <getUnsettledTransactionListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
    </getTransactionListRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getUnsettledTransactionListRequest();
?>