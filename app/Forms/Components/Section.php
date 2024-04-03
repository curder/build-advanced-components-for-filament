<?php

declare(strict_types=1);

namespace App\Forms\Components;

use Closure;
use Filament\Forms\Components\Component;

final class Section extends Component
{
    protected string $view = 'forms.components.section';

    protected string|Closure|null $description = null;

    protected Closure|string|null $icon = null;

    public function __construct(
        protected string|Closure $heading,
    ) {
    }

    public static function make(string|Closure $heading): self
    {
        return app(self::class, ['heading' => $heading]);
    }

    public function getHeading(): string
    {
        return $this->evaluate($this->heading);
    }

    public function description(string|Closure|null $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->evaluate($this->description);
    }

    public function icon(string|Closure|null $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->evaluate($this->icon);
    }
}
