<?php

declare(strict_types=1);

namespace App\Loan\Model;

enum OfferType: string
{
    case PAYDAY = 'PAYDAY';
    case PERSONAL = 'PERSONAL';
}
