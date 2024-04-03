<?php

declare(strict_types=1);

namespace Curder\FilamentToolkit;

use Filament\Support\Assets\Js;
use Spatie\LaravelPackageTools\Package;
use Filament\Support\Facades\FilamentAsset;
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
            Js::make('iro', __DIR__.'/../resources/dist/filament-toolkit.js'),
        ], 'curder/filament-toolkit');
    }
}
