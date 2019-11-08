<?php


namespace LoanCalc\Models;


class Loan
{
    /** @var float */
    public $base;
    /** @var \DateTime */
    public $date;
    /** @var float */
    public $percent;
    /** @var integer */
    public $duration;

    // здесь напрашиваются __get __set методы на проверку значений
    // но мы принимаем что все значения верные
}