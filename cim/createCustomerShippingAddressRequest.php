<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <createCustomerShippingAddressRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <customerProfileId>10000</customerProfileId>
        <address>
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
        </address>
    </createCustomerShippingAddressRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerShippingAddressRequest(array(
        'customerProfileId' => '10000',
        'address' => array(
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
        )
    ));

?>