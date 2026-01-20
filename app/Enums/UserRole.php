<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case User = 'user';

    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => __('Admin'),
            self::User => __('User'),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Admin => 'green',
            self::User => 'blue',
        };
    }
}
