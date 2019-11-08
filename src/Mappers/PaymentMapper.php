<?php


namespace LoanCalc\Mappers;

use LoanCalc\Models\Payment;

class PaymentMapper
{
    public function fillFromArray($data)
    {
        $payment = new Payment();
        $properties = array_keys( get_object_vars($payment) );

        $missingProperty = boolval(array_diff($properties, array_keys($data)));
        if ($missingProperty) {
            throw new InvalidDataset();
        }

        foreach ($properties as $propertyName) {
            if($propertyName == 'date') {
                $payment->$propertyName = new \DateTime( $data[$propertyName] );
            }
            else {
                $payment->$propertyName = $data[$propertyName];
            }
        }

        return $payment;
    }
}