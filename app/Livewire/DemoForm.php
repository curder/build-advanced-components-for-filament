<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Curder\FilamentToolkit\Forms\Components\Section;
use Curder\FilamentToolkit\Forms\Components\ColorPicker;

final class DemoForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Colors')
                    ->description('Pick your own color scheme for the app')
                    ->icon('heroicon-o-swatch')
                    ->schema([
                        ColorPicker::make('primary')
                            ->width(100)
                            ->default('#fbbf24'),

                        ColorPicker::make('secondary')
                            ->width(100)
                            ->default('#c084fc'),
                        ColorPicker::make('success')
                            ->default('#84cc16')
                            ->width(100),
                        ColorPicker::make('warning')
                            ->default('#facc15')
                            ->width(100),
                        ColorPicker::make('danger')
                            ->default('#ef4444')
                            ->width(100),
                        ColorPicker::make('gray')
                            ->default('#a1a1aa')
                            ->width(100),
                    ])
                    ->columns(3),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
    }

    public function render(): View
    {
        return view('livewire.demo-form');
    }
}
