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
class AdditionalDataWithPaginationDetails implements JsonSerializable
{
    /**
     * Pagination details of the list
     * @var \Pipedrive\Models\Pagination|null $pagination public property
     */
    public $pagination;

    /**
     * Constructor to set initial or default values of member properties
     * @param Pagination $pagination Initialization value for $this->pagination
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->pagination = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['pagination'] = $this->pagination;

        return $json;
    }
}
