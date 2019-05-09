<?php
/*
 * Raas
 *
 * This file was automatically generated for Tango Card, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace RaasLib\Controllers;

use RaasLib\APIException;
use RaasLib\APIHelper;
use RaasLib\Configuration;
use RaasLib\Models;
use RaasLib\Exceptions;
use RaasLib\Utils\DateTimeHelper;
use RaasLib\Http\HttpRequest;
use RaasLib\Http\HttpResponse;
use RaasLib\Http\HttpMethod;
use RaasLib\Http\HttpContext;
use RaasLib\Servers;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class OrdersController extends BaseController
{
    /**
     * @var OrdersController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return OrdersController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Places an order
     *
     * @param Models\CreateOrderRequestModel $body A CreateOrderRequest object
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createOrder(
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/orders';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth(Configuration::$platformName, Configuration::$platformKey);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'RaasLib\\Models\\OrderModel');
    }

    /**
     * Retrieves a single order
     *
     * @param string $referenceOrderID Reference Order ID
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getOrder(
        $referenceOrderID
    ) {
        //check that all required arguments are provided
        if (!isset($referenceOrderID)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/orders/{referenceOrderID}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'referenceOrderID' => $referenceOrderID,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'     => BaseController::USER_AGENT,
            'Accept'         => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$platformName, Configuration::$platformKey);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'RaasLib\\Models\\OrderModel');
    }

    /**
     * Resends an order
     *
     * @param  array  $options    Array with all options for search
     * @param string                          $options['referenceOrderID']    The order's reference order id
     * @param Models\OrderResendCriteriaModel $options['orderResendCriteria'] (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createResendOrder(
        $options
    ) {
        //check that all required arguments are provided
        if (!isset($options['referenceOrderID'])) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/orders/{referenceOrderID}/resends';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'referenceOrderID'    => $this->val($options, 'referenceOrderID'),
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'        => BaseController::USER_AGENT,
            'Accept'            => 'application/json',
            'content-type'      => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($this->val($options, 'orderResendCriteria'));

        //set HTTP basic auth parameters
        Request::auth(Configuration::$platformName, Configuration::$platformKey);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'RaasLib\\Models\\ResendOrderResponseModel');
    }

    /**
     * Retrieves a list of orders under a platform
     *
     * @param  array  $options    Array with all options for search
     * @param string   $options['accountIdentifier']  (optional) Account identifier
     * @param string   $options['customerIdentifier'] (optional) Customer identifier
     * @param string   $options['externalRefID']      (optional) External reference id
     * @param DateTime $options['startDate']          (optional) The start date
     * @param DateTime $options['endDate']            (optional) The end date
     * @param integer  $options['elementsPerBlock']   (optional) The number of elements per page
     * @param integer  $options['page']               (optional) The page number to return
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getOrders(
        $options
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'accountIdentifier'  => $this->val($options, 'accountIdentifier'),
            'customerIdentifier' => $this->val($options, 'customerIdentifier'),
            'externalRefID'      => $this->val($options, 'externalRefID'),
            'startDate'          => DateTimeHelper::toRfc3339DateTime($this->val($options, 'startDate')),
            'endDate'            => DateTimeHelper::toRfc3339DateTime($this->val($options, 'endDate')),
            'elementsPerBlock'   => $this->val($options, 'elementsPerBlock'),
            'page'               => $this->val($options, 'page'),
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => BaseController::USER_AGENT,
            'Accept'           => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$platformName, Configuration::$platformKey);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'RaasLib\\Models\\GetOrdersResponseModel');
    }


    /**
    * Array access utility method
     * @param  array          $arr         Array of values to read from
     * @param  string         $key         Key to get the value from the array
     * @param  mixed|null     $default     Default value to use if the key was not found
     * @return mixed
     */
    private function val($arr, $key, $default = null)
    {
        if (isset($arr[$key])) {
            return is_bool($arr[$key]) ? var_export($arr[$key], true) : $arr[$key];
        }
        return $default;
    }
}
