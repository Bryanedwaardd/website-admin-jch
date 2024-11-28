<?php

namespace App\Enums;

enum EventInfoSourceEnum: string
{
    case WEB = 'web';
    case SOCIAL_MEDIA = 'social_media';
    case FLYER = 'flyer';

    public static function labels(): array
    {
        return [
            self::WEB->value => 'Web',
            self::SOCIAL_MEDIA->value => 'Social Media',
            self::FLYER->value => 'Flyer',
        ];
    }
}
