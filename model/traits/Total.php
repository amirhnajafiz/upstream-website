<?php

namespace mvc\model\traits;

trait Total
{
    public function getTotal()
    {
        return $this->count_all($this->table_name);
    }
}

?>