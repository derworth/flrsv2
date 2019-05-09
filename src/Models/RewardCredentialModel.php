<?php
/*
 * Raas
 *
 * This file was automatically generated for Tango Card, Inc. by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace RaasLib\Models;

use JsonSerializable;

/**
 *Represents a Reward Credential
 */
class RewardCredentialModel implements JsonSerializable
{
    /**
     * The label of the credential
     * @required
     * @var string $label public property
     */
    public $label;

    /**
     * The actual credential
     * @required
     * @var string $value public property
     */
    public $value;

    /**
     * The type of the credential
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The type of the credential
     * @required
     * @var string $credentialType public property
     */
    public $credentialType;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $label          Initialization value for $this->label
     * @param string $value          Initialization value for $this->value
     * @param string $type           Initialization value for $this->type
     * @param string $credentialType Initialization value for $this->credentialType
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->label          = func_get_arg(0);
            $this->value          = func_get_arg(1);
            $this->type           = func_get_arg(2);
            $this->credentialType = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['label']          = $this->label;
        $json['value']          = $this->value;
        $json['type']           = $this->type;
        $json['credentialType'] = $this->credentialType;

        return $json;
    }
}
