<?php

declare(strict_types=1);

namespace App\Loan\Application\DTO;

class CalculationDTO
{
    private string $name;
    private float $minAmount;
    private float $maxAmount;
    private float $interestRate;
    private float $monthlyRate;
    private float $rrso;
    private float $totalCost;

    public function __construct(
        string $name,
        float $minAmount,
        float $maxAmount,
        float $interestRate,
        float $monthlyRate,
        float $rrso,
        float $totalCost,
    ) {
        $this->name = $name;
        $this->minAmount = $minAmount;
        $this->maxAmount = $maxAmount;
        $this->interestRate = $interestRate;
        $this->monthlyRate = $monthlyRate;
        $this->rrso = $rrso;
        $this->totalCost = $totalCost;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getMinAmount(): float
    {
        return $this->minAmount;
    }

    public function setMinAmount(float $minAmount): static
    {
        $this->minAmount = $minAmount;
        return $this;
    }

    public function getMaxAmount(): float
    {
        return $this->maxAmount;
    }

    public function setMaxAmount(float $maxAmount): static
    {
        $this->maxAmount = $maxAmount;
        return $this;
    }

    public function getInterestRate(): float
    {
        return $this->interestRate;
    }

    public function setInterestRate(float $interestRate): static
    {
        $this->interestRate = $interestRate;
        return $this;
    }

    public function getMonthlyRate(): float
    {
        return $this->monthlyRate;
    }

    public function setMonthlyRate(float $monthlyRate): static
    {
        $this->monthlyRate = $monthlyRate;
        return $this;
    }

    public function getRrso(): float
    {
        return $this->rrso;
    }

    public function setRrso(float $rrso): static
    {
        $this->rrso = $rrso;
        return $this;
    }

    public function getTotalCost(): float
    {
        return $this->totalCost;
    }

    public function setTotalCost(float $totalCost): static
    {
        $this->totalCost = $totalCost;
        return $this;
    }
}
