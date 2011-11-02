<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <validateCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <customerProfileId>10000</customerProfileId>
        <customerPaymentProfileId>20000</customerPaymentProfileId>
        <customerShippingAddressId>30000</customerShippingAddressId>
        <validationMode>liveMode</validationMode>
    </validateCustomerPaymentProfileRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->validateCustomerPaymentProfileRequest(array(
        'customerProfileId' => '10000',
        'customerPaymentProfileId' => '20000',
        'customerShippingAddressId' => '30000',
        'validationMode' => 'liveMode'
    ));

?>