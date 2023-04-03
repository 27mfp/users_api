<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
<<<<<<< Updated upstream
#[ORM\Table(name: 'users_table')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
=======
#[ORM\Table(name: "users_table")]
/**
 * Summary of User
 */
class User
>>>>>>> Stashed changes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $email;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private \DateTimeInterface $created_at;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private \DateTimeInterface $updated_at;

    #[ORM\Column(length: 255)]
    private string $birthdate;

    #[ORM\Column(length: 20)]
    private string $phoneNumber;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(length: 255)]
    private string $city;
    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private string $password;

<<<<<<< Updated upstream
    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }
=======
    #[ORM\Column]
    private \DateTimeImmutable $updated_at;

    #[ORM\Column(type: 'string', length: 255)]
    private $birthdate;

    #[ORM\Column(type: 'string', length: 255)]
    private $bio = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'integer')]
    private $phonenumber;
>>>>>>> Stashed changes

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }



    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

<<<<<<< Updated upstream
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

=======
    public function getPhonenumber(): ?int
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(int $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }
>>>>>>> Stashed changes


    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
