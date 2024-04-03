<?php

declare(strict_types=1);

namespace App\Tables\Filters;

use Closure;
use DateTimeInterface;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;

final class DateRangeFilter extends Filter
{
    protected string|DateTimeInterface|Closure|null $maxDate = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->form(fn () => [
            Fieldset::make($this->getLabel())
                ->schema([
                    DatePicker::make('from')
                        ->maxDate($this->getMaxDate())
                        ->native(false),
                    DatePicker::make('to')
                        ->maxDate($this->getMaxDate())
                        ->native(false),
                ])->columns(1),
        ])
            ->query(function (Builder $query, array $data) {
                $query->when(
                    $data['from'] ?? null,
                    fn (Builder $query) => $query->whereDate($this->getName(), '>=', $data['from'])
                )->when(
                    $data['to'] ?? null,
                    fn (Builder $query) => $query->whereDate($this->getName(), '<=', $data['to'])
                );
            });
    }

    public function maxDate(string|DateTimeInterface|Closure|null $date = null): self
    {
        $this->maxDate = $date;

        return $this;
    }

    public function getMaxDate(): string|DateTimeInterface
    {
        return $this->evaluate($this->maxDate) ?? now();
    }
}
