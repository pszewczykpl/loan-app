<?php

declare(strict_types=1);

namespace App\Loan\Model;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'offers')]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Provider::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Provider $provider;

    #[ORM\Column(type: 'string', enumType: OfferType::class)]
    private OfferType $type;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private float $minAmount;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private float $maxAmount;

    #[ORM\Column(type: 'string', enumType: TermType::class)]
    private TermType $termType;

    #[ORM\Column(type: 'integer')]
    private int $minTerm;

    #[ORM\Column(type: 'integer')]
    private int $maxTerm;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2)]
    private float $interestRate;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private ?float $commission = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2)]
    private float $rrso;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getProvider(): Provider
    {
        return $this->provider;
    }

    public function setProvider(Provider $provider): void
    {
        $this->provider = $provider;
    }

    public function getType(): OfferType
    {
        return $this->type;
    }

    public function setType(OfferType $type): void
    {
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getMinAmount(): float
    {
        return $this->minAmount;
    }

    public function setMinAmount(float $minAmount): void
    {
        $this->minAmount = $minAmount;
    }

    public function getMaxAmount(): float
    {
        return $this->maxAmount;
    }

    public function setMaxAmount(float $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }

    public function getTermType(): TermType
    {
        return $this->termType;
    }

    public function setTermType(TermType $termType): void
    {
        $this->termType = $termType;
    }

    public function getMinTerm(): int
    {
        return $this->minTerm;
    }

    public function setMinTerm(int $minTerm): void
    {
        $this->minTerm = $minTerm;
    }

    public function getMaxTerm(): int
    {
        return $this->maxTerm;
    }

    public function setMaxTerm(int $maxTerm): void
    {
        $this->maxTerm = $maxTerm;
    }

    public function getInterestRate(): float
    {
        return $this->interestRate;
    }

    public function setInterestRate(float $interestRate): void
    {
        $this->interestRate = $interestRate;
    }

    public function getCommission(): ?float
    {
        return $this->commission;
    }

    public function setCommission(?float $commission): void
    {
        $this->commission = $commission;
    }

    public function getRrso(): float
    {
        return $this->rrso;
    }

    public function setRrso(float $rrso): void
    {
        $this->rrso = $rrso;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
