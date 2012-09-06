<?php
/*************************************************************************************************

Use the CIM XML API to process a Prior Authization Capture

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createCustomerProfileTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
  </merchantAuthentication>
  <transaction>
    <profileTransPriorAuthCapture>
      <amount>10.95</amount>
      <tax>
        <amount>1.00</amount>
        <name>WA state sales tax</name>
        <description>Washington state sales tax</description>
      </tax>
      <shipping>
        <amount>2.00</amount>
        <name>ground based shipping</name>
        <description>Ground based 5 to 10 day shipping</description>
      </shipping>
      <lineItems>
          <lineItem>
            <itemId>1</itemId>
            <name>vase</name>
            <description>Cannes logo</description>
            <quantity>18</quantity>
            <unitPrice>45.00</unitPrice>
          </lineItem>
          <lineItem>
            <itemId>2</itemId>
            <name>desk</name>
            <description>Big Desk</description>
            <quantity>10</quantity>
            <unitPrice>85.00</unitPrice>
          </lineItem>
        </lineItems>
      <customerProfileId>5427896</customerProfileId>
      <customerPaymentProfileId>4796541</customerPaymentProfileId>
      <customerShippingAddressId>4907537</customerShippingAddressId>
      <transId>2165735481</transId>
    </profileTransPriorAuthCapture>
  </transaction>
  <extraOptions>&lt;![CDATA[x_customer_ip=100.0.0.1]]&gt;</extraOptions>
</createCustomerProfileTransactionRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<createCustomerProfileTransactionResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <directResponse>1,1,1,This transaction has been approved.,PEW183,P,2165735481,INV000001,,10.95,CC,prior_auth_capture,12345,,,,,,,12345,,,,,,,,,,,,,1.00,,2.00,,,8C9E188187E3AA30D2B56415CCC9C0DB,,,,,,,,,,,,,XXXX1111,Visa,,,,,,,,,,,,,,,,,4907537,100.0.0.1]]&gt;</directResponse>
</createCustomerProfileTransactionResponse>

*************************************************************************************************/

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerProfileTransactionRequest(array(
        'transaction' => array(
            'profileTransPriorAuthCapture' => array(
                'amount' => '10.95',
                'tax' => array(
                    'amount' => '1.00',
                    'name' => 'WA state sales tax',
                    'description' => 'Washington state sales tax'
                ),
                'shipping' => array(
                    'amount' => '2.00',
                    'name' => 'ground based shipping',
                    'description' => 'Ground based 5 to 10 day shipping'
                ),
                'lineItems' => array(
                    'lineItem' => array(
                        0 => array(
                            'itemId' => '1',
                            'name' => 'vase',
                            'description' => 'Cannes logo',
                            'quantity' => '18',
                            'unitPrice' => '45.00'
                        ),
                        1 => array(
                            'itemId' => '2',
                            'name' => 'desk',
                            'description' => 'Big Desk',
                            'quantity' => '10',
                            'unitPrice' => '85.00'
                        )
                    )
                ),
                'customerProfileId' => '5427896',
                'customerPaymentProfileId' => '4796541',
                'customerShippingAddressId' => '4907537',
                'transId' => '2165735481'
            )
        ),
        'extraOptions' => '<![CDATA[x_customer_ip=100.0.0.1]]>'
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
            CIM :: Prior Authorization Capture
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
        </table>
        <h2>
            Raw Input/Output
        </h2>
<?php
    echo $xml;
?>
    </body>
</html>
