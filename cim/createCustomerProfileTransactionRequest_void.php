<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <createCustomerProfileTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <transaction>
            <profileTransVoid>
                <customerProfileId>10000</customerProfileId>
                <customerPaymentProfileId>20000</customerPaymentProfileId>
                <customerShippingAddressId>30000</customerShippingAddressId>
                <transId>40000</transId>
            </profileTransVoid>
        </transaction>
        <extraOptions><![CDATA[]]></extraOptions>
    </createCustomerProfileTransactionRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerProfileTransactionRequest(array(
        'transaction' => array(
            'profileTransVoid' => array(
                'customerProfileId' => '10000',
                'customerPaymentProfileId' => '20000',
                'customerShippingAddressId' => '30000',
                'transId' => '40000'
            )
        ),
        'extraOptions' => '<![CDATA[]]>'
    ));

?>