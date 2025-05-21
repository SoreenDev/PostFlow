@props([
    'action' => ''
])
<form
    x-data="{
        hasErrors:  Object.keys(window.errors || {}).length > 0 ,
        validateAndSubmit() {

            const inputs = this.$el.querySelectorAll('[x-ref=input]');
            inputs.forEach(input => {
            input.__x.$data.validate();
            });

            this.hasErrors = Object.keys(window.errors || {}).length > 0;

            if (!this.hasErrors) {
                return $wire.{{ $action }}();
            }

        }
    }"
    @submit.prevent="validateAndSubmit()"
>
    {{ $slot }}
</form>
