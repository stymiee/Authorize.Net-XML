<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <ARBCreateSubscriptionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>mytestacct</name>
            <transactionKey>112223344</transactionKey>
        </merchantAuthentication>
        <refId>Sample</refId>
        <subscription>
            <name>Sample subscription</name>
            <paymentSchedule>
                <interval>
                    <length>1</length>
                    <unit>months</unit>
                </interval>
                <startDate>2007-03-15</startDate>
                <totalOccurrences>12</totalOccurrences>
                <trialOccurrences>1</trialOccurrences>
            </paymentSchedule>
            <amount>10.29</amount>
            <trialAmount>0.00</trialAmount>
            <payment>
                <creditCard>
                    <cardNumber>4111111111111111</cardNumber>
                    <expirationDate>2008-08</expirationDate>
                </creditCard>
            </payment>
            <billTo>
                <firstName>John</firstName>
                <lastName>Smith</lastName>
            </billTo>
        </subscription>
    </ARBCreateSubscriptionRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->ARBGetSubscriptionStatusRequest(array(
        'refId' => 'Sample',
        'subscription' => array(
            'name' => 'Sample subscription',
            'paymentSchedule' => array(
                'interval' => array(
                    'length' => '1',
                    'unit' => 'months'
                ),
                'startDate' = > '2011-03-15',
                'totalOccurrences' = > '12',
                'trialOccurrences' = > '1'
            ),
            'amount' => '10.29',
            'trialAmount' => '0.00',
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' = > '4111111111111111',
                    'expirationDate' = > '2008-08'
                )
            ),
            'billTo' => array(
                'firstName' = > 'John',
                'lastName' = > 'Smith'
            )
        )
    ));

?>