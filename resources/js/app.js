import "./bootstrap";

const inputCount = document.querySelector("#quantity_count");
const total = document.querySelector("#show_total");
const price = document.querySelector("#product_price");
const payments = document.querySelectorAll('.payment_check');
const checkoutBtn = document.querySelector(".checkout-btn");
const paymentForm = document.querySelector(".payment-form");

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
        } else if (payment.id == 2) {
            checkoutBtn.setAttribute('disabled', '');
            paymentForm.classList.remove("hidden");
        }
    });
}
