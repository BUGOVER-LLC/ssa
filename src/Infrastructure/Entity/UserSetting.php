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

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeInterface $createdAt;

    // Product
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'userSettings')]
    private User $user;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
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
}
