<?php
    require('PHPUnit/Framework/TestCase.php');
    require(dirname(__FILE__) . '/../../config.inc.php');
    require(dirname(__FILE__) . '/../../AuthnetXML.class.php');

    class AuthnetXMLTest extends PHPUnit_Framework_Testcase {
        protected $xml;

        protected function setUp() {
            $this->xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
        }

        public function testAuthCapture() {
            $this->xml->createTransactionRequest(array(
                'refId' => rand(1000000, 100000000),
                'transactionRequest' => array(
                    'transactionType' => 'authCaptureTransaction',
                    'amount' => 5,
                    'payment' => array(
                        'creditCard' => array(
                            'cardNumber' => '4111111111111111',
                            'expirationDate' => '122016',
                            'cardCode' => '999',
                        ),
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

            $this->assertEquals('Ok', $this->xml->messages->resultCode);
            $this->assertEquals('I00001', $this->xml->messages->message->code);
            $this->assertTrue($this->xml->isSuccessful());
            $this->assertFalse($this->xml->isError());
        }

        public function testAuthOnly() {
            $this->xml->createTransactionRequest(array(
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

            $this->assertEquals('Ok', $this->xml->messages->resultCode);
            $this->assertEquals('I00001', $this->xml->messages->message->code);
            $this->assertTrue($this->xml->isSuccessful());
            $this->assertFalse($this->xml->isError());
        }

        public function testCaptureOnly() {
            $this->xml->createTransactionRequest(array(
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

            $this->assertEquals('Ok', $this->xml->messages->resultCode);
            $this->assertEquals('I00001', $this->xml->messages->message->code);
            $this->assertTrue($this->xml->isSuccessful());
            $this->assertFalse($this->xml->isError());
        }

        public function testPriorAuthCapture() {
            $this->xml->createTransactionRequest(array(
                'refId' => rand(1000000, 100000000),
                'transactionRequest' => array(
                    'transactionType' => 'authOnlyTransaction',
                    'amount' => 5,
                    'payment' => array(
                        'creditCard' => array(
                            'cardNumber' => '4111111111111111',
                            'expirationDate' => '122015',
                            'cardCode' => '123',
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

            $authorization_code = $this->xml->transactionResponse->authCode;

            $this->xml->createTransactionRequest(array(
                'refId' => rand(1000000, 100000000),
                'transactionRequest' => array(
                    'transactionType' => 'captureOnlyTransaction',
                    'amount' => 5,
                    'authCode' => $authorization_code
                ),
            ));

            $this->assertEquals('Ok', $this->xml->messages->resultCode);
            $this->assertEquals('I00001', $this->xml->messages->message->code);
            $this->assertTrue($this->xml->isSuccessful());
            $this->assertFalse($this->xml->isError());
        }

        public function testRefund() {
            $this->xml->createTransactionRequest(array(
                'refId' => rand(1000000, 100000000),
                'transactionRequest' => array(
                    'transactionType' => 'authCaptureTransaction',
                    'amount' => 5,
                    'payment' => array(
                        'creditCard' => array(
                            'cardNumber' => '5111111111111111',
                            'expirationDate' => '122016',
                            'cardCode' => '999',
                        ),
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

            $authorization_code = $this->xml->transactionResponse->authCode;

            $this->xml->createTransactionRequest(array(
                'refId' => rand(1000000, 100000000),
                'transactionRequest' => array(
                    'transactionType' => 'refundTransaction',
                    'amount' => 5,
                    'payment' => array(
                        'creditCard' => array(
                            'cardNumber' => 'XXXX1111',
                            'expirationDate' => '122016'
                        )
                    ),
                    'authCode' => $authorization_code
                ),
            ));
        }

        public function testVoid() {

        }

        public function testSendCustomerTransactionReceipt() {

        }

    }
?>