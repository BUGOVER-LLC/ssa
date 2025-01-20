<?php

declare(strict_types=1);

namespace Module\User\Service;

use Doctrine\ORM\EntityManagerInterface;
use Infrastructure\Entity\User;
use Module\User\DTO\RegisterUserDto;

class QueryService
{
    public function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    public function createUser(RegisterUserDto $dto)
    {
        $user = (new User())
            ->setEmail($dto->email)
            ->setPassword($dto->password);

        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }
}
