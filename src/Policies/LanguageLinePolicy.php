<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Misaf\VendraLanguage\Enums\LanguageLineEnum;
use Misaf\VendraLanguage\Models\LanguageLine;
use Misaf\VendraUser\Models\User;

final class LanguageLinePolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->can(LanguageLineEnum::CREATE);
    }

    public function delete(User $user, LanguageLine $languageLine): bool
    {
        return $user->can(LanguageLineEnum::DELETE);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can(LanguageLineEnum::DELETE_ANY);
    }

    public function replicate(User $user, LanguageLine $languageLine): bool
    {
        return $user->can(LanguageLineEnum::REPLICATE);
    }

    public function update(User $user, LanguageLine $languageLine): bool
    {
        return $user->can(LanguageLineEnum::UPDATE);
    }

    public function view(User $user, LanguageLine $languageLine): bool
    {
        return $user->can(LanguageLineEnum::VIEW);
    }

    public function viewAny(User $user): bool
    {
        return $user->can(LanguageLineEnum::VIEW_ANY);
    }
}
