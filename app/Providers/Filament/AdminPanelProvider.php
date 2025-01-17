<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Middleware\IsAdmin;
use Filament\Enums\ThemeMode;
use Filament\Support\Facades\FilamentColor;
use Filament\FontProviders\SpatieGoogleFontProvider;
use Filament\Navigation\MenuItem;
use Jeffgreco13\FilamentBreezy\BreezyCore;



class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
        ->defaultThemeMode(ThemeMode::Dark)
            ->default()
            ->id('admin')
            ->path('admin')
            ->darkMode(true)
            ->plugin(
                BreezyCore::make()->myProfile(
                    shouldRegisterUserMenu: true,
                    shouldRegisterNavigation: false,
                    navigationGroup: 'Settings',
                    hasAvatars: false,
                    slug: 'my-profile'
                )
            )
            ->userMenuItems([
                'logout' => MenuItem::make()->icon('heroicon-s-power')->label('Logout')->url('/logout'),
            ])
            ->colors([
                'primary' => Color::Amber,
                'brown' => Color::hex('#8f6232'),
                'lightgreen' => Color::hex('#86de28'),
                'yee' => Color::hex('#f5dd02'),
            ])
            ->font('Inter', provider: SpatieGoogleFontProvider::class)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                IsAdmin::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('1s');
    }
}
