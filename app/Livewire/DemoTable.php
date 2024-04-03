<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Curder\FilamentToolkit\Tables\Columns\ColorColumn;
use Curder\FilamentToolkit\Tables\Filters\DateRangeFilter;

final class DemoTable extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                TextInputColumn::make('name'),
                ColorColumn::make('color'),
                TextColumn::make('email_verified_at')
                    ->formatStateUsing(
                        fn (Carbon $state) => $state->diffForHumans()
                    ),
            ])->filters([
                DateRangeFilter::make('email_verified_at')
                    ->label('Email verified at')
                    ->maxDate(),
            ]);
    }

    public function render(): View
    {
        return view('livewire.demo-table');
    }
}
