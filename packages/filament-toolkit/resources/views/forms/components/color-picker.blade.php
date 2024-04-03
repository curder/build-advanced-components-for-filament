<x-dynamic-component
        :component="$getFieldWrapperView()"
        :field="$field"
>

    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
         x-init="
            let colorPicker = new iro.ColorPicker($refs.picker, {
                @if($width = $getWidth()) width: @js($width), @endif
                color: state
            });

            colorPicker.on('color:change', (color) => {
                state = color.hexString;
            });
         "
    >
        <div x-ref="picker"
             x-model="state"
             wire:ignore
        ></div>
    </div>
</x-dynamic-component>
