export default function inputValidator(rules, fieldName, messages = {}) {
    console.log(fieldName)
    return {
        value: '',
        error: '',
        validate() {
            this.error = '';
            const ruleList = rules.split('|');

            for (let rule of ruleList) {
                const [name, param] = rule.split(':');
                const key = name + (param ? `:${param}` : '');

                if (name === 'required' && (!this.value || this.value.trim() === '')) {
                    this.error = messages[key] || `فیلد ${this.label(fieldName)} الزامی است.`;
                    return;
                }

                if (name === 'email' && !/^\S+@\S+\.\S+$/.test(this.value)) {
                    this.error = messages[key] || `فرمت ${this.label(fieldName)} نامعتبر است.`;
                    return;
                }

                if (name === 'min' && this.value.length < parseInt(param)) {
                    this.error = messages[key] || `${this.label(fieldName)} باید حداقل ${param} کاراکتر باشد.`;
                    return;
                }

                if (name === 'max' && this.value.length > parseInt(param)) {
                    this.error = messages[key] || `${this.label(fieldName)} نباید بیشتر از ${param} کاراکتر باشد.`;
                    return;
                }
            }
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
