<?php
    require('../config.inc.php');
    require('../AuthnetXML.class.php');

/*
    <?xml version="1.0" encoding="utf-8"?>
    <getHostedProfilePageRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
        <merchantAuthentication>
            <name>YourUserLogin</name>
            <transactionKey>YourTranKey</transactionKey>
        </merchantAuthentication>
        <customerProfileId>YourProfileID</customerProfileId>
        <hostedProfileSettings>
            <setting>
                <settingName>hostedProfileReturnUrl</settingName>
                <settingValue>https://blah.com/blah/</settingValue>
            </setting>
            <setting>
                <settingName>hostedProfileReturnUrlText</settingName>
                <settingValue>Continue to blah.</settingValue>
            </setting>
            <setting>
                <settingName>hostedProfilePageBorderVisible</settingName>
                <settingValue>true</settingValue>
            </setting>
        </hostedProfileSettings>
    </getHostedProfilePageRequest>
*/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getHostedProfilePageRequest(array(
        'customerProfileId' => 'YourProfileID',
        'hostedProfileSettings' => array(
            'setting' => array(
                'settingName' => 'hostedProfileReturnUrl',
                'settingValue' => 'https://blah.com/blah/',
            ),
            'setting' => array(
                'settingName' => 'hostedProfileReturnUrlText',
                'settingValue' => 'Continue to blah.',
            ),
            'setting' => array(
                'settingName' => 'hostedProfilePageBorderVisible',
                'settingValue' => 'true',
            )
        )
    ));

?>