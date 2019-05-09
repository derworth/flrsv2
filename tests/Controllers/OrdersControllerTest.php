<?php
/*
 * Raas
 *
 * This file was automatically generated for Tango Card, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace RaasLib\Tests;

use RaasLib\APIException;
use RaasLib\Exceptions;
use RaasLib\APIHelper;
use RaasLib\Models;
use RaasLib\Utils\DateTimeHelper;

class OrdersControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RaasLib\Controllers\OrdersController Controller instance
     */
    protected static $controller;

    /**
     * @var HttpCallBackCatcher Callback
     */
    protected $httpResponse;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass()
    {
        $client = new \RaasLib\RaasClient();
        self::$controller = $client->getOrders();
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * Tests placing an order with the minimum parameters required
     */
    public function testPlaceOrderWithMinimumCriteria()
    {
        // Parameters for the API call
        $body = TestHelper::getJsonMapper()->mapClass(json_decode(
            "{   \"accountIdentifier\": \"sdkautotest5\",   \"amount\": 1.00,   \"customerIdentifier\": \"sdkauto" .
            "test4\",   \"sendEmail\": false,   \"utid\": \"U561593\" }"),
            'RaasLib\\Models\\CreateOrderRequestModel'
        );

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->createOrder($body);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            201,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 201"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertTrue(
            TestHelper::isJsonObjectProperSubsetOf(
                "{\n  \"referenceOrderID\": \"RA180426-1401-64\",\n  \"customerIdentifier\": \"sdkautotest4\",\n  \"a" .
                "ccountIdentifier\": \"sdkautotest5\",\n  \"accountNumber\": \"A32386768\",\n  \"amountCharged\": {\n" .
                "    \"value\": 1,\n    \"currencyCode\": \"USD\",\n    \"total\": 1\n  },\n  \"denomination\": {\n  " .
                "  \"value\": 1,\n    \"currencyCode\": \"USD\"\n  },\n  \"utid\": \"U561593\",\n  \"rewardName\": \"" .
                "Reward Link\",\n  \"sender\": {\n    \"firstName\": \"\",\n    \"lastName\": \"\",\n    \"email\": " .
                "\"\"\n  },\n  \"recipient\": {\n    \"email\": \"\",\n    \"firstName\": \"\",\n    \"lastName\": \"" .
                "\"\n  },\n  \"sendEmail\": false,\n  \"status\": \"COMPLETE\",\n  \"createdAt\": \"2018-04-26T20:08:" .
                "59.624Z\",\n  \"reward\": {\n    \"credentials\": {\n      \"Redemption Link\": \"https://sandbox.re" .
                "wardlink.io/r/1/ed0HtzSblNV6oFddNnnlf68eXzGQoREvcxwxu_Vi5Wk\"\n    },\n    \"credentialList\": [\n  " .
                "    {\n        \"label\": \"Redemption Link\",\n        \"value\": \"https://sandbox.rewardlink.io/r" .
                "/1/ed0HtzSblNV6oFddNnnlf68eXzGQoREvcxwxu_Vi5Wk\",\n        \"type\": \"url\",\n        \"credentialT" .
                "ype\": \"redemptionUrl\"\n      }\n    ],\n    \"redemptionInstructions\": \"<p>&bull; Click on the " .
                "redemption link above to activate your Reward Link.<br />\\r\\n&bull; Next, you will be able to spen" .
                "d your balance on retail gift cards.</p>\\r\\n\\r\\n<p>If you don&#39;t want to spend your entire Re" .
                "ward Link value right away, save the email or URL and return via the redemption link - your value wi" .
                "ll be waiting to be spent. This allows you to store the balance to redeem at another time.</p>\\r\\n" .
                "\"\n  }\n}",
                $this->httpResponse->getResponse()->getRawBody(),
                false,
                true,
                false
            ),
            "Response body does not match in keys"
        );
    }

    /**
     * Tests retrieving a single order
     */
    public function testGetOrder()
    {
        // Parameters for the API call
        $referenceOrderID = 'RA180426-1401-64';

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->getOrder($referenceOrderID);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertTrue(
            TestHelper::isJsonObjectProperSubsetOf(
                "{\n  \"referenceOrderID\": \"RA180426-1401-64\",\n  \"customerIdentifier\": \"sdkautotest4\",\n  \"a" .
                "ccountIdentifier\": \"sdkautotest5\",\n  \"accountNumber\": \"A32386768\",\n  \"amountCharged\": {\n" .
                "    \"value\": 1,\n    \"currencyCode\": \"USD\",\n    \"total\": 1\n  },\n  \"marginShare\": {\n   " .
                " \"value\": 0,\n    \"currencyCode\": \"USD\"\n  },\n  \"denomination\": {\n    \"value\": 1,\n    " .
                "\"currencyCode\": \"USD\"\n  },\n  \"utid\": \"U561593\",\n  \"rewardName\": \"Reward Link\",\n  \"s" .
                "ender\": {\n    \"firstName\": \"\",\n    \"lastName\": \"\",\n    \"email\": \"\"\n  },\n  \"recipi" .
                "ent\": {\n    \"email\": \"\",\n    \"firstName\": \"\",\n    \"lastName\": \"\"\n  },\n  \"sendEmai" .
                "l\": false,\n  \"status\": \"COMPLETE\",\n  \"createdAt\": \"2018-04-26T20:08:59.624Z\",\n  \"reward" .
                "\": {\n    \"credentials\": {\n      \"Redemption Link\": \"https://sandbox.rewardlink.io/r/1/ed0Htz" .
                "SblNV6oFddNnnlf68eXzGQoREvcxwxu_Vi5Wk\"\n    },\n    \"credentialList\": [\n      {\n        \"label" .
                "\": \"Redemption Link\",\n        \"value\": \"https://sandbox.rewardlink.io/r/1/ed0HtzSblNV6oFddNnn" .
                "lf68eXzGQoREvcxwxu_Vi5Wk\",\n        \"type\": \"url\",\n        \"credentialType\": \"redemptionUrl" .
                "\"\n      }\n    ],\n    \"redemptionInstructions\": \"<p>&bull; Click on the redemption link above " .
                "to activate your Reward Link.<br />\\r\\n&bull; Next, you will be able to spend your balance on reta" .
                "il gift cards.</p>\\r\\n\\r\\n<p>If you don&#39;t want to spend your entire Reward Link value right " .
                "away, save the email or URL and return via the redemption link - your value will be waiting to be sp" .
                "ent. This allows you to store the balance to redeem at another time.</p>\\r\\n\"\n  }\n}",
                $this->httpResponse->getResponse()->getRawBody(),
                true,
                true,
                false
            ),
            "Response body does not match in keys and/or values"
        );
    }
}
