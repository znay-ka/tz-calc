<?php


namespace LoanCalc\Services;


use LoanCalc\Models\Loan;
use LoanCalc\Models\Payment;
use LoanCalc\Sets\PaymentSet;

class CalcService
{
    private $detailInfo = [];

    public function getDetailInfo() {
        return $this->detailInfo;
    }

    public function calculate(Loan $loan, PaymentSet $payments, \DateTime $atDate): float {

        $debt = $loan->base;
        $percent = 0;
        $dayPeriod = new \DateInterval('P1D');
        $this->detailInfo = [];

        $dateCursor = new \DateTime($loan->date->format('Y-m-d'));
        $loanInterval = new \DateInterval('P'.($loan->duration + 1).'D');
        $lastDay = (clone $loan->date)->add($loanInterval);
        $lastDay = ($lastDay > $atDate) ? $atDate : $lastDay;

        while ($lastDay >= $dateCursor) {
            $currentPayments = $payments->getPaymentsByDay($dateCursor);
            /** @var Payment $onePayment */
            foreach ($currentPayments as $onePayment) {
                $this->makePayment($onePayment->amount, $debt, $percent);
            }

            $this->detailInfo[] = [
                'day' => $dateCursor->format('Y-m-d H:i:s'),
                'debt' => $debt,
                'percent' => $percent
            ];

            $dateCursor->add($dayPeriod);

            $percent += $debt * $loan->percent;
            $maxPercent = $debt * 3;
            if($percent > $maxPercent) {
                $percent = $maxPercent;
            }
        }

        return $debt;
    }

    private function makePayment($amount, &$debt, &$percent) {
        if($amount <= $percent) {
            $percent -= $amount;
            return;
        }
        $amount -= $percent;
        $percent = 0;
        $debt -= $amount;
    }
}