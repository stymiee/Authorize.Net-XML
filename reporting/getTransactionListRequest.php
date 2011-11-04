<?php
/*************************************************************************************************

Use the Transaction Details XML API to get a list of transaction in a batch

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getTransactionListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <batchId>1221577</batchId>
</getTransactionListRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<getTransactionListResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <transactions>
    <transaction>
      <transId>2162566217</transId>
      <submitTimeUTC>2011-09-01T16:30:49Z</submitTimeUTC>
      <submitTimeLocal>2011-09-01T10:30:49</submitTimeLocal>
      <transactionStatus>settledSuccessfully</transactionStatus>
      <invoiceNumber>60</invoiceNumber>
      <firstName>Matteo</firstName>
      <lastName>Bignotti</lastName>
      <accountType>MasterCard</accountType>
      <accountNumber>XXXX4444</accountNumber>
      <settleAmount>1018.88</settleAmount>
    </transaction>
  </transactions>
</getTransactionListResponse>

*************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getTransactionListRequest(array(
        'batchId' => '1221577'
    ));

    echo $xml;
?>