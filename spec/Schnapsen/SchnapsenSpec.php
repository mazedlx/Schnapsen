<?php

namespace spec\Schnapsen;

use Schnapsen\Schnapsen;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SchnapsenSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Schnapsen::class);
    }

    function it_creates_a_deck()
    {
        $this->mischen()->karten->shouldHaveCount(20);
    }

    function it_splits_the_deck_at_a_random_position()
    {
        $this->abheben()->karten->shouldHaveCount(20);
    }

    function it_deals_cards_to_each_player()
    {
        $this->geben();

        $this->spielerEins->hand->shouldHaveCount(5);
        $this->spielerZwei->hand->shouldHaveCount(5);

        $this->atout->shouldNotBeNull();
    }
}
