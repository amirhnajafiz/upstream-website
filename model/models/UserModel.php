<?php 

namespace mvc\model\models;

/**
 * Usermodel is an object to fetch data
 * from database into this class.
 * 
 */
class UserModel
{
    // Private fields
    private string $name;
    private string $password;
    private int $status;
    private int $isAdmin;
    private int $canConfirm;

    /**
     * 
     * @return name get username
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @return password get user password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * 
     * @return status get user status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * 
     * @return isAdmin get admin status
     */
    public function isAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * 
     * @return canConfirm get confirmation status
     */
    public function canConfirm()
    {
        return $this->canConfirm;
    }
}

?>