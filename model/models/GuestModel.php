<?php

namespace mvc\model\models;

class GuestModel
{
    private int $ID;
    private string $name;
    private int $currentUse;

    public function getID()
    {
        return $this->ID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCurrentUse()
    {
        return $this->currentUse;
    }
}

?>