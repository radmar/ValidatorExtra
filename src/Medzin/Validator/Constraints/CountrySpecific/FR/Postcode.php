<?php

namespace Medzin\Validator\Constraints\CountrySpecific\FR;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Postcode extends Constraint
{
    public $message = 'Invalid postcode';
    public $pattern = '/^[0-9]{5}$/';

    public function validatedBy()
    {
        return 'Medzin\Validator\Constraints\PostcodeValidator';
    }
}
