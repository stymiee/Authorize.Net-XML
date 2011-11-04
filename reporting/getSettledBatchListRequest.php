<?php
/*************************************************************************************************

Use the Transaction Details XML API to get a list of settled batches

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getSettledBatchListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <includeStatistics>true</includeStatistics>
  <firstSettlementDate>2011-09-01T08:15:30</firstSettlementDate>
  <lastSettlementDate>2011-09-30T08:15:30</lastSettlementDate>
</getSettledBatchListRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<getSettledBatchListResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <batchList>
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
    <batch>
      <batchId>1221740</batchId>
      <settlementTimeUTC>2011-09-01T20:59:17Z</settlementTimeUTC>
      <settlementTimeLocal>2011-09-01T14:59:17</settlementTimeLocal>
      <settlementState>settledSuccessfully</settlementState>
      <paymentMethod>creditCard</paymentMethod>
      <statistics>
        <statistic>
          <accountType>MasterCard</accountType>
          <chargeAmount>8035.83</chargeAmount>
          <chargeCount>2</chargeCount>
          <refundAmount>150.06</refundAmount>
          <refundCount>1</refundCount>
          <voidCount>0</voidCount>
          <declineCount>0</declineCount>
          <errorCount>0</errorCount>
        </statistic>
      </statistics>
    </batch>
  </batchList>
</getSettledBatchListResponse>

*************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getSettledBatchListRequest(array(
        'includeStatistics' => 'true',
        'firstSettlementDate' => '2011-09-01T08:15:30',
        'lastSettlementDate' => '2011-09-30T08:15:30',
    ));

    echo $xml;

?>