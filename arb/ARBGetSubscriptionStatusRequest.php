<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <ARBGetSubscriptionStatusRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>mytestacct</name>
            <transactionKey>112223344</transactionKey>
        </merchantAuthentication>
        <refId>Sample</refId>
        <subscriptionId>100748</subscriptionId>
    </ARBGetSubscriptionStatusRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->ARBGetSubscriptionStatusRequest(array(
        'refId' => 'Sample',
        'subscriptionId' => '100748'
    ));

?>