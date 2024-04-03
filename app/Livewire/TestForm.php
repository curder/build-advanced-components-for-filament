<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;
use App\Components\TextInput;
use Illuminate\Contracts\View\View;

final class TestForm extends Component
{
    public ?string $email = null;

    public function render(): View
    {
        TextInput::configureUsing(function (TextInput $input) {
            $input->maxLength(2);
        });

        TextInput::macro('foo', function () {
            dump('bar');

            return $this;
        });

        $name = TextInput::make('name')
            ->foo()
            ->livewire($this);
        $email = TextInput::make('email')
            ->foo()
            ->maxLength(1)
            ->livewire($this);

        return view('livewire.test-form', [
            'nameInput' => $name,
            'emailInput' => $email,
        ]);
    }
}
