export default function formHandler({ action, validation, wire }) {
    return {
        action,
        errors: window.errors || {},
        validation,
        wire,

        get hasErrors() {
            return Object.keys(this.errors || {}).length > 0;
        },

        init() {
            window.errors = this.errors;
            this.validator = inputValidator();
            this.listenToValidation();
            this.listenToSubmit();
        },

        listenToValidation() {
            document.addEventListener('validate-field', (e) => {
                const { field, rules, value } = e.detail;
                this.validator.value = value;
                this.validator.validate([field, rules]);
                this.errors = { ...window.errors };
            });
        },

        listenToSubmit() {
             document.addEventListener('has_errors', (error) => {
                 Object.entries(error.detail[0]).forEach(([key, messages]) => {
                     this.errors[key] = this.errors[key]
                         ? [...new Set([...this.errors[key], ...messages])]
                         : messages;
                 });
                 window.errors = { ...this.errors };
             });
        },

        validateAndSubmit() {
            Object.entries(this.validation).forEach(([field, rules]) => {
                this.validator.value = document.getElementById(field)?.value || '';
                this.validator.validate([field, rules]);
            });
            this.errors = { ...window.errors };

            if (! this.hasErrors) {
                this.wire[this.action]();
            }
        }
    };
}
