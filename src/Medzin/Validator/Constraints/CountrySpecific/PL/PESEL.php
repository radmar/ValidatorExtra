<?php

namespace Medzin\Validator\Constraints\CountrySpecific\PL;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PESEL extends Constraint
{
    public $message = 'Invalid PESEL';
}
