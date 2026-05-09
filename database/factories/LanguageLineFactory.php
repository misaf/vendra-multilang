<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Misaf\VendraLanguage\Enums\LanguageLineGroupEnum;
use Misaf\VendraLanguage\Models\LanguageLine;
use Misaf\VendraTenant\Models\Tenant;

/**
 * @extends Factory<LanguageLine>
 */
final class LanguageLineFactory extends Factory
{
    protected $model = LanguageLine::class;

    public function definition(): array
    {
        /** @var LanguageLineGroupEnum $group */
        $group = $this->faker->randomElement(LanguageLineGroupEnum::cases());

        return [
            'tenant_id' => Tenant::factory(),
            'group'     => $group->value,
            'key'       => fake()->word(),
            'text'      => ['en' => fake()->word()],
        ];
    }

    public function forTenant(Tenant|int $tenant): static
    {
        $tenantId = $tenant instanceof Tenant ? $tenant->id : $tenant;

        return $this->state(fn(): array => ['tenant_id' => $tenantId]);
    }
}
