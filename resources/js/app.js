import './bootstrap';
import inputValidator from './LiveValidation/inputValidator.js';
import formHandler from './LiveValidation/form-handler.js';
import {formLocale} from './LiveValidation/formLocale.js';

window.formHandler = formHandler;
window.inputValidator = inputValidator;
window.formLocale  = formLocale ;
