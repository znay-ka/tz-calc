<?php


namespace LoanCalc\Exeptions;


use Throwable;

class InvalidRequest extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "Неправильный запрос";
    }
}
