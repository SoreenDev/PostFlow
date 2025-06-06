export const formLocale  = {
    labels: {
        email: 'Email',
        password: 'Password',
        name: 'Name',
        user_name: 'Username',
        password_confirmation: 'Password Confirmation',
    },
    messages: {
        required: ( label ) => `The filed ${label} is required.`,
        email: ( label ) => `The format of ${label} is invalid.`,
        min: (label, param) => `${label} must be at least ${param} characters long.`,
        max: (label, param) => `${label} must not be longer than ${param} characters.`,
        confirmation: (label, otherLabel) => `${label} must match ${otherLabel}.`,
    }
};
