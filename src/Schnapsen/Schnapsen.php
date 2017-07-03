<?php

namespace Schnapsen;

class Schnapsen
{
    protected $farben = [
        '♥',
        '♦',
        '♣',
        '♠',
    ];

    protected $werte = [
        ['bezeichnung' => 'A', 'wert' => 11],
        ['bezeichnung' => 'K', 'wert'  => 4],
        ['bezeichnung' => 'D', 'wert'  => 3],
        ['bezeichnung' => 'J', 'wert'  => 2],
        ['bezeichnung' => '10', 'wert'  =>  10],
    ];

    protected $genug = 66;

    public $karten = [];

    public $atout;

    public $stapel = [];

    public $spielerEins;

    public $spielerZwei;

    public function __construct()
    {
        $this->auspacken();

        $this->spielerEins = new Spieler();
        $this->spielerEins = new Spieler();

    }

    public function auspacken()
    {
        $this->karten = collect($this->farben)->map(function ($farbe) {
            return collect($this->werte)->map(function ($wert) use ($farbe) {
                return [
                    'farbe' => $farbe,
                    'wert' => $wert['wert'],
                    'bezeichnung' => $farbe . $wert['bezeichnung'],
                ];
            });
        })
        ->flatten(1)
        ->toArray();

        return $this;
    }

    public function mischen()
    {
        $this->karten = collect($this->karten)->shuffle()->toArray();

        return $this;
    }

    public function abheben()
    {
        $numberOfCards = rand(1, count($this->karten));
        $slice = collect($this->karten)->slice(0, $numberOfCards);
        $remainingCards = collect($this->karten)->slice($numberOfCards - 1, count($this->karten) - $numberOfCards);

        $this->karten = $remainingCards->merge($slice)->values()->toArray();

        return $this;
    }

    public function geben()
    {
        for ($i = 0; $i <= 2; $i++) {
            $this->spielerZwei->hand[$i] = $this->karten[$i];
            $this->spielerEins->hand[$i] = $this->karten[$i + 3];
        }

        $this->atout = $this->karten[6]['farbe'];

        for ($i = 3; $i <= 4; $i++) {
            $this->spielerZwei->hand[$i] = $this->karten[$i + 4];
            $this->spielerEins->hand[$i] = $this->karten[$i + 6];
        }
    }
}
