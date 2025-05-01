<?php

namespace App\Enums;

enum UserGenderEnum: int implements Enum
{
    case Male = 0;
    case Female = 1;

    public function title(): string
    {
        return match ($this) {
            self::Male => trans('Male'),
            self::Female => trans('Female'),
        };
    }
}
