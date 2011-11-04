<?php
/*************************************************************************************************

Use the Transaction Details XML API to get a summary of a settled batch

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getBatchStatisticsRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <batchId>1221577</batchId>
</getBatchStatisticsRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<getBatchStatisticsResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <batch>
    <batchId>1221577</batchId>
    <settlementTimeUTC>2011-09-01T16:38:54Z</settlementTimeUTC>
    <settlementTimeLocal>2011-09-01T10:38:54</settlementTimeLocal>
    <settlementState>settledSuccessfully</settlementState>
    <paymentMethod>creditCard</paymentMethod>
    <statistics>
      <statistic>
        <accountType>MasterCard</accountType>
        <chargeAmount>1018.88</chargeAmount>
        <chargeCount>1</chargeCount>
        <refundAmount>0.00</refundAmount>
        <refundCount>0</refundCount>
        <voidCount>0</voidCount>
        <declineCount>0</declineCount>
        <errorCount>0</errorCount>
      </statistic>
    </statistics>
  </batch>
</getBatchStatisticsResponse>

*************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getBatchStatisticsRequest(array(
        'batchId' => '1221577'
    ));

    echo $xml;

?>