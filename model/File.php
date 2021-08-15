<?php

namespace mvc\model;

use mvc\model\Model;
use mvc\model\traits\Total;
use mvc\model\traits\Upload;

/**
 * File model is the file schema in our database.
 * 
 */
class File extends Model 
{
    // traits
    use Total;
    use Upload;

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

    public function getUserFiles($username)
    {
        $sth = $this->pdo->prepare("SELECT F.name, link, uploaddate, isprivate, size, type, download , expiredate
                                    FROM $this->table_name as F JOIN user as U ON F.uploader = U.name
                                    WHERE U.name = '$username'");
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_OBJ);
    }
}

?>