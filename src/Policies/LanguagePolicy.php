<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Misaf\VendraLanguage\Enums\LanguageEnum;
use Misaf\VendraLanguage\Models\Language;
use Misaf\VendraUser\Models\User;

final class LanguagePolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->can(LanguageEnum::CREATE);
    }

    public function delete(User $user, Language $language): bool
    {
        return $user->can(LanguageEnum::DELETE);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can(LanguageEnum::DELETE_ANY);
    }

    public function forceDelete(User $user, Language $language): bool
    {
        return $user->can(LanguageEnum::FORCE_DELETE);
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can(LanguageEnum::FORCE_DELETE_ANY);
    }

    public function reorder(User $user): bool
    {
        return $user->can(LanguageEnum::REORDER);
    }

    public function replicate(User $user, Language $language): bool
    {
        return $user->can(LanguageEnum::REPLICATE);
    }

    public function restore(User $user, Language $language): bool
    {
        return $user->can(LanguageEnum::RESTORE);
    }

    public function restoreAny(User $user): bool
    {
        return $user->can(LanguageEnum::RESTORE_ANY);
    }

    public function update(User $user, Language $language): bool
    {
        return $user->can(LanguageEnum::UPDATE);
    }

    public function view(User $user, Language $language): bool
    {
        return $user->can(LanguageEnum::VIEW);
    }

    public function viewAny(User $user): bool
    {
        return $user->can(LanguageEnum::VIEW_ANY);
    }
}
