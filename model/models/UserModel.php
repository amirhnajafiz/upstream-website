<?php 

namespace mvc\model\models;

class UserModel
{
    private string $name;
    private string $password;
    private int $status;
    private int $isAdmin;
    private int $canConfirm;

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function isAdmin()
    {
        return $this->isAdmin;
    }

    public function canConfirm()
    {
        return $this->canConfirm;
    }
}

?>