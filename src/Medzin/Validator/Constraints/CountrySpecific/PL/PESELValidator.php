<?php

namespace Medzin\Validator\Constraints\CountrySpecific\PL;

use Symfony\Component\Validator\Constraint,
    Symfony\Component\Validator\ConstraintValidator;

class PESELValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        if ($value === '' || $value === null) {
            return true;
        }

        if (!preg_match('/^[0-9]{11}$/', $value)) {
            $this->setMessage($constraint->message);

            return false;
        }

        $sum     = 0;
        $weights = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);

        $value = str_split($value);

        for ($i = 0; $i < 10; $i++) {
            $sum += $weights[$i] * $value[$i];
        }

        $checksum  = 10 - $sum % 10;
        $controlNr = ($checksum == 10) ? 0 : $checksum;

        if ($controlNr == $value[10]) {
            return true;
        }

        $this->setMessage($constraint->message);

        return false;
    }
}