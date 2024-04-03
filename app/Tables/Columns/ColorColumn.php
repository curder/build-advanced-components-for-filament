<?php

declare(strict_types=1);

namespace App\Tables\Columns;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Contracts\Editable;
use Filament\Tables\Columns\Concerns\CanBeValidated;
use Filament\Tables\Columns\Concerns\CanUpdateState;

final class ColorColumn extends Column implements Editable
{
    use CanBeValidated;
    use CanUpdateState;

    protected string $view = 'tables.columns.color-column';
}