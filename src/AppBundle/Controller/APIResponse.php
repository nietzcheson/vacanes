<?php

namespace AppBundle\Controller;

class APIResponse
{
    private $data;
    private $format;
    private $group;

    public function data($data)
    {
        $this->data = $data;

        return $this;
    }

    public function format($format = 'json')
    {
        $this->format = $format;

        return $this;
    }

    public function group($group)
    {
        $this->group = $group;

        return $this;
    }

    public function response()
    {
        return $this->data.' '.$this->format.' '.$this->group;
    }

}




?>
