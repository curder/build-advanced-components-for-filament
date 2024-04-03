<?php

declare(strict_types=1);

use App\Livewire\DemoForm;
use App\Livewire\TestForm;
use Illuminate\Support\Facades\Route;

Route::get('/', TestForm::class);
Route::get('demo-form', DemoForm::class);
