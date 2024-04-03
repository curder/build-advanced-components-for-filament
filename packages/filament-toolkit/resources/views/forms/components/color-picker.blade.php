@php
    use Filament\Support\Facades\FilamentAsset
@endphp
<x-dynamic-component
        :component="$getFieldWrapperView()"
        :field="$field"
>
    <div
            ax-load
            ax-load-src="{{ FilamentAsset::getAlpineComponentSrc('color-picker', 'curder/filament-toolkit') }}"
            x-ignore
            x-data="colorPicker({ state: $wire.$entangle('{{ $getStatePath() }}'), width: @js($getWidth()) })"
    >
        <div x-ref="picker"
             wire:ignore
        ></div>
    </div>
</x-dynamic-component>
