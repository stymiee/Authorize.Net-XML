<?php
/*************************************************************************************************

Use the Transaction Details XML API to get a list of unsettled transactions

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getUnsettledTransactionListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
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

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    try
    {
        $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
        $xml->getUnsettledTransactionListRequest();
    }
    catch (AuthnetXMLException $e)
    {
        echo $e;
        exit;
    }
?>

<!DOCTYPE html>
<html>
<html lang="en">
    <head>
        <title></title>
        <style type="text/css">
            table
            {
                border: 1px solid #cccccc;
                margin: auto;
                border-collapse: collapse;
                max-width: 90%;
            }

            table td
            {
                padding: 3px 5px;
                vertical-align: top;
                border-top: 1px solid #cccccc;
            }

            pre
            {
            	overflow-x: auto; /* Use horizontal scroller if needed; for Firefox 2, not needed in Firefox 3 */
            	white-space: pre-wrap; /* css-3 */
            	white-space: -moz-pre-wrap !important; /* Mozilla, since 1999 */
            	white-space: -pre-wrap; /* Opera 4-6 */
            	white-space: -o-pre-wrap; /* Opera 7 */ /*
            	width: 99%; */
            	word-wrap: break-word; /* Internet Explorer 5.5+ */
            }

            table th
            {
                background: #e5e5e5;
                color: #666666;
            }

            h1, h2
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>
            Transaction Detail :: Get Unsettled Transactions List
        </h1>
        <h2>
            Results
        </h2>
        <table>
            <tr>
                <th>Response</th>
                <td><?php echo $xml->messages->resultCode; ?></td>
            </tr>
            <tr>
                <th>code</th>
                <td><?php echo $xml->messages->message->code; ?></td>
            </tr>
            <tr>
                <th>Successful?</th>
                <td><?php echo ($xml->isSuccessful()) ? 'yes' : 'no'; ?></td>
            </tr>
            <tr>
                <th>Error?</th>
                <td><?php echo ($xml->isError()) ? 'yes' : 'no'; ?></td>
            </tr>
<?php
    foreach ($xml->transactions->transaction as $transaction)
    {
?>
            <tr>
                <th>Transaction</th>
                <td>
                    transId: <?php echo $transaction->transId; ?><br>
                    submitTimeUTC: <?php echo $transaction->submitTimeUTC; ?><br>
                    submitTimeLocal: <?php echo $transaction->submitTimeLocal; ?><br>
                    transactionStatus: <?php echo $transaction->transactionStatus; ?><br>
                    invoiceNumber: <?php echo $transaction->invoiceNumber; ?><br>
                    firstName: <?php echo $transaction->firstName; ?><br>
                    accountType: <?php echo $transaction->accountType; ?><br>
                    accountNumber: <?php echo $transaction->accountNumber; ?><br>
                    settleAmount: <?php echo $transaction->settleAmount; ?><br>
                </td>
            </tr>
<?php
    }
?>
        </table>
        <h2>
            Raw Input/Output
        </h2>
<?php
    echo $xml;
?>
    </body>
</html>
