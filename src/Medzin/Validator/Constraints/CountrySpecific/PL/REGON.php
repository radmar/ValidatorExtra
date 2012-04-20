<?php

namespace Medzin\Validator\Constraints\CountrySpecific\PL;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class REGON extends Constraint
{
    public $message = 'Invalid REGON';
}
