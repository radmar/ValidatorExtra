<?php

namespace Medzin\Validator\Constraints\CountrySpecific\PL;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NIP extends Constraint
{
    public $message = 'Invalid NIP';
}
