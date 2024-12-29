<?php

declare(strict_types=1);

namespace App\Loan\Application\Service;

use App\Loan\Application\DTO\CalculationDTO;
use App\Loan\Model\Offer;
use App\Loan\Model\OfferRepositoryInterface;

use function array_map;

readonly class CalculatorService
{
    public function __construct(
        private OfferRepositoryInterface $repository,
    ) {
    }

    /** @return CalculationDTO[] */
    public function calculateOffers(int $loanAmount, int $loanTerm, string $sortBy = 'monthlyRate', string $sortDir = 'asc'): array
    {
        $offers = $this->repository->findByLoanCriteria(
            $loanAmount,
            $loanTerm,
            $sortBy,
            $sortDir
        );

        return array_map(function (Offer $offer) use ($loanAmount, $loanTerm) {
            return new CalculationDTO(
                $offer->getProvider()->getName(),
                $offer->getMinAmount(),
                $offer->getMaxAmount(),
                $offer->getInterestRate(),
                $this->calculateMonthlyRate($loanAmount, $loanTerm, $offer->getInterestRate()),
                $offer->getRrso(),
                $this->calculateTotalCost($loanAmount, $loanTerm, $offer->getInterestRate())
            );
        }, $offers);
    }

    private function calculateMonthlyRate(float $loanAmount, float $loanTerm, float $interestRate): float
    {
        $monthlyRate = $interestRate / 12 / 100;
        return $loanAmount * $monthlyRate / (1 - ((1 + $monthlyRate) ** -$loanTerm));
    }

    private function calculateTotalCost(float $loanAmount, float $loanTerm, float $interestRate): float
    {
        $monthlyRate = $interestRate / 12 / 100;
        return $loanAmount * $monthlyRate / (1 - ((1 + $monthlyRate) ** -$loanTerm)) * $loanTerm;
    }
}
