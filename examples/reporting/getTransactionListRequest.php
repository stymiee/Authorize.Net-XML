<?php
/*************************************************************************************************

Use the Transaction Details XML API to get a list of transaction in a batch

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getTransactionListRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
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

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    try
    {
        $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
        $xml->getTransactionListRequest(array(
            'batchId' => '1221577'
        ));
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
            Transaction Detail :: Get Transactions List
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
