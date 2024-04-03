<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flex flex-wrap gap-1">
        @foreach(Arr::wrap($getState()) as $state)
            <div
                    x-data
                    x-tooltip.raw="{{ $state }}"
                    @class([
                        'rounded',
                        match($getWidth($state)) {
                            3 => 'w-3 h-3',
                            4 => 'w-4 h-4',
                            5  => 'w-5 h-5',
                            default => 'w-6 h-6',
                        },
                    ])
                    style="background-color: {{ $state }}">
            </div>
        @endforeach
    </div>
</x-dynamic-component>
