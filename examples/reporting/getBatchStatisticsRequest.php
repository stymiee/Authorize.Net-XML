<?php
/*************************************************************************************************

Use the Transaction Details XML API to get a summary of a settled batch

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getBatchStatisticsRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
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

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    try
    {
        $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
        $xml->getBatchStatisticsRequest(array(
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
            Transaction Detail :: Get Batch Statistics
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
            <tr>
                <th>Batch</th>
                <td>
                    batchId: <?php echo $xml->batch->batchId; ?><br>
                    settlementTimeUTC: <?php echo $xml->batch->settlementTimeUTC; ?><br>
                    settlementTimeLocal: <?php echo $xml->batch->settlementTimeLocal; ?><br>
                    settlementState: <?php echo $xml->batch->settlementState; ?><br>
                    paymentMethod: <?php echo $xml->batch->paymentMethod; ?><br>
                    accountType: <?php echo $xml->batch->statistics->statistic->accountType; ?><br>
                    chargeAmount: <?php echo $xml->batch->statistics->statistic->chargeAmount; ?><br>
                    chargeCount: <?php echo $xml->batch->statistics->statistic->chargeCount; ?><br>
                    refundAmount: <?php echo $xml->batch->statistics->statistic->refundAmount; ?><br>
                    refundCount: <?php echo $xml->batch->statistics->statistic->refundCount; ?><br>
                    voidCount: <?php echo $xml->batch->statistics->statistic->voidCount; ?><br>
                    declineCount: <?php echo $xml->batch->statistics->statistic->declineCount; ?><br>
                    errorCount: <?php echo $xml->batch->statistics->statistic->errorCount; ?>
                </td>
            </tr>
        </table>
        <h2>
            Raw Input/Output
        </h2>
<?php
    echo $xml;
?>
    </body>
</html>
