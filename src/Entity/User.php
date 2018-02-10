<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="3",
     *     max="25",
     *     minMessage="Le nom d'utilisateur doit contenir au moins 3 caractères",
     *     maxMessage="Le nom d'utilisateur ne doit pas dépasser 25 caractères")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="8",
     *     max="50",
     *     minMessage="Le mot de passe doit être d'au moins 8 caractères",
     *     maxMessage="Le mot de passe ne doit pas dépasser 50 caractères")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50, unique=true)     *
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="8",
     *     max="50",
     *     minMessage="L'email doit contenir au moins 8 caractères",
     *     maxMessage="L'email ne doit pas dépasser 50 caractères")
     * @Assert\Email(
     *     message="{{ value }} n'est pas une adresse mail valide", checkMX=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean", name="is_unique")
     */
    private $isActive;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->setIsActive(true);
    }


    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password) : User
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * @param $username
     * @return $this
     */
    public function setUsername(string $username) :User
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return User
     */
    public function setIsActive(bool $isActive): User
    {
        $this->isActive = $isActive;

        return $this;
    }
}
