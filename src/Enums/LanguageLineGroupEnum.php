<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Enums;

enum LanguageLineGroupEnum: string
{
    case Authentication = 'authentication';
    case Billing = 'billing';
    case Content = 'content';
    case Core = 'core';
    case Dashboard = 'dashboard';
    case Emails = 'emails';
    case Modules = 'modules';
    case Navigation = 'navigation';
    case Notifications = 'notifications';
    case Settings = 'settings';
    case Users = 'users';
    case Validation = 'validation';
    case Website = 'website';
}
