<?php

declare(strict_types=1);

namespace Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Infrastructure\Entity\User;
use Infrastructure\Entity\UserSetting;

class UserSettingRepository extends EntityRepository
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
        parent::__construct($this->em, $this->em->getClassMetadata(UserSetting::class));
    }

    /**
     * @param int $id
     * @return ?User
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function findById(int $id): ?User
    {
        return $this->em->find($this->getEntityName(), $id);
    }
}
