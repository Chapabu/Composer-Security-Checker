<?php namespace spec\Drupal\composer_security_checker\Parsers;

use Drupal\composer_security_checker\Collections\AdvisoryCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SensioLabsSecurityCheckerParserSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Drupal\composer_security_checker\Parsers\SensioLabsSecurityCheckerParser');
    }

    function let()
    {
        $this->beConstructedWith($this->getMonologStub());
    }

    function it_should_return_a_collection()
    {
        $this->parse()->shouldReturnAnInstanceOf(AdvisoryCollection::class);
    }
}
