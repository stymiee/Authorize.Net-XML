<?php
/*************************************************************************************************

Use the Transaction Details XML API to get the details of a transaction

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<getTransactionDetailsRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
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

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    try
    {
        $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
        $xml->getTransactionDetailsRequest(array(
            'transId' => '2162566217'
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
            Transaction Detail :: Transaction Details
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
                <th>Transaction</th>
                <td>
                    transId: <?php echo $xml->transaction->transId; ?><br>
                    submitTimeUTC: <?php echo $xml->transaction->submitTimeUTC; ?><br>
                    submitTimeLocal: <?php echo $xml->transaction->submitTimeLocal; ?><br>
                    transactionType: <?php echo $xml->transaction->transactionType; ?><br>
                    transactionStatus: <?php echo $xml->transaction->transactionStatus; ?><br>
                    responseCode: <?php echo $xml->transaction->responseCode; ?><br>
                    responseReasonCode: <?php echo $xml->transaction->responseReasonCode; ?><br>
                    responseReasonDescription: <?php echo $xml->transaction->responseReasonDescription; ?><br>
                    authCode: <?php echo $xml->transaction->authCode; ?><br>
                    AVSResponse: <?php echo $xml->transaction->AVSResponse; ?><br>
                    batchId: <?php echo $xml->transaction->batch->batchId; ?><br>
                    settlementTimeUTC: <?php echo $xml->transaction->batch->settlementTimeUTC; ?><br>
                    settlementTimeLocal: <?php echo $xml->transaction->batch->settlementTimeLocal; ?><br>
                    settlementState: <?php echo $xml->transaction->batch->settlementState; ?><br>
                    invoiceNumber: <?php echo $xml->transaction->order->invoiceNumber; ?><br>
                    description: <?php echo $xml->transaction->order->description; ?><br>
                    authAmount: <?php echo $xml->transaction->authAmount; ?><br>
                    settleAmoun: <?php echo $xml->transaction->settleAmount; ?><br>
                    taxExempt: <?php echo $xml->transaction->taxExempt; ?><br>
                    cardNumber: <?php echo $xml->transaction->payment->creditCard->cardNumber; ?><br>
                    expirationDate: <?php echo $xml->transaction->payment->creditCard->expirationDate; ?><br>
                    cardType: <?php echo $xml->transaction->payment->creditCard->cardType; ?><br>
                    id: <?php echo $xml->transaction->customer->id; ?><br>
                    firstName: <?php echo $xml->transaction->billTo->firstName; ?><br>
                    lastName: <?php echo $xml->transaction->billTo->lastName; ?><br>
                    address: <?php echo $xml->transaction->billTo->address; ?><br>
                    city: <?php echo $xml->transaction->billTo->city; ?><br>
                    state: <?php echo $xml->transaction->billTo->state; ?><br>
                    zip: <?php echo $xml->transaction->billTo->zip; ?><br>
                    country: <?php echo $xml->transaction->billTo->country; ?><br>
                    phoneNumber: <?php echo $xml->transaction->billTo->phoneNumber; ?><br>
                    recurringBilling: <?php echo $xml->transaction->recurringBilling; ?>
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
