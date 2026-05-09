<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Misaf\VendraLanguage\Database\Factories\LanguageFactory;
use Misaf\VendraTenant\Traits\BelongsToTenant;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;
use Spatie\TranslationLoader\LanguageLine as SpatieLanguage;

/**
 * @property int $id
 * @property int $tenant_id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string $iso_code
 * @property bool $is_default
 * @property int $position
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
final class Language extends SpatieLanguage implements HasMedia, Sortable
{
    use BelongsToTenant;

    /** @use HasFactory<LanguageFactory> */
    use HasFactory;

    use InteractsWithMedia;
    use LogsActivity;
    use SoftDeletes;
    use SortableTrait;

    protected $casts = [
        'id'          => 'integer',
        'tenant_id'   => 'integer',
        'name'        => 'string',
        'description' => 'string',
        'slug'        => 'string',
        'iso_code'    => 'string',
        'is_default'  => 'boolean',
        'position'    => 'integer',
        'status'      => 'boolean',
    ];

    protected $fillable = [
        'name',
        'description',
        'slug',
        'iso_code',
        'is_default',
        'position',
        'status',
    ];

    protected $hidden = [
        'tenant_id',
    ];

    /**
     * @return MorphMany<Media, $this>
     */
    public function multimedia(): MorphMany
    {
        return $this->media();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb-table')
            ->width(48)
            ->format('webp');

        $this->addMediaConversion('small')
            ->width(300)
            ->format('webp');

        $this->addMediaConversion('medium')
            ->width(500)
            ->format('webp');

        $this->addMediaConversion('large')
            ->width(800)
            ->format('webp');

        $this->addMediaConversion('extra-large')
            ->width(1200)
            ->format('webp');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->preventOverwrite();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logExcept(['id']);
    }
}
