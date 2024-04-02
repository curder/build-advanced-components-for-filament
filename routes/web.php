<?php

declare(strict_types=1);

use App\Components\TextInput;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $input = TextInput::make('email')
        ->label('Email address');

    return view('welcome', compact('input'));
});
