<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends AbstractLoader
{
    private $lat;
    private $lng;
    private $perimeter;

    public function __construct()
    {
        $this->lat = 21.192689;
        $this->lng = -86.8213484;
        $this->perimeter = 50;
    }

    public function getFixtures()
    {
        return [
            __DIR__.'/app.yml'
        ];
    }
    
    public function lat()
    {
        if($this->sings() == '+'){
            return $this->lat + $this->random($this->perimeter());
        }

        return $this->lat - $this->random($this->perimeter());
    }

    public function lng()
    {
        if($this->sings() == '+'){
            return $this->lng + $this->random($this->perimeter());
        }

        return $this->lng + $this->random($this->perimeter());
    }

    private function perimeter()
    {
        return $this->perimeter / 111.12;
    }

    private function random($n)
    {
        $min = 0;
        $decimals = 8;

        $scale = pow(10, $decimals);

        return mt_rand($min * $scale, $n * $scale) / $scale;
    }

    private function sings()
    {
        return ['+','-'];
    }
}
