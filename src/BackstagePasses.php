<?php namespace App;

class BackstagePasses extends GildedRose
{
    protected $qualityStep = 1;

    public function tick()
    {
        if ($this->sellIn <= 10) {
            $this->qualityStep = 2;
        }
        if ($this->sellIn <= 5) {
            $this->qualityStep = 3;
        }
        if ($this->sellIn <= 0) {
            $this->quality = $this->qualityStep = 0;
        }

        parent::tick();
    }
}