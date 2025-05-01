<?php

namespace App\Enums;

enum PostStatusEnum: string implements Enum
{
    case Draft = 'draft';
    case Published = 'published';
    case Archived = 'archived';

    public function title(): string
    {
        return match ($this) {
            self::Draft => trans('Draft'),
            self::Published => trans('Published'),
            self::Archived => trans('Archived'),
        };
    }
}
