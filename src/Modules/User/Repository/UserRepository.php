<?php

declare(strict_types=1);

namespace Module\User\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Module\User\Entity\User;

class UserRepository extends EntityRepository
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
        parent::__construct($this->em, $this->em->getClassMetadata(User::class));
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

    public function findAllWithSettings()
    {
        return $this
            ->createQueryBuilder('users')
            ->join('users.userSettings', 'us')
            ->where('us.id = :user_setting')
            ->setParameter('user_setting', 2)
            ->getQuery()
            ->getResult();
    }
}
