<?php

namespace Medzin\Validator\Test\Constraints\CountrySpecific\PL;

use Medzin\Validator\Constraints\CountrySpecific\PL\REGON,
    Medzin\Validator\Constraints\CountrySpecific\PL\REGONValidator;

class RegonValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new RegonValidator();
    }

    public function getInvalidRegons()
    {
        return array(
            array('00000000000'),
            array('999999999'),
            array('123123123123123'),
        );
    }

    public function getValidRegons()
    {
        return array(
            array('677144507'),
            array('258193737'),
            array('05431694224055'),
        );
    }

    public function testCharIsInvalid()
    {
        $this->assertFalse($this->validator->isValid('character', new Regon()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new Regon()));
    }

    /**
     * @dataProvider getInvalidRegons
     */
    public function testInvalidRegon($regon)
    {
        $this->assertFalse($this->validator->isValid($regon, new Regon()));
    }

    /**
     * @dataProvider getValidRegons
     */
    public function testValidRegon($regon)
    {
        $this->assertTrue($this->validator->isValid($regon, new Regon()));
    }
}
