<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <createCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <customerProfileId>10000</customerProfileId>
        <paymentProfile>
            <billTo>
                <firstName>John</firstName>
                <lastName>Doe</lastName>
                <company></company>
                <address>123 Main St.</address>
                <city>Bellevue</city>
                <state>WA</state>
                <zip>98004</zip>
                <country>USA</country>
                <phoneNumber>000-000-0000</phoneNumber>
                <faxNumber></faxNumber>
            </billTo>
            <payment>
                <creditCard>
                    <cardNumber>4111111111111111</cardNumber>
                    <expirationDate>2023-12</expirationDate>
                </creditCard>
            </payment>
        </paymentProfile>
        <validationMode>liveMode</validationMode>
    </createCustomerPaymentProfileRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerProfileRequest(array(
        'customerProfileId' => '10000',
        'paymentProfile' => array(
            'billTo' => array(
                'firstName' => 'John'
                'lastName' => 'Doe'
                'company' => ''
                'address' => '123 Main St.'
                'city' => 'Bellevue'
                'state' => 'WA'
                '<zip' => '98004'
                'country' => 'USA'
                'phoneNumber' => '000-000-0000'
                'faxNumber' => ''
            ),
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' = > '4111111111111111',
                    'expirationDate' = > '2023-12'
                )
            )
        ),
        'validationMode' => 'liveMode'
    ));

?>