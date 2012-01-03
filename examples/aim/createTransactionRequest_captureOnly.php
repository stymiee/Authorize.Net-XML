<?php
/*************************************************************************************************

Use the AIM XML API to a Unlinked Capture (refund for a transaction NOT performed through the API)

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
  </merchantAuthentication>
  <refId>23079223</refId>
  <transactionRequest>
    <transactionType>captureOnlyTransaction</transactionType>
    <amount>5</amount>
    <payment>
      <creditCard>
        <cardNumber>5424000000000015</cardNumber>
        <expirationDate>122016</expirationDate>
      </creditCard>
    </payment>
    <authCode>123456</authCode>
  </transactionRequest>
</createTransactionRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<createTransactionResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <refId>23079223</refId>
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <transactionResponse>
    <responseCode>1</responseCode>
    <authCode>123456</authCode>
    <avsResultCode>P</avsResultCode>
    <cvvResultCode/>
    <cavvResultCode/>
    <transId>2165668077</transId>
    <refTransID/>
    <transHash>4557B8624CA624621E776DB8891F69A8</transHash>
    <testRequest>0</testRequest>
    <accountNumber>XXXX0015</accountNumber>
    <accountType>MasterCard</accountType>
    <messages>
      <message>
        <code>1</code>
        <description>This transaction has been approved.</description>
      </message>
    </messages>
  </transactionResponse>
</createTransactionResponse>

*************************************************************************************************/

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createTransactionRequest(array(
        'refId' => rand(1000000, 100000000),
        'transactionRequest' => array(
            'transactionType' => 'captureOnlyTransaction',
            'amount' => 5,
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' => '5424000000000015',
                    'expirationDate' => '122016'
                )
            ),
            'authCode' => '123456'
        ),
    ));
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
        </style>
    </head>
    <body>
        <h1>
            AIM :: Capture Only
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
                <th>transId</th>
                <td><?php echo $xml->transactionResponse->transId; ?></td>
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
