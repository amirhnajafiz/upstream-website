<?php 

namespace mvc\model\models;

class FileModel
{
    private int $ID;
    private string $name;
    private string $link;
    private string $uploader;
    private int $isActive;
    private date $uploadDate;
    private int $downloads;
    private string $type;
    private int $size;
    private date $expireDate;
    private int $valid;
}

?>