<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    protected $qualityStep = -1;

    const QUALITY_MIN = 0;

    const QUALITY_MAX = 50;


    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        if ('Aged Brie' == $name) {
            return new AgedBrie($name, $quality, $sellIn);
        }
        if ('Sulfuras, Hand of Ragnaros' == $name) {
            return new Sulfuras($name, $quality, $sellIn);
        }
        if ('Backstage passes to a TAFKAL80ETC concert' == $name) {
            return new BackstagePasses($name, $quality, $sellIn);
        }
        if ('Conjured Mana Cake' == $name) {
            return new ConjuredItem($name, $quality, $sellIn);
        }

        return new static($name, $quality, $sellIn);
    }

    /**
     * Adjust the item's quality
     */
    protected function adjustQuality()
    {
        $this->quality += $this->qualityStep;

        if ( $this->sellIn < 1 ) {
            $this->quality += $this->qualityStep;
        }

        if ( $this->quality < static::QUALITY_MIN ) {
            $this->quality = static::QUALITY_MIN;
        }

        if ( $this->quality > static::QUALITY_MAX ) {
            $this->quality = static::QUALITY_MAX;
        }
    }

    public function tick()
    {
        $this->adjustQuality();

        $this->sellIn--;
    }
}
