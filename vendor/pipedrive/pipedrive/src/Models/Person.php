<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Models;

use JsonSerializable;

/**
 *The Person this Note is attached to
 */
class Person implements JsonSerializable
{
    /**
     * The name of the Person this Note is attached to
     * @var string|null $name public property
     */
    public $name;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name Initialization value for $this->name
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->name = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name'] = $this->name;

        return $json;
    }
}
