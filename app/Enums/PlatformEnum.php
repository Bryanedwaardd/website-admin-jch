<?php

namespace App\Enums;

enum PlatformEnum: string
{
    case YOUTUBE = 'YouTube';
    case YOUTUBE_SHORT = 'YouTube Short';
    case TIKTOK = 'Tiktok';
    case REELS = 'Reels';
    case FEEDS = 'Feeds';

    /**
     * Mengembalikan semua nilai enum.
     */
    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    /**
     * Mengembalikan nama enum yang ramah untuk ditampilkan.
     */
    public static function labels(): array
    {
        return [
            self::YOUTUBE->value => 'YouTube',
            self::YOUTUBE_SHORT->value => 'YouTube Short',
            self::TIKTOK->value => 'TikTok',
            self::REELS->value => 'Reels',
            self::FEEDS->value => 'Feeds',
        ];
    }
}
