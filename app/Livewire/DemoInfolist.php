<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;
use Filament\Infolists\Infolist;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use App\Infolists\Components\ColorEntry;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;

final class DemoInfolist extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms, InteractsWithInfolists;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            ColorEntry::make('color')
                ->width(fn (string $state) => match ($state) {
                    '#f00' => 4,
                    '#0f0' => 5,
                    default => 6,
                }),
        ])->state([
            'color' => ['#f00', '#0f0'],
        ]);
    }

    public function render(): View
    {
        return view('livewire.demo-infolist');
    }
}
