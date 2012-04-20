<?php
namespace Medzin\Validator\Constraints;

use Symfony\Component\Validator\Constraint,
    Symfony\Component\Validator\ConstraintValidator;

class PostcodeValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        if ($value === '' || $value === null) {
            return true;
        }

        if (preg_match($constraint->pattern, $value)) {
            return true;
        }

        $this->setMessage($constraint->message);

        return false;
    }
}