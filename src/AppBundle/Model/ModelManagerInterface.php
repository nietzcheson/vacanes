<?php

namespace AppBundle\Model;

interface ModelManagerInterface
{
    public function create();

    public function save($model, $flush= true);

    public function delete($model, $flush = true);

    public function getClass();

    public function findOneBy($array = array());
}
