<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

class AppFixtures extends AbstractLoader
{
    /**
     * {@inheritdoc}
     */
    public function getFixtures()
    {
        return [
            __DIR__.'/app.yml'
        ];
    }

    public function characterName()
    {
        $names = [
            'Cristian',
            'Dulce',
            'Emmanuel',
            'David',
            'Ivanna',
            'Regina'
        ];

        return $names[array_rand($names)];
    }
}
