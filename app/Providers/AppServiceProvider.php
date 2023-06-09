<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Directories')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Travel')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('A Party')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('B Party')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('C Party')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Hotels')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('System')
                    ->collapsed(),

            ]);
        });
    }
}
