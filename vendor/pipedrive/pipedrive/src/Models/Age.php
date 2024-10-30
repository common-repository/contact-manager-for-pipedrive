<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Models;

use JsonSerializable;

/**
 *The lifetime of the Deal
 */
class Age implements JsonSerializable
{
    /**
     * Years
     * @var integer|null $y public property
     */
    public $y;

    /**
     * Months
     * @var integer|null $m public property
     */
    public $m;

    /**
     * Days
     * @var integer|null $d public property
     */
    public $d;

    /**
     * Hours
     * @var integer|null $h public property
     */
    public $h;

    /**
     * Minutes
     * @var integer|null $i public property
     */
    public $i;

    /**
     * Seconds
     * @var integer|null $s public property
     */
    public $s;

    /**
     * The total time in seconds
     * @maps total_seconds
     * @var integer|null $totalSeconds public property
     */
    public $totalSeconds;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $y            Initialization value for $this->y
     * @param integer $m            Initialization value for $this->m
     * @param integer $d            Initialization value for $this->d
     * @param integer $h            Initialization value for $this->h
     * @param integer $i            Initialization value for $this->i
     * @param integer $s            Initialization value for $this->s
     * @param integer $totalSeconds Initialization value for $this->totalSeconds
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->y            = func_get_arg(0);
            $this->m            = func_get_arg(1);
            $this->d            = func_get_arg(2);
            $this->h            = func_get_arg(3);
            $this->i            = func_get_arg(4);
            $this->s            = func_get_arg(5);
            $this->totalSeconds = func_get_arg(6);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['y']             = $this->y;
        $json['m']             = $this->m;
        $json['d']             = $this->d;
        $json['h']             = $this->h;
        $json['i']             = $this->i;
        $json['s']             = $this->s;
        $json['total_seconds'] = $this->totalSeconds;

        return $json;
    }
}
