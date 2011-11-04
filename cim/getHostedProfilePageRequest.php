<?php
/*
<?xml version="1.0"?>
<getHostedProfilePageRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <customerProfileId>5427896</customerProfileId>
  <hostedProfileSettings>
    <setting>
      <settingName>hostedProfilePageBorderVisible</settingName>
      <settingValue>true</settingValue>
    </setting>
  </hostedProfileSettings>
</getHostedProfilePageRequest>

<?xml version="1.0" encoding="utf-8"?>
<getHostedProfilePageResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <token>NuQRg+4F+GPFB6zwXly/nw6HCdJvok9jrKQ1cNlgTlIJwbjkZKOBQeFd2oCW7L2w3fIYmuwujRbl/8TCS6ocLraY4l5dX8tS0N4QV7CCRTPYpccMzBVkKgmfuwban2B/GYGgKSCegS2QT26GT5xjiocxMz8QzXECEGRcy0OWeNCr5l4JGq4Spo/21SOYQuIrSfhgzypn0Y39k6p4eHO02G07oV3fxLuAIyfzvFF+ZTs=</token>
</getHostedProfilePageResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getHostedProfilePageRequest(array(
        'customerProfileId' => '5427896',
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

    echo $xml;

?>