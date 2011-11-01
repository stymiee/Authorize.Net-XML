<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <ARBUpdateSubscriptionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>mytestacct</name>
            <transactionKey>112223344</transactionKey>
        </merchantAuthentication>
        <refId>Sample</refId>
        <subscriptionId>100748</subscriptionId>
        <subscription>
            <payment>
                <creditCard>
                    <cardNumber>4111111111111111</cardNumber>
                    <expirationDate>2012-08</expirationDate>
                </creditCard>
            </payment>
        </subscription>
    </ARBUpdateSubscriptionRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->ARBUpdateSubscriptionRequest(array(
        'refId' => 'Sample',
        'subscriptionId' => '100748',
        'subscription' => array(
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' => '4111111111111111',
                    'expirationDate' => '2012-08'
                ),
            ),
        ),
    ));

?>