<?php

namespace App\Loan\Infrastructure\Doctrine;

use App\Loan\Model\Offer;
use App\Loan\Model\OfferRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

readonly class OfferRepository implements OfferRepositoryInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    ) {
    }

    /** @return Offer[] */
    public function findByLoanCriteria(int $amount, int $term, string $sortBy, string $sortDir): array
    {
        return $this->em->getRepository(Offer::class)
            ->createQueryBuilder('o')
            ->where('o.minAmount <= :amount')
            ->andWhere('o.maxAmount >= :amount')
            ->andWhere('o.minTerm <= :term')
            ->andWhere('o.maxTerm >= :term')
            ->setParameter('amount', $amount)
            ->setParameter('term', $term)
            ->orderBy('o.' . $sortBy, $sortDir)
            ->getQuery()
            ->getResult();
    }
}
