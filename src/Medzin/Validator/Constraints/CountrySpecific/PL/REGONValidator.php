<?php

namespace Medzin\Validator\Constraints\CountrySpecific\PL;

use Symfony\Component\Validator\Constraint,
    Symfony\Component\Validator\ConstraintValidator;

class REGONValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        if ($value === '' || $value === null) {
            return true;
        }

        $mod = 11;
        $sum = 0;
        $weights[7]  = array(2, 3, 4, 5, 6, 7);
        $weights[9]  = array(8, 9, 2, 3, 4, 5, 6, 7);
        $weights[14] = array(2, 4, 8, 5, 0, 9, 7, 3, 6, 1, 2, 4, 8);

        preg_match_all("/\d/", $value, $digits);

        $length = count($digits[0]);

        if ($length != 7 && $length != 9 && $length != 14) {
            $this->setMessage($constraint->message);

            return false;
        }

        $valueArray = $digits[0];
        $weights    = $weights[$length];

        foreach ($valueArray as $digit) {
            $weight = current($weights);
            $sum += $digit * $weight;
            next($weights);
        }

        if ((($sum % $mod == 10) ? 0 : $sum % $mod) != $valueArray[$length - 1]) {
            $this->setMessage($constraint->message);

            return false;
        }

        return true;
    }
}