<?php

namespace App\Enums;

enum BookPaymentEnum: int
{
    case PAID = 1;
    case UNPAID = 0;
}
