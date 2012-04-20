<?php

namespace Medzin\Validator\Constraints\CountrySpecific\PL;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Postcode extends Constraint
{
    public $message = 'Invalid postcode';
    public $pattern = '/^\d{2}-\d{3}$/';

    public function validatedBy()
    {
        return 'Medzin\Validator\Constraints\PostcodeValidator';
    }
}
