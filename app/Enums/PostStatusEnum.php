<?php

namespace App\Enums;

enum PostStatusEnum: int implements Enum
{
    case Draft = 0;
    case Published = 1;
    case Archived = 2;

    public function title(): string
    {
        return match ($this) {
            self::Draft => trans('Draft'),
            self::Published => trans('Published'),
            self::Archived => trans('Archived'),
        };
    }
}
