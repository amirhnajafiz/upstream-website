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

    public function getID()
    {
        return $this->ID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getUploader()
    {
        return $this->uploader;
    }

    public function isActive()
    {
        return $this->isActive;
    }

    public function uploadDate()
    {
        return $this->uploadDate;
    }

    public function getDownloads()
    {
        return $this->downloads;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function expireDate()
    {
        return $this->expireDate;
    }

    public function isValid()
    {
        return $this->valid;
    }
}

?>