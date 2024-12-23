<?php

declare(strict_types=1);

namespace App\Loan\Infrastructure\Doctrine;

use App\Loan\Model\Provider;
use App\Loan\Model\ProviderRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

readonly class ProviderRepository implements ProviderRepositoryInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    ) {
    }

    /** @return Provider[] */
    public function findAll(): array
    {
        return $this->em->getRepository(Provider::class)->findAll();
    }
}
