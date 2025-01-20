<?php

declare(strict_types=1);

namespace Infrastructure\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
use Infrastructure\Repository\UserRepository;
use Ramsey\Uuid\Uuid;

#[
    ORM\Entity(repositoryClass: UserRepository::class),
    ORM\Table(name: 'users'),
    ORM\HasLifecycleCallbacks
]
final class User implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable;
    use CanResetPassword;

    /**
     * @var int
     */
    #[
        ORM\Id,
        ORM\GeneratedValue,
        ORM\Column(name: 'id', type: 'integer')
    ]
    private int $id;

    /**
     * @var string
     */
    #[
        ORM\Column(name: 'email', type: 'string', length: 250)
    ]
    private string $email;

    #[
        ORM\Column(name: 'phone', type: 'string', length: 32)
    ]
    private string $phone;

    #[
        ORM\Column(name: 'password', type: 'string', length: 255, nullable: false)
    ]
    private string $password = '';

    #[
        ORM\Column(name: 'uid', type: 'string', length: 36, unique: true)
    ]
    private string $uuid;

    #[
        ORM\Column(name: 'first_name', type: 'string', length: 120)
    ]
    private string $firstName = '';

    #[
        ORM\Column(name: 'last_name', type: 'string', length: 120)
    ]
    private string $lastName = '';

    #[
        ORM\Column(type: 'datetime_immutable', name: 'created_at')
    ]
    private DateTimeInterface $createdAt;

    #[
        ORM\Column(type: 'datetime_immutable', name: 'updated_at')
    ]
    private DateTimeInterface $updatedAt;

    #[
        ORM\OneToMany(targetEntity: UserSetting::class, mappedBy: 'user')
    ]
    private Collection $userSettings;

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): User
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): User
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __construct()
    {
        $this->userSettings = new ArrayCollection();
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): User
    {
        $this->phone = $phone;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = Hash::make($password);

        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): User
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUserSettings(): Collection
    {
        return $this->userSettings;
    }

    public function setUserSettings(UserSetting $userSettings): User
    {
        $this->userSettings[] = $userSettings;

        return $this;
    }
}
