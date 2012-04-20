<?php

namespace Medzin\Validator\Test\Constraints\CountrySpecific\FR;

use Medzin\Validator\Constraints\CountrySpecific\FR\Postcode,
    Medzin\Validator\Constraints\PostcodeValidator;

class PostcodeValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new PostcodeValidator();
    }

    public function getInvalidPostcodes()
    {
        return array(
            array('AA123'),
            array('12 345'),
            array('123456'),
        );
    }

    public function getValidPostcodes()
    {
        return array(
            array('98000'),
            array('64200'),
            array('97320'),
        );
    }

    public function testCharIsInvalid()
    {
        $this->assertFalse($this->validator->isValid('character', new Postcode()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new Postcode()));
    }

    /**
     * @dataProvider getInvalidPostcodes
     */
    public function testInvalidPostcodes($nip)
    {
        $this->assertFalse($this->validator->isValid($nip, new Postcode()));
    }

    /**
     * @dataProvider getValidPostcodes
     */
    public function testValidPostcodes($nip)
    {
        $this->assertTrue($this->validator->isValid($nip, new Postcode()));
    }
}