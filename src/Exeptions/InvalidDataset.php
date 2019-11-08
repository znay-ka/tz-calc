<?php


namespace LoanCalc\Exeptions;


use Throwable;

class InvalidDataset extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "В аргументы функции переданы неверные данные";
    }
}
