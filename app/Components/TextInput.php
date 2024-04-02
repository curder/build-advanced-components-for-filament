<?php

declare(strict_types=1);

namespace App\Components;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;
use Illuminate\Support\Traits\Macroable;
use Livewire\Component;
use ReflectionClass;
use ReflectionMethod;

final class TextInput implements Htmlable
{
    use Macroable;

    private string|Stringable|Closure $label;

    private int|Closure|null $maxLength = null;

    private Component $livewire;

    protected static array $configurations = [];

    public function __construct(protected string $name)
    {
    }

    public static function configureUsing(Closure $configure): void
    {
        self::$configurations[] = $configure;
    }

    public static function make(string $name): self
    {
        $input = new self($name);

        foreach (self::$configurations as $configure) {
            $configure($input);
        }

        return $input;
    }

    public function livewire(Component $livewire): self
    {
        $this->livewire = $livewire;

        return $this;
    }

    public function label(string|Closure $label): self
    {

        $this->label = $label;

        return $this;
    }

    public function getLabel(): string|Stringable
    {
        return $this->evaluate($this->label ?? null) ?? str($this->name)->title();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function maxLength(int|Closure|null $maxLength):self
    {

        $this->maxLength = $maxLength;

        return $this;
    }

    public function getMaxLength(): ?int
    {
        return $this->evaluate($this->maxLength);
    }

    public function evaluate($value)
    {
        if ($value instanceof Closure) {
            return app()->call($value, [
                'state' => $this->livewire->{$this->getName()},
            ]);
        }

        return $value;
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
