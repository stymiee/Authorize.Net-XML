<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <updateCustomerProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <profile>
            <merchantCustomerId>custId123</merchantCustomerId>
            <description>some description</description>
            <email>newaddress@example.com</email>
            <customerProfileId>10000</customerProfileId>
        </profile>
    </updateCustomerProfileRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->updateCustomerProfileRequest(array(
        'profile' => array(
            'merchantCustomerId' => 'custId123',
            'description' => 'some description',
            'email' => 'newaddress@example.com',
            'customerProfileId' => '10000'
        )
    ));

?>