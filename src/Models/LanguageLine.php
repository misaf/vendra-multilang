<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Misaf\VendraLanguage\Database\Factories\LanguageLineFactory;
use Misaf\VendraTenant\Traits\BelongsToTenant;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\TranslationLoader\LanguageLine as SpatieLanguageLine;

/**
 * @property int $id
 * @property int $tenant_id
 * @property string $group
 * @property string $key
 * @property array<string, string> $text
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
final class LanguageLine extends SpatieLanguageLine
{
    use BelongsToTenant;

    /** @use HasFactory<LanguageLineFactory> */
    use HasFactory;

    use LogsActivity;

    protected $hidden = [
        'tenant_id',
    ];

    protected function casts(): array
    {
        return [
            'tenant_id' => 'integer',
            ...parent::casts(),
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logExcept(['id']);
    }
}
