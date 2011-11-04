<?php
/*************************************************************************************************

Use the Transaction Details XML API to get the details of a transaction

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getTransactionDetailsRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <transId>2162566217</transId>
</getTransactionDetailsRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<getTransactionDetailsResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <transaction>
    <transId>2162566217</transId>
    <submitTimeUTC>2011-09-01T16:30:49.39Z</submitTimeUTC>
    <submitTimeLocal>2011-09-01T10:30:49.39</submitTimeLocal>
    <transactionType>authCaptureTransaction</transactionType>
    <transactionStatus>settledSuccessfully</transactionStatus>
    <responseCode>1</responseCode>
    <responseReasonCode>1</responseReasonCode>
    <responseReasonDescription>Approval</responseReasonDescription>
    <authCode>JPG9DJ</authCode>
    <AVSResponse>Y</AVSResponse>
    <batch>
      <batchId>1221577</batchId>
      <settlementTimeUTC>2011-09-01T16:38:54.52Z</settlementTimeUTC>
      <settlementTimeLocal>2011-09-01T10:38:54.52</settlementTimeLocal>
      <settlementState>settledSuccessfully</settlementState>
    </batch>
    <order>
      <invoiceNumber>60</invoiceNumber>
      <description>Auto-charge for Invoice #60</description>
    </order>
    <authAmount>1018.88</authAmount>
    <settleAmount>1018.88</settleAmount>
    <taxExempt>false</taxExempt>
    <payment>
      <creditCard>
        <cardNumber>XXXX4444</cardNumber>
        <expirationDate>XXXX</expirationDate>
        <cardType>MasterCard</cardType>
      </creditCard>
    </payment>
    <customer>
      <id>4</id>
    </customer>
    <billTo>
      <firstName>Matteo</firstName>
      <lastName>Bignotti</lastName>
      <address>625 Broadway Suite 1025</address>
      <city>San Diego</city>
      <state>CA</state>
      <zip>92101</zip>
      <country>United States</country>
      <phoneNumber>(619) 274-0494</phoneNumber>
    </billTo>
    <recurringBilling>false</recurringBilling>
  </transaction>
</getTransactionDetailsResponse>

*************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getTransactionDetailsRequest(array(
        'transId' => '2162566217'
    ));

    echo $xml;
?>