<?php
/*
<?xml version="1.0"?>
<updateSplitTenderGroupRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <splitTenderId>123456</splitTenderId>
  <splitTenderStatus>voided</splitTenderStatus>
</updateSplitTenderGroupRequest>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->updateSplitTenderGroupRequest(array(
        'splitTenderId' => '123456',
        'splitTenderStatus' => 'voided'
    ));

    echo $xml;

?>