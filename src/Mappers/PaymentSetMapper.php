<?php


namespace LoanCalc\Mappers;

use LoanCalc\Models\Payment;
use LoanCalc\Sets\PaymentSet;

class PaymentSetMapper
{
    public function fillFromArray($paymentsArray)
    {
        $paymentSet = new PaymentSet();
        $properties = Payment::getProperties();

        foreach ($paymentsArray as $paymentArray) {

            $payment = new Payment();

            $missingProperty = boolval(array_diff($properties, array_keys($paymentArray)));
            if ($missingProperty) {
                throw new InvalidDataset();
            }

            foreach ($properties as $propertyName) {
                if($propertyName == 'date') {
                    $payment->$propertyName = new \DateTime( $paymentArray[$propertyName] );
                }
                else {
                    $payment->$propertyName = $paymentArray[$propertyName];
                }
            }

            $paymentSet->addPayment($payment);
        }
        return $paymentSet;


    }
}