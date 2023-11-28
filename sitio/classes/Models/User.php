<?php
namespace App\Models;

use App\DB\DBConexion;
use PDO;

class User
{
    protected int $user_id;
    protected int $role_fk;
    protected string $email;
    protected string $password;
    protected string $name;
    protected string $lastname;

    public function byId(string $id): ?self
    {
        $db = (new DBConexion())->getDB();
        $query = "SELECT * FROM users
        WHERE user_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        /** @var self|bool $user */

        $user = $stmt->fetch();
        if (!$user) return null;

        return $user;
    }

    public function byEmail(string $email): ?self
    {
        $db = (new DBConexion())->getDB();
        $query = "SELECT * FROM users
        WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        /** @var self|bool $user */

        $user = $stmt->fetch();
        if (!$user) return null;

        return $user;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of role_fk
     */
    public function getRole_fk()
    {
        return $this->role_fk;
    }

    /**
     * Set the value of role_fk
     *
     * @return  self
     */
    public function setRole_fk($role_fk)
    {
        $this->role_fk = $role_fk;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }
}
