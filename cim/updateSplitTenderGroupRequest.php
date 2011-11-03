<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <updateSplitTenderGroupRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <splitTenderId>123456</splitTenderId>
        <splitTenderStatus>voided</splitTenderStatus>
    </updateSplitTenderGroupRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->updateSplitTenderGroupRequest(array(
        'splitTenderId' => '123456',
        'splitTenderStatus' => 'voided'
    ));

?>