<?php


namespace LoanCalc\Sets;

use LoanCalc\Models\Payment;

class PaymentSet
{
    /** @var array[Payment] */
    private $payments;

    public function setPayments($payments) {
        $this->payments = $payments;
    }

    public function getPaymentsByDay(\DateTime $day) {
        $ans = [];
        foreach ($this->payments as $payment) {
            $payment
        }
    }

}