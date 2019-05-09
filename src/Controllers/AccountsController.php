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
use RaasLib\Http\HttpRequest;
use RaasLib\Http\HttpResponse;
use RaasLib\Http\HttpMethod;
use RaasLib\Http\HttpContext;
use RaasLib\Servers;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class AccountsController extends BaseController
{
    /**
     * @var AccountsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return AccountsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Retrieves a list of accounts for a given customer
     *
     * @param string $customerIdentifier Customer Identifier
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getAccountsByCustomer(
        $customerIdentifier
    ) {
        //check that all required arguments are provided
        if (!isset($customerIdentifier)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/customers/{customerIdentifier}/accounts';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerIdentifier' => $customerIdentifier,
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

        return $mapper->mapClassArray($response->body, 'RaasLib\\Models\\AccountSummaryModel');
    }

    /**
     * Creates an account under a given customer
     *
     * @param  array  $options    Array with all options for search
     * @param string                           $options['customerIdentifier'] Customer Identifier
     * @param Models\CreateAccountRequestModel $options['body']               Request Body
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createAccount(
        $options
    ) {
        //check that all required arguments are provided
        if (!isset($options['customerIdentifier'], $options['body'])) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/customers/{customerIdentifier}/accounts';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerIdentifier' => $this->val($options, 'customerIdentifier'),
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => BaseController::USER_AGENT,
            'Accept'           => 'application/json',
            'content-type'     => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($this->val($options, 'body'));

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

        return $mapper->mapClass($response->body, 'RaasLib\\Models\\AccountModel');
    }

    /**
     * Retrieves all accounts under the platform
     *
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getAllAccounts()
    {

        //prepare query string for API call
        $_queryBuilder = '/accounts';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json'
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

        return $mapper->mapClassArray($response->body, 'RaasLib\\Models\\AccountModel');
    }

    /**
     * Retrieves a single account
     *
     * @param string $accountIdentifier Account Identifier
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getAccount(
        $accountIdentifier
    ) {
        //check that all required arguments are provided
        if (!isset($accountIdentifier)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountIdentifier}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountIdentifier' => $accountIdentifier,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'      => BaseController::USER_AGENT,
            'Accept'          => 'application/json'
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

        return $mapper->mapClass($response->body, 'RaasLib\\Models\\AccountModel');
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
