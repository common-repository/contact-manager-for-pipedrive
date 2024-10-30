<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Models;

use JsonSerializable;
use Pipedrive\Utils\DateTimeHelper;

/**
 * @todo Write general description for this model
 */
class Activity implements JsonSerializable
{
    /**
     * Subject of the activity
     * @required
     * @var string $subject public property
     */
    public $subject;

    /**
     * @todo Write general description for this property
     * @var int|null $done public property
     */
    public $done;

    /**
     * Type of the activity. This is in correlation with the key_string parameter of ActivityTypes.
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * Due date of the activity. Format: YYYY-MM-DD
     * @maps due_date
     * @factory \Pipedrive\Utils\DateTimeHelper::fromSimpleDate
     * @var \DateTime|null $dueDate public property
     */
    public $dueDate;

    /**
     * Due time of the activity in UTC. Format: HH:MM
     * @maps due_time
     * @var string|null $dueTime public property
     */
    public $dueTime;

    /**
     * Duration of the activity. Format: HH:MM
     * @var string|null $duration public property
     */
    public $duration;

    /**
     * ID of the user whom the activity will be assigned to. If omitted, the activity will be assigned to
     * the authorized user.
     * @maps user_id
     * @var integer|null $userId public property
     */
    public $userId;

    /**
     * ID of the deal this activity will be associated with
     * @maps deal_id
     * @var integer|null $dealId public property
     */
    public $dealId;

    /**
     * ID of the person this activity will be associated with
     * @maps person_id
     * @var integer|null $personId public property
     */
    public $personId;

    /**
     * List of multiple persons (participants) this activity will be associated with. If omitted, single
     * participant from person_id field is used. It requires a structure as follows: [{"person_id":1,
     * "primary_flag":true}]
     * @var string|null $participants public property
     */
    public $participants;

    /**
     * ID of the organization this activity will be associated with
     * @maps org_id
     * @var integer|null $orgId public property
     */
    public $orgId;

    /**
     * Note of the activity (HTML format)
     * @var string|null $note public property
     */
    public $note;

    /**
     * Constructor to set initial or default values of member properties
     * @param string    $subject      Initialization value for $this->subject
     * @param int       $done         Initialization value for $this->done
     * @param string    $type         Initialization value for $this->type
     * @param \DateTime $dueDate      Initialization value for $this->dueDate
     * @param string    $dueTime      Initialization value for $this->dueTime
     * @param string    $duration     Initialization value for $this->duration
     * @param integer   $userId       Initialization value for $this->userId
     * @param integer   $dealId       Initialization value for $this->dealId
     * @param integer   $personId     Initialization value for $this->personId
     * @param string    $participants Initialization value for $this->participants
     * @param integer   $orgId        Initialization value for $this->orgId
     * @param string    $note         Initialization value for $this->note
     */
    public function __construct()
    {
        if (12 == func_num_args()) {
            $this->subject      = func_get_arg(0);
            $this->done         = func_get_arg(1);
            $this->type         = func_get_arg(2);
            $this->dueDate      = func_get_arg(3);
            $this->dueTime      = func_get_arg(4);
            $this->duration     = func_get_arg(5);
            $this->userId       = func_get_arg(6);
            $this->dealId       = func_get_arg(7);
            $this->personId     = func_get_arg(8);
            $this->participants = func_get_arg(9);
            $this->orgId        = func_get_arg(10);
            $this->note         = func_get_arg(11);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['subject']      = $this->subject;
        $json['done']         = $this->done;
        $json['type']         = $this->type;
        $json['due_date']     = isset($this->dueDate) ?
            DateTimeHelper::toSimpleDate($this->dueDate) : null;
        $json['due_time']     = $this->dueTime;
        $json['duration']     = $this->duration;
        $json['user_id']      = $this->userId;
        $json['deal_id']      = $this->dealId;
        $json['person_id']    = $this->personId;
        $json['participants'] = $this->participants;
        $json['org_id']       = $this->orgId;
        $json['note']         = $this->note;

        return $json;
    }
}
