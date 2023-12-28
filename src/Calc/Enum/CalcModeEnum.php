<?php

declare(strict_types=1);

namespace App\Calc\Enum;

enum CalcModeEnum: string
{
    case manualParsingInSingleAction = 'ManualParsingInSingleAction';
    case manualParsingInSeparateActions = 'ManualParsingInSeparateActions';
    case modelParametersBinding = 'ModelBindingInParameters';
    case modelBinding = 'ModelBindingSeparateModel';
}
