<?php

namespace Medzin\Validator\Tests\Constraints;

use Medzin\Validator\Constraints\Currency,
    Medzin\Validator\Constraints\CurrencyValidator;

class CurrencyValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new CurrencyValidator();
    }

    public function getInvalidCurrencies()
    {
        return array(
            array('LOL'),
            array('XXX'),
            array('FUK'),
        );
    }

    public function getValidCurrencies()
    {
        return array(
            array('PLN'),
            array('PHP'),
            array('GBP'),
        );
    }

    public function testCharIsInvalid()
    {
        $this->assertFalse($this->validator->isValid('character', new Currency()));
    }

    public function testEmptyStringIsInvalid()
    {
        $this->assertFalse($this->validator->isValid('', new Currency()));
    }

    /**
     * @dataProvider getInvalidCurrencies
     */
    public function testInvalidCurrencies($currency)
    {
        $this->assertFalse($this->validator->isValid($currency, new Currency()));
    }

    /**
     * @dataProvider getValidCurrencies
     */
    public function testValidCurrencies($currency)
    {
        $this->assertTrue($this->validator->isValid($currency, new Currency()));
    }
}
