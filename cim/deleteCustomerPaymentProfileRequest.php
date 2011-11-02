<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <deleteCustomerPaymentProfileRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <customerProfileId>10000</customerProfileId>
        <customerPaymentProfileId>20000</customerPaymentProfileId>
    </deleteCustomerPaymentProfileRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->deleteCustomerPaymentProfileRequest(array(
        'customerProfileId' => '10000',
        'customerPaymentProfileId' => '20000'
    ));

?>