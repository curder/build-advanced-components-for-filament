<?php

declare(strict_types=1);

namespace App\Infolists\Components;

use App\Concerns\InteractsWithSection;
use Filament\Infolists\Components\Component;

final class Section extends Component
{
    use InteractsWithSection;

    protected string $view = 'section';
}
