<?php
/*************************************************************************************************

Use the AIM XML API to send a customer a transaction receipt

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<sendCustomerTransactionReceiptRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
  </merchantAuthentication>
  <refId>22689483</refId>
  <transId>2165665581</transId>
  <customerEmail>user@example.com</customerEmail>
  <emailSettings>
    <setting>
      <settingName>footerEmailReceipt</settingName>
      <settingValue>&lt;![CDATA[&lt;html&gt;&lt;head&gt;&lt;/head&gt;&lt;body&gt;some
      FOOTER stuff&lt;/body&gt;&lt;/html&gt;]]&gt;</settingValue>
    </setting>
  </emailSettings>
</sendCustomerTransactionReceiptRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<sendCustomerTransactionReceiptResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <refId>22689483</refId>
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
</sendCustomerTransactionReceiptResponse>

**************************************************************************************************/

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->sendCustomerTransactionReceiptRequest(array(
        'refId' => rand(1000000, 100000000),
        'transId' => '2165665581',
        'customerEmail' => 'user@example.com',
        'emailSettings' => array(
            'setting' => array(
                'settingName' => 'headerEmailReceipt',
                'settingValue' => '<![CDATA[<html><head></head><body>some HEADER stuff</body></html>]]>'
            ),
            'setting' => array(
                'settingName' => 'footerEmailReceipt',
                'settingValue' => '<![CDATA[<html><head></head><body>some FOOTER stuff</body></html>]]>'
            ),
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

            h1, h2
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>
            AIM :: Receipt Request
        </h1>
        <h2>
            Results
        </h2>
        <table>
            <tr>
                <th>Response</th>
                <td><?php echo $xml->messages->resultCode; ?></td>
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
