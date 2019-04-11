<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\EmailValidator;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LoginAccountRepository")
 */
class LoginAccount implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message="l'email {{value}} n'est pas un email valide",
     * checkMX= true
     * )
     * @Assert\Length(
     * min="10",
     * max="50",
     * minMessage = "Votre adresse Email doit contenir au moins 10 caractères...",
     * maxMessage = "Votre adresse Email ne peut pas contenir plus de 50 caractères...")
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",
     * max="50",
     * minMessage= "Votre mot de passe doit contenir au moins 8 caractères...",
     * maxMessage= "Votre mot de passe ne peut pas contenir plus de 50 caractères...")
     * @Assert\NotBlank()
     */
    private $password;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function eraseCredentials() {}

    public function getSalt(){}
    
    public function getRoles()
    {
            return ['ROLE_USER'];
        
    }
}
