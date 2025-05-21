@props([
    'class' => 'transition duration-200 px-4 py-2 rounded-md text-white font-semibold
            bg-blue-600 hover:bg-blue-700
            disabled:bg-gray-400 disabled:cursor-not-allowed disabled:opacity-70',
    'text' => 'default text '
])
<button
    type="submit"
    class=" {{ $class }} "
    :disabled="hasErrors "
>
    {{ $text }}
</button>
