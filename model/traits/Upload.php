<?php

namespace mvc\model\traits;

trait Upload
{
    public function uploadFile($name, $link, $username, $type, $size, $expiredate) 
    {
        return $this->insert($this->table_name, [
            "id" => NULL,
            "name" => $name, 
            "link" => $link,
            "uploader" => $username,
            "isprivate" => 0,
            "download" => 0,
            "type" => $type,
            "size" => $size,
            "expiredate" => $expiredate,
            "valid" => 0
        ]);
    }
}

?>