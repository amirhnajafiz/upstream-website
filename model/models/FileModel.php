<?php 

namespace mvc\model\models;

/**
 * Filemodel is the class for getting data 
 * from our database and store it init.
 * 
 */
class FileModel
{
    // Private fields
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

    /**
     * 
     * @return ID get File ID
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * 
     * @return name get File name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @return link get File link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * 
     * @return uploader get the name of File uploader
     */
    public function getUploader()
    {
        return $this->uploader;
    }

    /**
     * 
     * @return isActive get activation status
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * 
     * @return uploadDate get upload date of File
     */
    public function uploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * 
     * @return downloads get the number of downloads
     */
    public function getDownloads()
    {
        return $this->downloads;
    }

    /**
     * 
     * @return type get File type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 
     * @return size get File size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * 
     * @return expireDate get File expire date
     */
    public function expireDate()
    {
        return $this->expireDate;
    }

    /**
     * 
     * @return isValid check file validation
     */
    public function isValid()
    {
        return $this->valid;
    }
}

?>