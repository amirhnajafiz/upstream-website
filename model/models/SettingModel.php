<?php

namespace mvc\model\models;

class SettingModel
{
    private int $maxFileSize;

    public function get()
    {
        return $this->maxFileSize;
    }

    public function set(int $maxFileSize)
    {
        $this->maxFileSize = $maxFileSize;
    }
}

?>