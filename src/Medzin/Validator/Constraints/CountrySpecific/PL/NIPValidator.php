<?php

namespace Medzin\Validator\Constraints\CountrySpecific\PL;

use Symfony\Component\Validator\Constraint,
    Symfony\Component\Validator\ConstraintValidator;

class NIPValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        if (empty($value)) {
            return true;
        }

        $mod     = 11;
        $sum     = 0;
        $weights = array(6, 5, 7, 2, 3, 4, 5, 6, 7);

        preg_match_all("/\d/", $value, $digits) ;

        $length = count($digits[0]);

        if ($length != 10) {
            $this->setMessage($constraint->message);

            return false;
        }

        $valueArray = $digits[0];

        foreach ($valueArray as $digit) {
            $weight = current($weights);
            $sum   += $digit * $weight;
            next($weights);
        }

        if ((($sum % $mod == 10) ? 0 : $sum % $mod) != $valueArray[$length - 1]) {
            $this->setMessage($constraint->message);

            return false;
        }

        return true;
    }
}