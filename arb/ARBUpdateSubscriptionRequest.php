<?php
/*************************************************************************************************

Use the ARB XML API to update a subscription

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<ARBUpdateSubscriptionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <refId>Sample</refId>
  <subscriptionId>1207505</subscriptionId>
  <subscription>
    <payment>
      <creditCard>
        <cardNumber>6011000000000012</cardNumber>
        <expirationDate>2016-08</expirationDate>
      </creditCard>
    </payment>
  </subscription>
</ARBUpdateSubscriptionRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<ARBUpdateSubscriptionResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <refId>Sample</refId>
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
</ARBUpdateSubscriptionResponse>

*************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->ARBUpdateSubscriptionRequest(array(
        'refId' => 'Sample',
        'subscriptionId' => '1207505',
        'subscription' => array(
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' => '6011000000000012',
                    'expirationDate' => '2016-08'
                ),
            ),
        ),
    ));

    echo $xml;
?>