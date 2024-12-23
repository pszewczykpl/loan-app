<?php

declare(strict_types=1);

namespace App\Loan\Model;

interface ProviderRepositoryInterface
{
    /** @return Provider[] */
    public function findAll(): array;
}
