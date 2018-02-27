<?php

namespace AppBundle\Entity;

class Task
{
    public $name;
    public $description;
    public $urgent;

    public function __construct($name, $description, $urgent)
    {
        $this->name = $name;
        $this->description = $description;
        $this->urgent = $urgent;
    }
}
