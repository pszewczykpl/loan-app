<?php

declare(strict_types=1);

namespace App\Loan\UI\Twig\Component;

use App\Loan\Application\DTO\CalculationDTO;
use App\Loan\Application\Service\CalculatorService;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(template: '_components/loan/calculator.html.twig')]
class Calculator
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public int $loanAmount = 20000;

    #[LiveProp(writable: true)]
    public int $loanTerm = 48;

    #[LiveProp(writable: true)]
    public string $sortBy = 'id';

    public function __construct(
        private readonly CalculatorService $service,
    ) {
    }

    /** @return CalculationDTO[] */
    public function getOffers(): array
    {
        return $this->service->calculateOffers($this->loanAmount, $this->loanTerm, $this->sortBy);
    }

    #[LiveAction]
    public function incrementLoanAmount(int $amount = 1000): void
    {
        $this->loanAmount += $amount;
    }

    #[LiveAction]
    public function decrementLoanAmount(int $amount = 1000): void
    {
        $this->loanAmount -= $amount;
    }

    #[LiveAction]
    public function incrementLoanTerm(int $term = 1): void
    {
        $this->loanTerm += $term;
    }

    #[LiveAction]
    public function decrementLoanTerm(int $term = 1): void
    {
        $this->loanTerm -= $term;
    }
}
