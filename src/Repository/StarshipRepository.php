<?php

namespace App\Repository;

use App\Entity\Starship;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;

/**
 * @extends ServiceEntityRepository<Starship>
 *
 * @method Starship|null find($id, $lockMode = null, $lockVersion = null)
 * @method Starship|null findOneBy(array $criteria, array $orderBy = null)
 * @method Starship[]    findAll()
 * @method Starship[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StarshipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private LoggerInterface $logger)
    {
        parent::__construct($registry, Starship::class);
        $this->logger->info('starships collection');
    }

    //    /**
    //     * @return Starship[] Returns an array of Starship objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Starship
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllOf(): array
    {
        $starship1 = new Starship();
        $starship1
            ->setId(1)
            ->setClass('Garden')
            ->setName('USS LeafyCruiser (NNC-001)')
            ->setCaptain('Daniyal Namdar')
            ->setStatus('under construction');

        $starship2 = new Starship();
        $starship2
            ->setId(2)
            ->setClass('Park')
            ->setName('USS LeafyCruiser (NNC-002)')
            ->setCaptain('Ozge Koz')
            ->setStatus('under construction');

        return [$starship1, $starship2];
    }

    public function findId(int $id): ?Starship
    {
        foreach ($this->findAllOf() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }
}
