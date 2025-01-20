<?php

declare(strict_types=1);

namespace Infrastructure\Entity;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Infrastructure\Repository\UserRepository;
use Ramsey\Uuid\Uuid;

#[
    ORM\Entity(repositoryClass: UserRepository::class),
    ORM\Table(name: 'users'),
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
        ORM\Column(name: 'user_id')
    ]
    private int $id;

    /**
     * @var string
     */
    #[
        ORM\Column(name: 'email', type: 'string')
    ]
    private string $email;

    #[
        ORM\Column(name: 'phone', type: 'string')
    ]
    private string $phone;

    #[
        ORM\Column(name: 'password', type: 'string')
    ]
    private string $password;

    #[
        ORM\Column(name: 'uid', type: 'string', length: '36', unique: true)
    ]
    private string $uuid;

    public function __construct()
    {
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }
}
