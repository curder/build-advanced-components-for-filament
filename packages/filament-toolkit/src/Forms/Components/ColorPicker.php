<?php

declare(strict_types=1);

namespace Curder\FilamentToolkit\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;

final class ColorPicker extends Field
{
    protected string $view = 'filament-toolkit::forms.components.color-picker';

    protected int|Closure|null $width = null;

    public function width(int|Closure|null $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->evaluate($this->width);
    }
}
