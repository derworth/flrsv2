<?php
/*
 * Raas
 *
 * This file was automatically generated for Tango Card, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace RaasLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class OrderResendCriteriaModel implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $newEmail public property
     */
    public $newEmail;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $newEmail Initialization value for $this->newEmail
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->newEmail = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['newEmail'] = $this->newEmail;

        return $json;
    }
}
