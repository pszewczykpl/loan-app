<?php

declare(strict_types=1);

namespace App\Loan\Model;

interface OfferRepositoryInterface
{
    /** @return Offer[] */
    public function findByLoanCriteria(int $amount, int $term, string $sortBy, string $sortDir): array;
}
