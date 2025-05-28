window.errors = window.errors || {};

export default function inputValidator() {
    return {
        value: '',
        validate([fieldName, rules]) {
            const ruleList = rules.split('|');

            for (let rule of ruleList) {
                const [name, param] = rule.split(':');
                const key = name + (param ? `:${param}` : '');

                if (name === 'required' && (!this.value || this.value.trim() === '')) {
                    this.setError(`فیلد ${this.label(fieldName)} الزامی است.`, fieldName);
                    return;
                }

                if (name === 'email' && !/^\S+@\S+\.\S+$/.test(this.value)) {
                    this.setError(`فرمت ${this.label(fieldName)} نامعتبر است.`, fieldName);
                    return;
                }

                if (name === 'min' && this.value.length < parseInt(param)) {
                    this.setError(`${this.label(fieldName)} باید حداقل ${param} کاراکتر باشد.`, fieldName);
                    return;
                }

                if (name === 'max' && this.value.length > parseInt(param)) {
                    this.setError(`${this.label(fieldName)} نباید بیشتر از ${param} کاراکتر باشد.`, fieldName);
                    return;
                }
            }
            delete window.errors[fieldName];
        },

        setError(message, fieldName) {
            window.errors[fieldName] = message;
        },

        label(field) {
            return {
                email: 'ایمیل',
                password: 'رمز عبور',
                name: 'نام',
                user_name: 'نام کاربری',
                password_confirmation: 'تکرار رمز عبور',
            }[field] || field;
        }
    };
}
