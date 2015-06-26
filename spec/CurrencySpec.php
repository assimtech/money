<?php

namespace spec\Assimtech\Money;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CurrencySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('USD');
        $this->shouldHaveType('Assimtech\Money\Currency');
    }

    function it_can_be_cast_to_string()
    {
        $this->beConstructedWith('USD');

        $this->__toString()->shouldReturn('USD');
    }

    function it_has_fraction_digits()
    {
        $this->beConstructedWith('USD');

        $this->getFractionDigits()->shouldReturn(2);
    }
}
