<?php

namespace Medzin\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CreditCard extends Constraint
{
    public $message = 'Invalid credit card number';

    /**
     * @see http://regexlib.com/REDetails.aspx?regexp_id=1835
     */
    public $pattern = '/^[3|4|5|6]([0-9]{15}$|[0-9]{12}$|[0-9]{13}$|[0-9]{14}$)/';
}
