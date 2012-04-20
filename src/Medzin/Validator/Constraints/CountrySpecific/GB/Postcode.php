<?php

namespace Medzin\Validator\Constraints\CountrySpecific\GB;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Postcode extends Constraint
{
    public $message = 'Invalid postcode';
    public $pattern = '/^[A-Z]{1,2}[A-Z0-9]{1,2} \d{1}[A-Z]{2}$/';

    public function validatedBy()
    {
        return 'Medzin\Validator\Constraints\PostcodeValidator';
    }
}
