<?php
/*************************************************************************************************

Use the CIM XML API to process an Authorization and Capture transaction (Sale)

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createCustomerProfileTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>yourloginid</name>
    <transactionKey>yourtransactionkey</transactionKey>
  </merchantAuthentication>
  <transaction>
    <profileTransAuthCapture>
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
      <order>
        <invoiceNumber>INV000001</invoiceNumber>
        <description>description of transaction</description>
        <purchaseOrderNumber>PONUM000001</purchaseOrderNumber>
      </order>
      <taxExempt>false</taxExempt>
      <recurringBilling>false</recurringBilling>
      <cardCode>000</cardCode>
    </profileTransAuthCapture>
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
  <directResponse>1,1,1,This transaction has been approved.,IUADT3,Y,2165735174,INV000001,description of transaction,10.95,CC,auth_capture,12345,John,Smith,,123 Main Street,Townsville,NJ,12345,,800-555-1234,,newaddress@example.com,John,Doe,,123 Main St.,Bellevue,WA,98004,USA,1.00,,2.00,FALSE,PONUM000001,096DB23FEE4F3575B3270769CDD593C8,P,2,,,,,,,,,,,XXXX1111,Visa,,,,,,,,,,,,,,,,,4907537,100.0.0.1]]&gt;</directResponse>
</createCustomerProfileTransactionResponse>

*************************************************************************************************/

    require('../../config.inc.php');
    require('../../AuthnetXML.class.php');

    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createCustomerProfileTransactionRequest(array(
        'transaction' => array(
            'profileTransAuthCapture' => array(
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
                ),
                'customerProfileId' => '5427896',
                'customerPaymentProfileId' => '4796541',
                'customerShippingAddressId' => '4907537',
                'order' => array(
                    'invoiceNumber' => 'INV000001',
                    'description' => 'description of transaction',
                    'purchaseOrderNumber' => 'PONUM000001'
                ),
                'taxExempt' => 'false',
                'recurringBilling' => 'false',
                'cardCode' => '000'
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
            CIM :: Authorize and Capture
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
        <h2>
            Raw Input/Output
        </h2>
<?php
    echo $xml;
?>
    </body>
</html>
