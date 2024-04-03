<?php

declare(strict_types=1);

namespace App\Forms\Components;

use App\Concerns\InteractsWithSection;
use Filament\Forms\Components\Component;

final class Section extends Component
{
    use InteractsWithSection;

    protected string $view = 'section';
}