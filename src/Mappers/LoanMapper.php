<?php


namespace LoanCalc\Mappers;


use LoanCalc\Exeptions\InvalidDataset;
use LoanCalc\Models\Loan;

class LoanMapper
{
    public function fillFromArray($data)
    {
        $loan = new Loan();
        $properties = array_keys(get_object_vars($loan));
        $missingProperty = boolval(array_diff($properties, array_keys($data)));
        if ($missingProperty) {
            throw new InvalidDataset();
        }

        foreach ($properties as $propertyName) {
            if ($propertyName == 'date') {
                $loan->$propertyName = new \DateTime($data[$propertyName]);
            } else {
                $loan->$propertyName = $data[$propertyName];
            }
        }

        return $loan;
    }
}