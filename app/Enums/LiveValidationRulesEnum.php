<?php

namespace App\Enums;

enum LiveValidationRulesEnum: string
{
    case Required = 'required';
    case Email = 'email';
    case Max = 'max';
    case Min = 'min';
    case Confirmed = 'confirmed';
}
