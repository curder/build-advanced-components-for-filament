<?php

declare(strict_types=1);

namespace App\Components;

use Closure;
use ReflectionClass;
use ReflectionMethod;
use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Htmlable;

final class TextInput implements Htmlable
{
    private string|Stringable $label;

    public function __construct(protected string $name)
    {
    }

    public static function make(string $name): self
    {
        return new self($name);
    }

    public function label(string $label): self
    {

        $this->label = $label;

        return $this;
    }

    public function getLabel(): string|Stringable
    {
        return $this->label ?? str($this->name)->title();
    }

    public function extractPublicMethods(): Collection
    {
        $reflection = new ReflectionClass($this);

        return collect($reflection->getMethods(ReflectionMethod::IS_PUBLIC))
            ->mapWithKeys(
                fn (ReflectionMethod $method) => [$method->getName() => Closure::fromCallable([$this, $method->getName()])]
            );

    }

    public function render(): View
    {
        return view('components.text-input', $this->extractPublicMethods());
    }

    public function toHtml(): string
    {
        return $this->render()->render();
    }
}
