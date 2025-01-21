<?php

declare(strict_types=1);

namespace Infrastructure\Entity;

use Doctrine\ORM\Mapping as ORM;
use Infrastructure\Repository\UserSettingRepository;

#[
    ORM\Entity(repositoryClass: UserSettingRepository::class),
    ORM\Table(name: 'user_settings'),
    ORM\HasLifecycleCallbacks
]
final class UserSetting
{
    #[
        ORM\Id,
        ORM\GeneratedValue,
        ORM\Column(name: 'id', type: 'integer')
    ]
    private int $id;

    #[
        ORM\Column(name: 'name', type: 'string', length: 200)
    ]
    private int $name;

    #[
        ORM\Column(name: 'value', type: 'string', length: 100)
    ]
    private int $value;

    #[
        ORM\Column(type: 'datetime_immutable', name: 'created_at')
    ]
    private \DateTimeInterface $createdAt;

    #[
        ORM\Column(type: 'datetime_immutable', name: 'updated_at')
    ]
    private \DateTimeInterface $updatedAt;

    #[
        ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id'),
        ORM\ManyToOne(targetEntity: User::class, inversedBy: 'userSettings')
    ]
    private User $user;

    public function getName(): int
    {
        return $this->name;
    }

    public function setName(int $name): UserSetting
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    // Product

    public function setValue(int $value): UserSetting
    {
        $this->value = $value;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setUserId(int $userId): UserSetting
    {
        $this->id = $userId;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): UserSetting
    {
        $user->setUserSettings($this);
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): UserSetting
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): UserSetting
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}
