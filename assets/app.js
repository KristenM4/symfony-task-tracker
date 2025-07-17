/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.flash-dismiss').forEach(function (button) {
        button.addEventListener('click', function () {
            const flashContainer = button.closest('div.flash-message');
            if (flashContainer) {
                flashContainer.classList.add('opacity-0');
                setTimeout(() => flashContainer.remove(), 300);
            }
        });
    });
});