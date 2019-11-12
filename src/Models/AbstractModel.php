<?php


namespace LoanCalc\Models;


class AbstractModel
{
    static public function getProperties() {
        return array_keys( get_object_vars( new static() ) );
    }
}