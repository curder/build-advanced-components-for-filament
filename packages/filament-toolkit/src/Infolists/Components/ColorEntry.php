<?php

declare(strict_types=1);

namespace Curder\FilamentToolkit\Infolists\Components;

use Closure;
use Filament\Infolists\Components\Entry;

final class ColorEntry extends Entry
{
    protected string $view = 'filament-toolkit::infolists.components.color-entry';

    protected int|Closure|null $width = null;

    public function width(int|Closure|null $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getWidth(string $state): ?int
    {
        return $this->evaluate($this->width, [
            'state' => $state,
        ]);
    }
}
