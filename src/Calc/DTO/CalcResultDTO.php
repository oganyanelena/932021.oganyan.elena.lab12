<?php

declare(strict_types=1);

namespace App\Calc\DTO;

readonly class CalcResultDTO
{
    public int $firstValue;
    public int $secondValue;
    public string $operationSymbol;
    public int $result;

    public function __construct(array $resultData)
    {
        [
            'firstValue' => $this->firstValue,
            'secondValue' => $this->secondValue,
            'operation' => $this->operationSymbol,
            'result' => $this->result,
        ] = $resultData;
    }
}
