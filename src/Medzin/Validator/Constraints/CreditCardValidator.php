<?php

namespace Medzin\Validator\Constraints;

use Symfony\Component\Validator\Constraint,
    Symfony\Component\Validator\ConstraintValidator;

class CreditCardValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        if ($value === '' || $value === null) {
            return true;
        }

        if (!preg_match($constraint->pattern, $value)) {
            $this->setMessage($constraint->message);

            return false;
        }

        if (!$this->isChecksumValid($value)) {
            $this->setMessage($constraint->message);

            return false;
        }

        return true;
    }

    protected function isChecksumValid($value)
    {
        $digits = str_split(strrev($value));
        $tmp    = '';

        foreach ($digits as $key => $digit) {
            $tmp .= ($key % 2 != 0) ? $digit * 2 : $digit;
        }

        $checksum = array_sum(str_split($tmp));

        return ($checksum != 0 && $checksum % 10 == 0);
    }
}