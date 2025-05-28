@props([
    'action' => '',
    'validation'=> null
])
<form
    x-data="formHandler({
        action: @js($action),
        validation: @js($validation),
        serverErrors: @js($errors)
    })"
    @submit.prevent="validateAndSubmit()"
>
    {{ $slot }}
</form>

