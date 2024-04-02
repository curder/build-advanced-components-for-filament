<label for="{{ $getName() }}">{{ $getLabel() }}</label>
<input type="text" maxlength="{{ $getMaxLength() }}" x wire:model.live="{{ $getName() }}"/>