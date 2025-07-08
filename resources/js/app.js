import "./bootstrap";

import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
const inputCount = document.querySelector("#quantity_count");
const total = document.querySelector("#show_total");
const price = document.querySelector("#product_price");
const payments = document.querySelectorAll('.payment_check');
const checkoutBtn = document.querySelector(".checkout-btn");
const paymentForm = document.querySelector(".payment-form");
const settingBtn = document.querySelector(".setting-toogle");
const profileShow = document.querySelector(".profile-show");
const profileEdit = document.querySelector(".profile-edit");


if (settingBtn) {
    settingBtn.addEventListener('click', function () {
        profileShow.classList.toggle('hidden');
        profileEdit.classList.toggle('hidden');
    })

}

if (inputCount) {
    inputCount.addEventListener("change", function () {
        total.innerText =
            "$" +
            Number.parseFloat(inputCount.value * price.innerText).toFixed(2);
    });
}

for (let payment of payments) {
    payment.addEventListener("change", function () {
        if ((payment.id == 1)) {
            checkoutBtn.removeAttribute('disabled');
            paymentForm.classList.add("hidden");
            console.log(payment.id)
        } else if (payment.id == 2) {
            checkoutBtn.setAttribute('disabled', '');
            paymentForm.classList.remove("hidden");
        }
    });
}

// .. After imports init TinyMCE ..
window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '#review',

        /* TinyMCE configuration options */
        skin: false,
        content_css: false
    });
});