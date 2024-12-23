<?php

declare(strict_types=1);

namespace App\Loan\Model;

enum TermType: string
{
    case MONTHLY = 'monthly';
    case DAILY = 'daily';
}
