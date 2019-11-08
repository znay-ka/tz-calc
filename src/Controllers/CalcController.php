<?php


namespace LoanCalc\Controllers;


use LoanCalc\Mappers\LoanMapper;
use LoanCalc\Mappers\PaymentMapper;
use LoanCalc\Models\Loan;
use LoanCalc\Models\Payment;

class CalcController
{
    /** @var Loan */
    private $loan;
    /** @var array[Payment] */
    private $payments = [];

    public function loadLoan($loanData) {
        $mapper = new LoanMapper();
        $this->loan = $mapper->fillFromArray($loanData);
    }

    public function loadPayments($paymentsData) {
        $mapper = new PaymentMapper();
        $this->payments[] = [];
        foreach ($paymentsData as $payment) {
            $this->payments[] = $mapper->fillFromArray($payment);
        }
    }

    public function calculate($atDateStr) {
        $atDate = new \DateTime( $atDateStr );
        $debt = $this->loan->base;
        $perc = 0;
        $day = new \DateInterval('P1D');
        $dateCursor = (new \DateTime($this->loan->date->format('Y-m-d')))->add($day);
        $lastDay = $atDate;

        while ($lastDay >= $dateCursor) {
            echo $dateCursor->format('Y-m-d').PHP_EOL;
            $dateCursor->add($day);
        }

    }
}