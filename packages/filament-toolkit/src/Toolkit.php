<?php

declare(strict_types=1);

namespace Curder\FilamentToolkit;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Curder\FilamentToolkit\Resources\UserResource;

final class Toolkit implements Plugin
{
    private bool $hasEmailVerifiedAt = false;

    public static function make(): self
    {
        return new self();
    }

    public function getId(): string
    {
        return 'curder-toolkit';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                UserResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public function emailVerifiedAt(bool $condition): self
    {
        $this->hasEmailVerifiedAt = $condition;

        return $this;
    }

    public function hasEmailVerifiedAt(): bool
    {
        return $this->hasEmailVerifiedAt;
    }
}
