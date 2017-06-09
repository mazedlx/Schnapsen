<?php

namespace spec\Schnapsen;

use Schnapsen\Spieler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SpielerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Spieler::class);
    }
}
