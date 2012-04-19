<?php

namespace Medzin\Validator\Constraints;

use Symfony\Component\Validator\Constraint,
    Symfony\Component\Validator\ConstraintValidator;

class CurrencyValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        if (in_array($value, $constraint->currencies)) {
            return true;
        } else {
            $this->setMessage($constraint->message);

            return false;
        }
    }
}