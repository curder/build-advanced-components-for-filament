<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use Filament\Tables\Table;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

final class DemoTable extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table->query(User::query())
            ->columns([
                TextColumn::make('name'),
            ]);
    }

    public function render(): View
    {
        return view('livewire.demo-table');
    }
}
