<?php
/*
 * Raas
 *
 * This file was automatically generated for Tango Card, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace RaasLib\Models;

use JsonSerializable;

/**
 *Represents a RaaS 4xx Error
 */
class RaasClientErrorModel implements JsonSerializable
{
    /**
     * The path to the invalid value
     * @required
     * @var string $path public property
     */
    public $path;

    /**
     * The error message
     * @required
     * @var string $message public property
     */
    public $message;

    /**
     * The value that was invalid
     * @var string|null $invalidValue public property
     */
    public $invalidValue;

    /**
     * The constraint validated
     * @required
     * @var string $constraint public property
     */
    public $constraint;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $path         Initialization value for $this->path
     * @param string $message      Initialization value for $this->message
     * @param string $invalidValue Initialization value for $this->invalidValue
     * @param string $constraint   Initialization value for $this->constraint
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->path         = func_get_arg(0);
            $this->message      = func_get_arg(1);
            $this->invalidValue = func_get_arg(2);
            $this->constraint   = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['path']         = $this->path;
        $json['message']      = $this->message;
        $json['invalidValue'] = $this->invalidValue;
        $json['constraint']   = $this->constraint;

        return $json;
    }
}
