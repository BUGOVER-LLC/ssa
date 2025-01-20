<?php

declare(strict_types=1);

namespace Module\User\Service;

use Doctrine\Persistence\ObjectManager;
use Illuminate\Support\Facades\Hash;
use Infrastructure\Entity\User;
use Module\User\DTO\RegisterUserDto;

class QueryService
{
    public function __construct(private readonly ObjectManager $manager)
    {
    }

    public function registerUser(RegisterUserDto $dto)
    {
        $user = (new User())
            ->setEmail($dto->email)
            ->setPassword(Hash::make($dto->password));

        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }
}
