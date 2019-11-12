<?php


namespace LoanCalc\Controllers;


use LoanCalc\Mappers\LoanMapper;
use LoanCalc\Mappers\PaymentSetMapper;
use LoanCalc\Services\CalcService;

class CalcController
{
    private $calcService;

    public function __construct()
    {
        $this->calcService = new CalcService();
    }

    public function action($incomingArray)
    {
        // здесь я бы проверил данные на пустоту

        try {
            $loan = (new LoanMapper())->fillFromArray($incomingArray['loan']);
            $paymentSet = (new PaymentSetMapper())->fillFromArray($incomingArray['payments']);
            $atDate = new \DateTime($incomingArray['atDate']);
        }
        catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }

        // здесь бы я проверил бы данные на заполнение (например что $loan->date не меньше atDate, если надо)

        $value = $this->calcService->calculate($loan, $paymentSet, $atDate);
        $response = ["summ" => $value];

        // добавил подробную выписку посуточно, для проверки
        if (in_array('detail', $incomingArray) && $incomingArray['atDate'] == true) {
            $response['detail'] = $this->calcService->getDetailInfo();
        }

        return $response;
    }

    public function generateError($desc)
    {
        return ["error" => $desc];
    }

}