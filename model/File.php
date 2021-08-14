<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * File model is the file schema in our database.
 * 
 */
class File extends Model 
{
    public int $id;
    public string $name;
    public string $link;
    public string $uploader;
    public int $isPrivate;
    public date $uploadDate;
    public int $download;
    public string $type;
    public int $size;
    public date $expireDate;
    public int $valid;

    protected $table_name = "file";
}

?>