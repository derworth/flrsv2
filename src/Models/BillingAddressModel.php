<?php
/*
 * Raas
 *
 * This file was automatically generated for Tango Card, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace RaasLib\Models;

use JsonSerializable;

/**
 *Represents a Billing Address
 */
class BillingAddressModel implements JsonSerializable
{
    /**
     * The first name
     * @required
     * @var string $firstName public property
     */
    public $firstName;

    /**
     * The last name
     * @required
     * @var string $lastName public property
     */
    public $lastName;

    /**
     * The address
     * @required
     * @var string $addressLine1 public property
     */
    public $addressLine1;

    /**
     * An optional second address line
     * @var string|null $addressLine2 public property
     */
    public $addressLine2;

    /**
     * The city
     * @required
     * @var string $city public property
     */
    public $city;

    /**
     * The state/province
     * @required
     * @var string $state public property
     */
    public $state;

    /**
     * The postal code
     * @required
     * @var string $postalCode public property
     */
    public $postalCode;

    /**
     * The 2-letter country code
     * @required
     * @var string $country public property
     */
    public $country;

    /**
     * The billing contact's email address
     * @required
     * @var string $emailAddress public property
     */
    public $emailAddress;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $firstName    Initialization value for $this->firstName
     * @param string $lastName     Initialization value for $this->lastName
     * @param string $addressLine1 Initialization value for $this->addressLine1
     * @param string $addressLine2 Initialization value for $this->addressLine2
     * @param string $city         Initialization value for $this->city
     * @param string $state        Initialization value for $this->state
     * @param string $postalCode   Initialization value for $this->postalCode
     * @param string $country      Initialization value for $this->country
     * @param string $emailAddress Initialization value for $this->emailAddress
     */
    public function __construct()
    {
        if (9 == func_num_args()) {
            $this->firstName    = func_get_arg(0);
            $this->lastName     = func_get_arg(1);
            $this->addressLine1 = func_get_arg(2);
            $this->addressLine2 = func_get_arg(3);
            $this->city         = func_get_arg(4);
            $this->state        = func_get_arg(5);
            $this->postalCode   = func_get_arg(6);
            $this->country      = func_get_arg(7);
            $this->emailAddress = func_get_arg(8);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['firstName']    = $this->firstName;
        $json['lastName']     = $this->lastName;
        $json['addressLine1'] = $this->addressLine1;
        $json['addressLine2'] = $this->addressLine2;
        $json['city']         = $this->city;
        $json['state']        = $this->state;
        $json['postalCode']   = $this->postalCode;
        $json['country']      = $this->country;
        $json['emailAddress'] = $this->emailAddress;

        return $json;
    }
}
