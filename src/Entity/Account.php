<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserName;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\EmailValidator;



/**
 * @ORM\Entity(repositoryClass="App\Repository\AccountRepository")
 * @UniqueEntity(
 * fields= {"email"},
 * message= "Votre adresse email est déja prise..."
 * )
 */
class Account implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min="10",
     * max="50",
     * minMessage = "Votre adresse Email doit contenir au moins 10 caractères...",
     * maxMessage = "Votre adresse Email ne peut pas contenir plus de 50 caractères...")
     * @Assert\NotBlank()
     * @Assert\Email(
     * message= "l'adresse Email n'est pas valide...",
     * checkMX= true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min="4",
     * max="15",
     * minMessage = "Votre Pseudo doit contenir au moins 4 caractères...",
     * maxMessage = "Votre Pseudo ne peut pas contenir plus de 15 caractères...")
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min="8",
     * max="50",
     * minMessage= "Votre mot de passe doit contenir au moins 8 caractères...",
     * maxMessage= "Votre mot de passe ne peut pas contenir plus de 50 caractères...")
     * @Assert\NotBlank()
     */
    private $password;

     /**
     * @Assert\EqualTo(propertyPath="password", message="Vos mots de passe ne correspondent pas...")
     * 
     */
    public $confirm_password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials() {}

    public function getSalt(){}

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

}
