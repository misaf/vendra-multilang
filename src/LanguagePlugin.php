<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage;

use Filament\Contracts\Plugin;
use Filament\Panel;

final class LanguagePlugin implements Plugin
{
    public function getId(): string
    {
        return 'vendra-language';
    }

    public static function make(): static
    {
        /** @var static $plugin */
        $plugin = app(static::class);

        return $plugin;
    }

    public function register(Panel $panel): void
    {
        $panel->discoverClusters(
            in: __DIR__ . '/Filament/Clusters',
            for: 'Misaf\\VendraLanguage\\Filament\\Clusters',
        );
    }

    public function boot(Panel $panel): void {}
}
