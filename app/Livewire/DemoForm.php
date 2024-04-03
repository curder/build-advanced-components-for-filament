<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Forms\Components\ColorPicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class DemoForm extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                ColorPicker::make('color1')
                    ->width(100)
                    ->default('#f00'),

                ColorPicker::make('color2')
                    ->width(100)
                    ->default('#0f0'),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {

    }

    public function render(): View
    {
        return view('livewire.demo-form');
    }
}
