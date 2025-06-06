@props([
    'action',
    'validation'=> null
])
<form
    x-data="formHandler({
        action: @js($action),
        validation: @js($validation),
        wire: $wire
    })"
    @submit.prevent="validateAndSubmit()"
>
    {{ $slot }}
</form>

