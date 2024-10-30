<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Models;

use JsonSerializable;

/**
 *The Global Message data
 */
class GlobalMessageData implements JsonSerializable
{
    /**
     * The ID of the Global Message
     * @var integer|null $id public property
     */
    public $id;

    /**
     * The ID of the User related to the Global Message
     * @maps user_id
     * @var integer|null $userId public property
     */
    public $userId;

    /**
     * The ID of the Company related to the Global Message
     * @maps company_id
     * @var integer|null $companyId public property
     */
    public $companyId;

    /**
     * The Global Message type info
     * @maps type_info
     * @var \Pipedrive\Models\GlobalMessageUserData|null $typeInfo public property
     */
    public $typeInfo;

    /**
     * The User data for the Global Message (such as user_id, name, email, phone)
     * @maps user_data
     * @var object|null $userData public property
     */
    public $userData;

    /**
     * HTML for each returned Global Message to render views
     * @var string|null $html public property
     */
    public $html;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer               $id        Initialization value for $this->id
     * @param integer               $userId    Initialization value for $this->userId
     * @param integer               $companyId Initialization value for $this->companyId
     * @param GlobalMessageUserData $typeInfo  Initialization value for $this->typeInfo
     * @param object                $userData  Initialization value for $this->userData
     * @param string                $html      Initialization value for $this->html
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->id        = func_get_arg(0);
            $this->userId    = func_get_arg(1);
            $this->companyId = func_get_arg(2);
            $this->typeInfo  = func_get_arg(3);
            $this->userData  = func_get_arg(4);
            $this->html      = func_get_arg(5);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']         = $this->id;
        $json['user_id']    = $this->userId;
        $json['company_id'] = $this->companyId;
        $json['type_info']  = $this->typeInfo;
        $json['user_data']  = $this->userData;
        $json['html']       = $this->html;

        return $json;
    }
}
