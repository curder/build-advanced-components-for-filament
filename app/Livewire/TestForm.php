<?php

namespace App\Livewire;

use App\Components\TextInput;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TestForm extends Component
{
    public ?string $email = null;

    public function render(): View
    {
        $input = TextInput::make('email')
            ->label(function( $state) {
                return $state;
            })
            ->livewire($this);

        return view('livewire.test-form', compact('input'));
    }
}
