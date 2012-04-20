<?php

namespace Medzin\Validator\Test\Constraints\CountrySpecific\GB;

use Medzin\Validator\Constraints\CountrySpecific\GB\Postcode,
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
            array('AA AAA'),
            array('11A 111'),
            array('A1A1 A11'),
        );
    }

    public function getValidPostcodes()
    {
        return array(
            array('EC1A 1BB'),
            array('M1 1AA'),
            array('CR2 6XH'),
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