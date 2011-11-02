<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <createCustomerProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>API Login ID here</name>
            <transactionKey>Transaction Key here</transactionKey>
        </merchantAuthentication>
        <profile>
            <merchantCustomerId>Merchant Customer ID here</merchantCustomerId>
            <description>Profile description here</description>
            <email>customer profile email address here</email>
            <paymentProfiles>
                <customerType>individual</customerType>
                    <payment>
                        <creditCard>
                            <cardNumber>Credit card number here</cardNumber>
                            <expirationDate>Credit card expiration date here</expirationDate>
                        </creditCard>
                    </payment>
            </paymentProfiles>
        </profile>
        <validationMode>liveMode</validationMode>
    </createCustomerProfileRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerProfileRequest(array(
        'profile' => array(
            'merchantCustomerId' => 'Merchant Customer ID here',
            'description' => 'Profile description here',
            'email' => 'customer profile email address here',
            'paymentProfiles' => array(
                'customerType' = > 'individual',
                'payment' => array(
                    'creditCard' => array(
                        'cardNumber' = > '4111111111111111',
                        'expirationDate' = > '2012-12'
                    )
                )
            )
        ),
        'validationMode' => 'liveMode'
    ));

?>