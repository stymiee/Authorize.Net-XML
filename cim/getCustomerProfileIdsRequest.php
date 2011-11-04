<?php
/*
<?xml version="1.0"?>
<getCustomerProfileIdsRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
</getCustomerProfileIdsRequest>

<?xml version="1.0" encoding="utf-8"?>
<getCustomerProfileIdsResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <ids>
    <numericString>623</numericString>
    <numericString>698</numericString>
    <numericString>699</numericString>
    <numericString>700</numericString>
    <numericString>2550</numericString>
    <numericString>6013</numericString>
    <numericString>6015</numericString>
    <numericString>8990</numericString>
    <numericString>9110</numericString>
    <numericString>120520</numericString>
    <numericString>120521</numericString>
  </ids>
</getCustomerProfileIdsResponse>
*/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getCustomerProfileIdsRequest();

    echo $xml;

?>