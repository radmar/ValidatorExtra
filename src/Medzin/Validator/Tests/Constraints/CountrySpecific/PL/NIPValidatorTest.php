<?php

namespace Medzin\Validator\Test\Constraints\CountrySpecific\PL;

use Medzin\Validator\Constraints\CountrySpecific\PL\NIP,
    Medzin\Validator\Constraints\CountrySpecific\PL\NIPValidator;

class NIPValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new NIPValidator();
    }

    public function getInvalidNips()
    {
        return array(
            array('00000000000'),
            array('1782387612'),
            array('123123123'),
        );
    }

    public function getValidNips()
    {
        return array(
            array('2458756371'),
            array('5145826546'),
            array('4461030254'),
        );
    }

    public function testCharIsInvalid()
    {
        $this->assertFalse($this->validator->isValid('character', new Nip()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new Nip()));
    }

    /**
     * @dataProvider getInvalidNips
     */
    public function testInvalidNips($nip)
    {
        $this->assertFalse($this->validator->isValid($nip, new Nip()));
    }

    /**
     * @dataProvider getValidNips
     */
    public function testValidNips($nip)
    {
        $this->assertTrue($this->validator->isValid($nip, new Nip()));
    }
}
