<?php

declare(strict_types=1);

namespace Curder\FilamentToolkit\Forms\Components;

use Filament\Forms\Components\Component;
use Curder\FilamentToolkit\Concerns\InteractsWithSection;

final class Section extends Component
{
    use InteractsWithSection;

    protected string $view = 'filament-toolkit::section';
}
