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
class NewDeal implements JsonSerializable
{
    /**
     * Deal title
     * @required
     * @var string $title public property
     */
    public $title;

    /**
     * Value of the deal. If omitted, value will be set to 0.
     * @var string|null $value public property
     */
    public $value;

    /**
     * Currency of the deal. Accepts a 3-character currency code. If omitted, currency will be set to the
     * default currency of the authorized user.
     * @var string|null $currency public property
     */
    public $currency;

    /**
     * ID of the user who will be marked as the owner of this deal. If omitted, the authorized user ID will
     * be used.
     * @maps user_id
     * @var integer|null $userId public property
     */
    public $userId;

    /**
     * ID of the person this deal will be associated with
     * @maps person_id
     * @var integer|null $personId public property
     */
    public $personId;

    /**
     * ID of the organization this deal will be associated with
     * @maps org_id
     * @var integer|null $orgId public property
     */
    public $orgId;

    /**
     * ID of the stage this deal will be placed in a pipeline (note that you can't supply the ID of the
     * pipeline as this will be assigned automatically based on stage_id). If omitted, the deal will be
     * placed in the first stage of the default pipeline.
     * @maps stage_id
     * @var integer|null $stageId public property
     */
    public $stageId;

    /**
     * open = Open, won = Won, lost = Lost, deleted = Deleted. If omitted, status will be set to open.
     * @var string|null $status public property
     */
    public $status;

    /**
     * Deal success probability percentage. Used/shown only when deal_probability for the pipeline of the
     * deal is enabled.
     * @var double|null $probability public property
     */
    public $probability;

    /**
     * Optional message about why the deal was lost (to be used when status=lost)
     * @maps lost_reason
     * @var string|null $lostReason public property
     */
    public $lostReason;

    /**
     * Visibility of the deal. If omitted, visibility will be set to the default visibility setting of this
     * item type for the authorized user.<dl class="fields-list"><dt>1</dt><dd>Owner &amp; followers
     * (private)</dd><dt>3</dt><dd>Entire company (shared)</dd></dl>
     * @maps visible_to
     * @var int|null $visibleTo public property
     */
    public $visibleTo;

    /**
     * Optional creation date & time of the deal in UTC. Requires admin user API token. Format: YYYY-MM-DD
     * HH:MM:SS
     * @maps add_time
     * @var string|null $addTime public property
     */
    public $addTime;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $title       Initialization value for $this->title
     * @param string  $value       Initialization value for $this->value
     * @param string  $currency    Initialization value for $this->currency
     * @param integer $userId      Initialization value for $this->userId
     * @param integer $personId    Initialization value for $this->personId
     * @param integer $orgId       Initialization value for $this->orgId
     * @param integer $stageId     Initialization value for $this->stageId
     * @param string  $status      Initialization value for $this->status
     * @param double  $probability Initialization value for $this->probability
     * @param string  $lostReason  Initialization value for $this->lostReason
     * @param int     $visibleTo   Initialization value for $this->visibleTo
     * @param string  $addTime     Initialization value for $this->addTime
     */
    public function __construct()
    {
        if (12 == func_num_args()) {
            $this->title       = func_get_arg(0);
            $this->value       = func_get_arg(1);
            $this->currency    = func_get_arg(2);
            $this->userId      = func_get_arg(3);
            $this->personId    = func_get_arg(4);
            $this->orgId       = func_get_arg(5);
            $this->stageId     = func_get_arg(6);
            $this->status      = func_get_arg(7);
            $this->probability = func_get_arg(8);
            $this->lostReason  = func_get_arg(9);
            $this->visibleTo   = func_get_arg(10);
            $this->addTime     = func_get_arg(11);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['title']       = $this->title;
        $json['value']       = $this->value;
        $json['currency']    = $this->currency;
        $json['user_id']     = $this->userId;
        $json['person_id']   = $this->personId;
        $json['org_id']      = $this->orgId;
        $json['stage_id']    = $this->stageId;
        $json['status']      = $this->status;
        $json['probability'] = $this->probability;
        $json['lost_reason'] = $this->lostReason;
        $json['visible_to']  = $this->visibleTo;
        $json['add_time']    = $this->addTime;

        return $json;
    }
}
