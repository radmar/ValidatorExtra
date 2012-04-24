<?php

namespace Medzin\Validator\Tests\Constraints;

use Medzin\Validator\Constraints\CreditCard,
    Medzin\Validator\Constraints\CreditCardValidator;

class CreditCardValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new CreditCardValidator();
    }

    public function getInvalidCardCodes()
    {
        return array(
            array('13192381091aa'),
            array('1000000000000000'),
            array('1231aa1111111111'),
        );
    }

    public function getValidCardCodes()
    {
        return array(
            array('378282246310005'),
            array('371449635398431'),
            array('378734493671000'),
            array('30569309025904'),
            array('38520000023237'),
            array('6011000990139424'),
            array('3530111333300000'),
            array('3566002020360505'),
            array('5105105105105100'),
            array('4012888888881881'),
        );
    }

    public function testCharIsInvalid()
    {
        $this->assertFalse($this->validator->isValid('character', new CreditCard()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new CreditCard()));
    }

    /**
     * @dataProvider getInvalidCardCodes
     */
    public function testInvalidCardCodes($cardCode)
    {
        $this->assertFalse($this->validator->isValid($cardCode, new CreditCard()));
    }

    /**
     * @dataProvider getValidCardCodes
     */
    public function testValidCurrencies($cardCode)
    {
        $this->assertTrue($this->validator->isValid($cardCode, new CreditCard()));
    }
}
