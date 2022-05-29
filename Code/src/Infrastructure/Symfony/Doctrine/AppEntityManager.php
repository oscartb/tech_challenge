<?php

namespace App\Infrastructure\Symfony\Doctrine;

use Doctrine\ORM\Decorator\EntityManagerDecorator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security\FirewallContext;

class AppEntityManager extends EntityManagerDecorator {

    public function __construct(EntityManagerInterface $entityManager) {
        parent::__construct($entityManager);
    }

    public function save($entity)
    {
        $this->persist($entity);
        $this->flush();
    }
}