<?php

namespace App\Enums;

enum StatusEnum: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';

    public static function values(): array
    {
        return array_map(fn($enum) => $enum->value, StatusEnum::cases());
    }

    public static function labels(): array
    {
        return [
            self::DRAFT->value => 'Draft',
            self::PUBLISHED->value => 'Published',
            self::ARCHIVED->value => 'Archived',
        ];
    }

    public function label(): string
    {
        return self::labels()[$this->value];
    }
}
