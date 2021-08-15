<?php

namespace mvc\model\traits;

trait Total
{
    public function getTotal()
    {
        return $this->count_all($this->table_name);
    }

    public function fetchTotal()
    {
        return $this->selectAll($this->table_name);
    }
}

?>