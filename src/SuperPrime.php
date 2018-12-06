<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 06.12.18
 * Time: 17:53
 */

namespace App;


class SuperPrime
{
    public $start;
    public $end;
    public $length;
    public $value;

    /**
     * SuperPrime constructor.
     * @param $start
     * @param $end
     * @param $length
     * @param $value
     */
    public function __construct($start, $end, $length, $value)
    {
        $this->start = $start;
        $this->end = $end;
        $this->length = $length;
        $this->value = $value;
    }
}