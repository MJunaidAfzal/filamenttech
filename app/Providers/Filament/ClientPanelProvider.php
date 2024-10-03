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
use App\Http\Middleware\IsClient;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use App\Filament\Client\Resources\PlatformResource;
use App\Filament\Client\Resources\ProjectResource;
use Filament\FontProviders\SpatieGoogleFontProvider;


class ClientPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('client')
            ->path('client')
            ->login()
            ->passwordReset()
            // ->registerRoute(route('register'))
            ->colors([
                'primary' => Color::Lime,
                'brown' => Color::hex('#4f6e2f'),
            ])
            // ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            //     return $builder->groups([
            //         NavigationGroup::make('Website')
            //             ->items([
            //                 ...PlatformResource::getNavigationItems(),
            //                 ...ProjectResource::getNavigationItems(),
            //             ]),
            //     ]);
            // })
            ->font('Inter', provider: SpatieGoogleFontProvider::class)
            ->discoverResources(in: app_path('Filament/Client/Resources'), for: 'App\\Filament\\Client\\Resources')
            ->discoverPages(in: app_path('Filament/Client/Pages'), for: 'App\\Filament\\Client\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Client/Widgets'), for: 'App\\Filament\\Client\\Widgets')
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
                IsClient::class,
            ])
            ->databaseNotifications();
            // ->databaseNotificationsPolling('1s');

    }
}
