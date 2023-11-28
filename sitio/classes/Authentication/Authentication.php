<?php
namespace App\Authentication;

use App\Models\User;
use App\Security\Encryption;

class Authentication
{

    protected ?User $user = null;

    public function logIn(string $email, string $password): bool
    {
        /** @var User $user */

        $this->user = (new User())->byEmail($email);
        if (!$this->user) {
            return false;
        }

        //password verification
        if (!(new Encryption())->verify($password, $this->user->getPassword())) {
            return false;
        }

        $_SESSION['user_id'] = $this->user->getUser_id();

        return true;
    }

    public function logOut(): void{
        unset($_SESSION['user_id']);
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public function getId(): ?int 
    {
        return $this->isAuthenticated() ? $_SESSION['user_id'] : null;
    }

    public function getUser(): ?User
    {
        if(!$this -> isAuthenticated()) return null;

        if(!$this -> user){
            $this -> user = (new User()) -> byId($this -> getId());
        }

        
        return $this -> user;
    }

}
