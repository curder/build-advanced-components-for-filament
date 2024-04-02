<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Components\TextInput;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class TestForm extends Component
{
    public ?string $email = null;

    public function render(): View
    {
        TextInput::configureUsing(function(TextInput $input) {
            $input->maxLength(2);
        });

        $name = TextInput::make('name')
            ->livewire($this);
        $email = TextInput::make('email')
            ->maxLength(1)
            ->livewire($this);

        return view('livewire.test-form', [
            'nameInput' => $name,
            'emailInput' => $email,
        ]);
    }
}
