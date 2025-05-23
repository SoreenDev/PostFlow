@props([
    'action' => '',
    'validation'=> null
])
<form
    x-data="{
        validator: null,
        serverErrors: Object.keys(@js($errors) || {}).length > 0 ,
        hasErrors: Object.keys(window.errors || {}).length > 0  ,
        validation: @js($validation),

        init() {
            this.validator = inputValidator();
            this.listenToValidation();
        },

        validateAndSubmit() {
            Object.entries(this.validation).forEach(([field, rules]) => {
                this.validator.validate([field, rules]);
            });
            this.hasErrors = Object.keys(window.errors || {}).length > 0 || this.serverErrors;
            if (!this.hasErrors) {
                $wire['{{ $action }}']()
            }
        },

        listenToValidation() {
            document.addEventListener('validate-field', (e) => {
                const { field, rules, value } = e.detail;
                this.validator.value = value;
                this.validator.validate([field, rules]);
            });
        },
    }"
    @submit.prevent="validateAndSubmit()"
>
    {{ $slot }}
</form>
