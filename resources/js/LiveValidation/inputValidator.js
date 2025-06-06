import { formLocale  } from './formLocale.js';

window.errors = window.errors || {};
export default function inputValidator() {
    return {
        value: '',
        validate([fieldName, rules]) {
            const ruleList = rules.split('|');

            for (let rule of ruleList) {
                const [name, param] = rule.split(':');
                const key = name + (param ? `:${param}` : '');
                const label = this.getLabel(fieldName);

                if (name === 'required' && (!this.value || this.value.trim() === '')) {
                    this.setError(formLocale.messages.required(label), fieldName);
                    return;
                }

                if (name === 'email' && !/^\S+@\S+\.\S+$/.test(this.value)) {
                    this.setError(formLocale.messages.email(label), fieldName);
                    return;
                }
                if (name === 'min' && this.value.length < Number(param)) {
                    this.setError(formLocale.messages.min(label, param), fieldName);
                    return;
                }

                if (name === 'max' && this.value.length > Number(param)) {
                    this.setError(formLocale.messages.max(label, param), fieldName);
                    return;
                }

                if (name === 'confirmation' && this.value !== document.getElementById(param)?.value ) {
                    const otherLabel = this.getLabel(param);
                    this.setError(formLocale.messages.confirmation(label, otherLabel), fieldName);
                    return;
                }
            }
            delete window.errors[fieldName];
        },

        setError(message, fieldName) {
            window.errors[fieldName] = [message];
        },

        getLabel(fieldName) {
            return formLocale.labels[fieldName] || fieldName;
        },
    };
}
