<?php

declare(strict_types=1);

namespace Curder\FilamentToolkit;

use Spatie\LaravelPackageTools\Package;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\AlpineComponent;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class FilamentToolkitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-toolkit')
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            AlpineComponent::make('color-picker', __DIR__.'/../resources/dist/color-picker.js'),
        ], 'curder/filament-toolkit');
    }
}
