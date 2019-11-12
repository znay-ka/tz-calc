<?php


namespace LoanCalc\Sets;

use LoanCalc\Models\Payment;

class PaymentSet
{
    /** @var array[Payment] */
    private $payments;

    public function setPayments($payments)
    {
        $this->payments = $payments;
    }

    public function addPayment(Payment $payment)
    {
        $this->payments[] = $payment;
    }

    public function getPaymentsByDay(\DateTime $day)
    {
        $ans = [];
        /** @var Payment $payment */
        foreach ($this->payments as $payment) {
            if ($payment->getDay() == $day) {
                $ans[] = $payment;
            }
        }
        return $ans;
    }

}