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
        'A' => 11,
        'K' => 4,
        'D' => 3,
        'J' => 2,
        10 =>  10,
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
        foreach ($this->farben as $farbe) {
            foreach ($this->werte as $bezeichnung => $wert) {
                $this->karten[] = [
                    'farbe' => $farbe,
                    'wert' => $wert,
                    'bezeichnung' => $farbe . $bezeichnung
                ];
            }
        }
        return $this;
    }

    public function mischen()
    {
        shuffle($this->karten);
        return $this;
    }

    public function abheben()
    {
        $cards = rand(1, count($this->karten));
        $slice = array_slice($this->karten, 0, $cards);
        $remainingCards = array_slice($this->karten, $cards - 1, count($this->karten) - $cards);
        $cards = array_merge($remainingCards, $slice);
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
