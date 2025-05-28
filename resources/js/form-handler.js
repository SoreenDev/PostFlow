export default function formHandler({ action, validation, serverErrors }) {
    return {
        errors: window.errors || {},
        validation,
        serverErrors,

        get hasErrors() {
            return Object.keys(this.errors || {}).length > 0 || Object.keys(this.serverErrors || {}).length > 0;
        },

        init() {
            window.errors = this.errors;
            this.validator = inputValidator();
            this.listenToValidation();
        },

        listenToValidation() {
            document.addEventListener('validate-field', (e) => {
                const { field, rules, value } = e.detail;
                this.validator.value = value;
                this.validator.validate([field, rules]);
                this.errors = { ...window.errors };
            });
        },

        validateAndSubmit() {

            Object.entries(this.validation).forEach(([field, rules]) => {
                this.validator.value = document.getElementById(field)?.value || '';
                this.validator.validate([field, rules]);
            });
            this.errors = { ...window.errors };

            if (!this.hasErrors) {
                @this.register();
            }
        }
    };
}
