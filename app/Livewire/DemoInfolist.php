<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;
use Filament\Infolists\Infolist;
use Illuminate\Contracts\View\View;
use App\Infolists\Components\Section;
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
            Section::make('Colors')
                ->description('Pick your color scheme for the app.')
                ->icon('heroicon-o-star')
                ->schema([
                    ColorEntry::make('primary'),
                    ColorEntry::make('secondary'),
                    ColorEntry::make('success'),
                    ColorEntry::make('warning'),
                    ColorEntry::make('danger'),
                    ColorEntry::make('gray'),
                ])->columns(3),
        ])->state([
            'primary' => '#fbbf24',
            'secondary' => '#c084fc',
            'success' => '#84cc16',
            'warning' => '#facc15',
            'danger' => '#ef4444',
            'gray' => '#a1a1aa',
        ]);
    }

    public function render(): View
    {
        return view('livewire.demo-infolist');
    }
}
