import './bootstrap';
import Alpine from 'alpinejs';
import intlTelInput from 'intl-tel-input';
import 'intl-tel-input/build/css/intlTelInput.css';
import togglePasswordVisibility from './password-visibility';
import '@fortawesome/fontawesome-free/css/all.css';

window.Alpine = Alpine;
window.togglePasswordVisibility = togglePasswordVisibility;

document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.querySelector("#phone");

if (phoneInput) {
    const iti = intlTelInput(phoneInput, {
        initialCountry: "my",
        preferredCountries: ["my", "us", "gb"],
        separateDialCode: true,
        utilsScript: "/js/utils.min.js",
    });

    phoneInput.addEventListener('blur', function () {
        const fullNumber = iti.getNumber();
    });
}

});

Alpine.start();
