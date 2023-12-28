<?php

declare(strict_types=1);

namespace App\Calc\DTO;

use App\Calc\Enum\CalcOperationEnum;

class CalcInputDTO
{
    public int $firstValue;
    public int $secondValue;
    public CalcOperationEnum $operation;
}
