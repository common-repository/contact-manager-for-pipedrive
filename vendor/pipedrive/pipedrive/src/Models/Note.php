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
class Note implements JsonSerializable
{
    /**
     * Content of the note in HTML format. Subject to sanitization on the back-end.
     * @required
     * @var string $content public property
     */
    public $content;

    /**
     * ID of the user who will be marked as the author of this note. Only an admin can change the author.
     * @maps user_id
     * @var integer|null $userId public property
     */
    public $userId;

    /**
     * ID of the lead the note will be attached to.
     * @maps lead_id
     * @var string|null $leadId public property
     */
    public $leadId;

    /**
     * ID of the deal the note will be attached to.
     * @maps deal_id
     * @var integer|null $dealId public property
     */
    public $dealId;

    /**
     * ID of the person this note will be attached to.
     * @maps person_id
     * @var integer|null $personId public property
     */
    public $personId;

    /**
     * ID of the organization this note will be attached to.
     * @maps org_id
     * @var integer|null $orgId public property
     */
    public $orgId;

    /**
     * Optional creation date & time of the Note in UTC. Can be set in the past or in the future. Requires
     * admin user API token. Format: YYYY-MM-DD HH:MM:SS
     * @maps add_time
     * @var string|null $addTime public property
     */
    public $addTime;

    /**
     * If true, then the results are filtered by Note to Lead pinning state.
     * @maps pinned_to_lead_flag
     * @var bool|null $pinnedToLeadFlag public property
     */
    public $pinnedToLeadFlag;

    /**
     * If set, then results are filtered by note to deal pinning state (deal_id is also required).
     * @maps pinned_to_deal_flag
     * @var int|null $pinnedToDealFlag public property
     */
    public $pinnedToDealFlag;

    /**
     * If set, then results are filtered by note to organization pinning state (org_id is also required).
     * @maps pinned_to_organization_flag
     * @var int|null $pinnedToOrganizationFlag public property
     */
    public $pinnedToOrganizationFlag;

    /**
     * If set, then results are filtered by note to person pinning state (person_id is also required).
     * @maps pinned_to_person_flag
     * @var int|null $pinnedToPersonFlag public property
     */
    public $pinnedToPersonFlag;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $content                  Initialization value for $this->content
     * @param integer $userId                   Initialization value for $this->userId
     * @param string  $leadId                   Initialization value for $this->leadId
     * @param integer $dealId                   Initialization value for $this->dealId
     * @param integer $personId                 Initialization value for $this->personId
     * @param integer $orgId                    Initialization value for $this->orgId
     * @param string  $addTime                  Initialization value for $this->addTime
     * @param int     $pinnedToLeadFlag         Initialization value for $this->pinnedToLeadFlag
     * @param int     $pinnedToDealFlag         Initialization value for $this->pinnedToDealFlag
     * @param int     $pinnedToOrganizationFlag Initialization value for $this->pinnedToOrganizationFlag
     * @param int     $pinnedToPersonFlag       Initialization value for $this->pinnedToPersonFlag
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->content                  = func_get_arg(0);
            $this->userId                   = func_get_arg(1);
            $this->leadId                   = func_get_arg(2);
            $this->dealId                   = func_get_arg(3);
            $this->personId                 = func_get_arg(4);
            $this->orgId                    = func_get_arg(5);
            $this->addTime                  = func_get_arg(6);
            $this->pinnedToLeadFlag         = func_get_arg(7);
            $this->pinnedToDealFlag         = func_get_arg(8);
            $this->pinnedToOrganizationFlag = func_get_arg(9);
            $this->pinnedToPersonFlag       = func_get_arg(10);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['content']                     = $this->content;
        $json['user_id']                     = $this->userId;
        $json['lead_id']                     = $this->leadId;
        $json['deal_id']                     = $this->dealId;
        $json['person_id']                   = $this->personId;
        $json['org_id']                      = $this->orgId;
        $json['add_time']                    = $this->addTime;
        $json['pinned_to_lead_flag']         = $this->pinnedToLeadFlag;
        $json['pinned_to_deal_flag']         = $this->pinnedToDealFlag;
        $json['pinned_to_organization_flag'] = $this->pinnedToOrganizationFlag;
        $json['pinned_to_person_flag']       = $this->pinnedToPersonFlag;

        return $json;
    }
}