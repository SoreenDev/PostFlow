@props([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'label' => '',
    'labelClass' => null,
    'placeholder' => '',
    'disabled' => false,
    'readonly' => false,
    'baseClass' => 'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
    'defaultClass' => 'ring-slate-500',
    'errorClass' => 'ring-red-500',
    'errorMessageClass' => 'mt-3 text-red-500 text-sm',
    'errorPrefix' => '* ',
    'rules' => '',

])

@php
    $displayValue = old($name, $value);
    $classes = $errors->has($name) ? "$baseClass $errorClass" : "$baseClass $defaultClass";
    $labelClass = $labelClass ?? "block text-sm font-medium text-gray-700 mb-1"
@endphp

<div x-data="inputValidator('{{ $rules }}', '{{ $name }}')">
    @if($label)
        <label for="{{ $name }}" class="{{ $labelClass }}">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        @if($type === 'textarea')
            <textarea
                wire:model="{{ $name }}"
                id="{{ $name }}"
                class="{{ $classes }}"
                @disabled($disabled)
                @readonly($readonly)
                @blur="validate"
            >
                {{ $displayValue }}
            </textarea>
        @else
            <input
                type="{{ $type }}"
                wire:model="{{ $name }}"
                x-model="value"
                value="{{ $displayValue }}"
                placeholder="{{ $placeholder }}"
                class="{{ $classes }}"
                @disabled($disabled)
                @readonly($readonly)
                @blur="validate"
                @input="error = ''"
            >
        @endif
    </div>

    <div class="{{ $errorMessageClass }}">
        <p x-show="error" x-text="error" class="{{ $errorMessageClass }}"></p>
    @error($name)
        {{ $errorPrefix.$message }}
    @enderror
    </div>
</div>
