<?php

namespace Medzin\Validator\Test\Constraints\CountrySpecific\PL;

use Medzin\Validator\Constraints\CountrySpecific\PL\PESEL,
    Medzin\Validator\Constraints\CountrySpecific\PL\PESELValidator;

class PESELValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new PESELValidator();
    }

    public function getInvalidPesels()
    {
        return array(
            array('000000000000'),
            array('1782387612'),
            array('123123123'),
        );
    }

    public function getValidPesels()
    {
        return array(
            array('42060712383'),
            array('43082981582'),
            array('96092141819'),
        );
    }

    public function testCharIsInvalid()
    {
        $this->assertFalse($this->validator->isValid('character', new PESEL()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new PESEL()));
    }

    /**
     * @dataProvider getInvalidPesels
     */
    public function testInvalidPesels($nip)
    {
        $this->assertFalse($this->validator->isValid($nip, new PESEL()));
    }

    /**
     * @dataProvider getValidPesels
     */
    public function testValidPesels($nip)
    {
        $this->assertTrue($this->validator->isValid($nip, new PESEL()));
    }
}
