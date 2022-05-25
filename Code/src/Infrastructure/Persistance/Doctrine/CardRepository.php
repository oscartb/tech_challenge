<?php

namespace App\Infrastructure\Persistance\Doctrine;

use App\Domain\CardGame\Entity\Card;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Card|null find($id, $lockMode = null, $lockVersion = null)
 * @method Card|null findOneBy(array $criteria, array $orderBy = null)
 * @method Card[]    findAll()
 * @method Card[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Card::class);
    }

    /**
     * @param int $quantity
     * @return Card[]
     */
    public function getRandomCards($quantity = 20): array
    {
        return $this->getRandomCardsNativeQuery($quantity)->getResult();
    }

    /**
     * @param int $quantity
     * @return @ORM\NativeQuery
     */
    public function getRandomCardsNativeQuery(int $quantity = 20)
    {
        $table = $this->getClassMetadata()
            ->getTableName();

        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('App\Domain\CardGame\Entity\Card', 'card');
        $rsm->addFieldResult('card', 'id', 'id');
        $rsm->addFieldResult('card', 'hp', 'HP');
        $rsm->addFieldResult('card', 'name', 'name');
        $rsm->addFieldResult('card', 'damage', 'damage');

        return $this->getEntityManager()->createNativeQuery("
            SELECT * FROM {$table} p ORDER BY RAND() LIMIT 0, {$quantity}
        ", $rsm);
    }
}
