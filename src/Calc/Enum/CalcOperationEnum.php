<?php

declare(strict_types=1);

namespace App\Calc\Enum;

enum CalcOperationEnum: string
{
    case addition = '+';
    case subtraction = '-';
    case multiplying = '*';
    case division = '/';
}
