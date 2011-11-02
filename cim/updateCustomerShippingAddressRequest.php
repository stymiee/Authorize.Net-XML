<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <updateCustomerShippingAddressRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <customerProfileId>10000</customerProfileId>
        <address>
            <firstName>Newfirstname</firstName>
            <lastName>Doe</lastName>
            <company></company>
            <address>123 Main St.</address>
            <city>Bellevue</city>
            <state>WA</state>
            <zip>98004</zip>
            <country>USA</country>
            <phoneNumber>000-000-0000</phoneNumber>
            <faxNumber></faxNumber>
            <customerAddressId>30000</customerAddressId>
        </address>
    </updateCustomerShippingAddressRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->updateCustomerShippingAddressRequest(array(
        'customerProfileId' => '10000',
        'address' => array(
            'firstName' => 'Newfirstname',
            'lastName' => 'Doe',
            'company' => '',
            'address' => '123 Main St.',
            'city' => 'Bellevue',
            'state' => 'WA',
            'zip' => '98004',
            'country' => 'USA',
            'phoneNumber' => '000-000-0000',
            'faxNumber' => '',
            'customerAddressId' => '30000'
        )
    ));

?>