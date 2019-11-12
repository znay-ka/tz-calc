<?php


namespace LoanCalc\Models;


class Payment extends AbstractModel
{
    /** @var float */
    public $amount;
    /** @var \DateTime */
    public $date;
    /** @var \DateTime */
    private $day;

    public function getDay() {
        if(empty($this->day)) {
            $this->day = new \DateTime($this->date->format('Y-m-d'));
        }
        return $this->day;
    }

    // здесь напрашиваются __get __set методы на проверку значений
    // но мы принимаем что все значения верные
}