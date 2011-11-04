<?php
/*************************************************************************************************

Use the Transaction Details XML API to get a list of unsettled transactions

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getUnsettledTransactionListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
</getUnsettledTransactionListRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<getUnsettledTransactionListResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
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
      <transId>2165665291</transId>
      <submitTimeUTC>2011-11-03T18:16:58Z</submitTimeUTC>
      <submitTimeLocal>2011-11-03T12:16:58</submitTimeLocal>
      <transactionStatus>authorizedPendingCapture</transactionStatus>
      <firstName>Ellen</firstName>
      <lastName>Johnson</lastName>
      <accountType>MasterCard</accountType>
      <accountNumber>XXXX0015</accountNumber>
      <settleAmount>5.00</settleAmount>
    </transaction>
    <transaction>
      <transId>2165372282</transId>
      <submitTimeUTC>2011-10-28T00:15:51Z</submitTimeUTC>
      <submitTimeLocal>2011-10-27T18:15:51</submitTimeLocal>
      <transactionStatus>authorizedPendingCapture</transactionStatus>
      <invoiceNumber>760950</invoiceNumber>
      <firstName>Anitia Woody</firstName>
      <accountType>Visa</accountType>
      <accountNumber>XXXX4797</accountNumber>
      <settleAmount>106.90</settleAmount>
    </transaction>
    <transaction>
      <transId>2165371982</transId>
      <submitTimeUTC>2011-10-27T23:57:31Z</submitTimeUTC>
      <submitTimeLocal>2011-10-27T17:57:31</submitTimeLocal>
      <transactionStatus>authorizedPendingCapture</transactionStatus>
      <invoiceNumber>759851</invoiceNumber>
      <firstName>jack meoff</firstName>
      <accountType>Visa</accountType>
      <accountNumber>XXXX4797</accountNumber>
      <settleAmount>1081.90</settleAmount>
    </transaction>
  </transactions>
</getUnsettledTransactionListResponse>

*************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->getUnsettledTransactionListRequest();

    echo $xml;
?>