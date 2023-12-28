<?php

declare(strict_types=1);

namespace App\Calc;

use App\Calc\DTO\CalcInputDTO;
use App\Calc\DTO\CalcResultDTO;
use App\Calc\Enum\CalcOperationEnum;

class CalcService
{
    public function getResultDTOFromInputDTO(CalcInputDTO $inputDTO): CalcResultDTO
    {
        $result = $this->getResult($inputDTO->firstValue, $inputDTO->secondValue, $inputDTO->operation);
        $resultData = [
            'firstValue' => $inputDTO->firstValue,
            'secondValue' => $inputDTO->secondValue,
            'operation' => $inputDTO->operation->value,
            'result' => $result,
        ];

        return new CalcResultDTO($resultData);
    }

    public function add(int $firstValue, int $secondValue): int
    {
        return $firstValue + $secondValue;
    }

    public function sub(int $firstValue, int $secondValue): int
    {
        return $firstValue - $secondValue;
    }

    public function mult(int $firstValue, int $secondValue): int
    {
        return $firstValue * $secondValue;
    }

    public function div(int $firstValue, int $secondValue): int
    {
        try {
            return (int)($firstValue / $secondValue);
        } catch (\DivisionByZeroError $error) {
            throw new DivisionByZeroException(message:"Attempt to divide $firstValue by zero", previous: $error);
        }
    }

    private function getResult(int $firstValue, int $secondValue, CalcOperationEnum $operation): int
    {
        return match ($operation) {
            CalcOperationEnum::addition => $this->add($firstValue, $secondValue),
            CalcOperationEnum::subtraction => $this->sub($firstValue, $secondValue),
            CalcOperationEnum::multiplying => $this->mult($firstValue, $secondValue),
            CalcOperationEnum::division => $this->div($firstValue, $secondValue)
        };
    }
}
