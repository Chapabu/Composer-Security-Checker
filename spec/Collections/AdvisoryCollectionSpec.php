<?php namespace spec\Drupal\composer_security_checker\Collections;

use Drupal\composer_security_checker\Models\Advisory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AdvisoryCollectionSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Drupal\composer_security_checker\Collections\AdvisoryCollection');
    }

    function it_stores_advisories(Advisory $advisory)
    {
        $this->add($advisory);

        $this->shouldHaveCount(1);
    }

    function it_gets_advisories(Advisory $advisoryOne, Advisory $advisoryTwo)
    {
        $this->add($advisoryOne);
        $this->add($advisoryTwo);

        $advisories = $this->getAdvisories();

        $advisories->shouldBeArray();
        $advisories->shouldHaveCount(2);
    }
}
