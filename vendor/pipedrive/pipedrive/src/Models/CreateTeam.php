<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CreateTeam implements JsonSerializable
{
    /**
     * The Team name
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * The Team description
     * @var string|null $description public property
     */
    public $description;

    /**
     * The Team manager ID
     * @required
     * @maps manager_id
     * @var integer $managerId public property
     */
    public $managerId;

    /**
     * IDs of the Users that belong to the Team
     * @var array|null $users public property
     */
    public $users;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $name        Initialization value for $this->name
     * @param string  $description Initialization value for $this->description
     * @param integer $managerId   Initialization value for $this->managerId
     * @param array   $users       Initialization value for $this->users
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->name        = func_get_arg(0);
            $this->description = func_get_arg(1);
            $this->managerId   = func_get_arg(2);
            $this->users       = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name']        = $this->name;
        $json['description'] = $this->description;
        $json['manager_id']  = $this->managerId;
        $json['users']       = $this->users;

        return $json;
    }
}
