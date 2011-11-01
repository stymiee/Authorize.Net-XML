<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <ARBCancelSubscriptionRequest  xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>mytestacct</name>
            <transactionKey>112223344</transactionKey>
        </merchantAuthentication>
        <refId>Sample</refId>
        <subscriptionId>100748</subscriptionId>
    </ARBCancelSubscriptionRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->ARBCancelSubscriptionRequest(array(
        'refId' => 'Sample',
        'transactionRequest' => '100748'
    ));

?>