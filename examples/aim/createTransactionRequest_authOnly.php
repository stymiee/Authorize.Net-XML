<?php
/*************************************************************************************************

Use the AIM XML API to process an Authorization Only transaction

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
  </merchantAuthentication>
  <refId>35632477</refId>
  <transactionRequest>
    <transactionType>authOnlyTransaction</transactionType>
    <amount>5</amount>
    <payment>
      <creditCard>
        <cardNumber>5424000000000015</cardNumber>
        <expirationDate>122016</expirationDate>
        <cardCode>999</cardCode>
      </creditCard>
    </payment>
    <order>
        <invoiceNumber>1324567890</invoiceNumber>
        <description>this is a test transaction</description>
    </order>
    <lineItems>
      <lineItem>
        <itemId>1</itemId>
        <name>vase</name>
        <description>Cannes logo</description>
        <quantity>18</quantity>
        <unitPrice>45.00</unitPrice>
      </lineItem>
    </lineItems>
    <tax>
      <amount>4.26</amount>
      <name>level2 tax name</name>
      <description>level2 tax</description>
    </tax>
    <duty>
      <amount>8.55</amount>
      <name>duty name</name>
      <description>duty description</description>
    </duty>
    <shipping>
      <amount>4.26</amount>
      <name>level2 tax name</name>
      <description>level2 tax</description>
    </shipping>
    <poNumber>456654</poNumber>
    <customer>
      <id>18</id>
      <email>someone@blackhole.tv</email>
    </customer>
    <billTo>
      <firstName>Ellen</firstName>
      <lastName>Johnson</lastName>
      <company>Souveniropolis</company>
      <address>14 Main Street</address>
      <city>Pecan Springs</city>
      <state>TX</state>
      <zip>44628</zip>
      <country>USA</country>
    </billTo>
    <shipTo>
      <firstName>China</firstName>
      <lastName>Bayles</lastName>
      <company>Thyme for Tea</company>
      <address>12 Main Street</address>
      <city>Pecan Springs</city>
      <state>TX</state>
      <zip>44628</zip>
      <country>USA</country>
    </shipTo>
    <customerIP>192.168.1.1</customerIP>
    <transactionSettings>
      <setting>
        <settingName>testRequest</settingName>
        <settingValue>false</settingValue>
      </setting>
    </transactionSettings>
    <userFields>
      <userField>
        <name>favorite_color</name>
        <value>blue</value>
      </userField>
    </userFields>
  </transactionRequest>
</createTransactionRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<createTransactionResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <refId>35632477</refId>
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <transactionResponse>
    <responseCode>1</responseCode>
    <authCode>FI9390</authCode>
    <avsResultCode>Y</avsResultCode>
    <cvvResultCode>P</cvvResultCode>
    <cavvResultCode>2</cavvResultCode>
    <transId>2165665234</transId>
    <refTransID/>
    <transHash>FEA0C731971961B5CFC36B4A4E06C99C</transHash>
    <testRequest>0</testRequest>
    <accountNumber>XXXX0015</accountNumber>
    <accountType>MasterCard</accountType>
    <messages>
      <message>
        <code>1</code>
        <description>This transaction has been approved.</description>
      </message>
    </messages>
    <userFields>
      <userField>
        <name>favorite_color</name>
        <value>blue</value>
      </userField>
    </userFields>
  </transactionResponse>
</createTransactionResponse>

*************************************************************************************************/

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createTransactionRequest(array(
        'refId' => rand(1000000, 100000000),
        'transactionRequest' => array(
            'transactionType' => 'authOnlyTransaction',
            'amount' => 5,
            'payment' => array(
                'creditCard' => array(
                    'cardNumber' => '5424000000000015',
                    'expirationDate' => '122016',
                    'cardCode' => '999',
                ),
            ),
            'order' => array(
                'invoiceNumber' => '1324567890',
                'description' => 'this is a test transaction',
            ),
            'lineItems' => array(
                'lineItem' => array(
                    'itemId' => '1',
                    'name' => 'vase',
                    'description' => 'Cannes logo',
                    'quantity' => '18',
                    'unitPrice' => '45.00',
                ),
            ),
            'tax' => array(
               'amount' => '4.26',
               'name' => 'level2 tax name',
               'description' => 'level2 tax',
            ),
            'duty' => array(
               'amount' => '8.55',
               'name' => 'duty name',
               'description' => 'duty description',
            ),
            'shipping' => array(
               'amount' => '4.26',
               'name' => 'level2 tax name',
               'description' => 'level2 tax',
            ),
            'poNumber' => '456654',
            'customer' => array(
               'id' => '18',
               'email' => 'someone@blackhole.tv',
            ),
            'billTo' => array(
               'firstName' => 'Ellen',
               'lastName' => 'Johnson',
               'company' => 'Souveniropolis',
               'address' => '14 Main Street',
               'city' => 'Pecan Springs',
               'state' => 'TX',
               'zip' => '44628',
               'country' => 'USA',
            ),
            'shipTo' => array(
               'firstName' => 'China',
               'lastName' => 'Bayles',
               'company' => 'Thyme for Tea',
               'address' => '12 Main Street',
               'city' => 'Pecan Springs',
               'state' => 'TX',
               'zip' => '44628',
               'country' => 'USA',
            ),
            'customerIP' => '192.168.1.1',
            'transactionSettings' => array(
                'setting' => array(
                    'settingName' => 'allowPartialAuth',
                    'settingValue' => 'false',
                ),
                'setting' => array(
                    'settingName' => 'duplicateWindow',
                    'settingValue' => '0',
                ),
                'setting' => array(
                    'settingName' => 'emailCustomer',
                    'settingValue' => 'false',
                ),
                'setting' => array(
                  'settingName' => 'recurringBilling',
                  'settingValue' => 'false',
                ),
                'setting' => array(
                    'settingName' => 'testRequest',
                    'settingValue' => 'false',
                ),
            ),
            'userFields' => array(
                'userField' => array(
                    'name' => 'MerchantDefinedFieldName1',
                    'value' => 'MerchantDefinedFieldValue1',
                ),
                'userField' => array(
                    'name' => 'favorite_color',
                    'value' => 'blue',
                ),
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
            AIM :: Authorization Only
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
                <th>authCode</th>
                <td><?php echo $xml->transactionResponse->authCode; ?></td>
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
