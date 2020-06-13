---
title: Donate
description: Support this package's development.
extends: _layouts.master
section: content
centered: true
markdown: true
---

# Donate

If this package is helping you make money, please consider donating.

The package has been actively developed since January 2019. I have spent most of August 2019 rewriting the package to add many new features for v2. And the entire May 2020 working on v3 to make the package much more flexible, support single-database tenancy, user impersonation, resource syncing between databases, database users per tenant, event-driven architecture and many more features.

Any donations will be greatly appreciated and help ensure that the package is developed and maintained in the future.

## Monthly donations

### Patreon - EUR

If you would like to support me on a monthly basis in EUR, you can use Patreon: [https://patreon.com/samuelstancl](https://patreon.com/samuelstancl)

### GitHub Sponsors - USD

If you would like to support me on a monthly basis in USD, you can use GitHub Sponsors. Click the *Sponsor* button on left: [https://github.com/stancl/](https://github.com/stancl/)

## One-time donations

### PayPal

You can donate here: [https://paypal.me/samuelstancl](https://paypal.me/samuelstancl)

### Credit card

If you'd like to donate using credit/debit card, select the amount below and click *Donate*. You will be redirected to Stripe.

<select id="stripe-onetime-price" class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
    <option value="price_1GrLEBGlrejN28Vyt5SvEaaF">$5</option>
    <option value="price_1GrLEDGlrejN28Vy91VVKWX1">$10</option>
    <option value="price_1GrLEBGlrejN28VyfLLvLERX">$15</option>
    <option value="price_1GrLECGlrejN28Vy50PmJYK0">$20</option>
    <option value="price_1GrLEBGlrejN28VyRmRs614N">$25</option>
    <option value="price_1GrLECGlrejN28VyosKALxvW" selected>$30</option>
    <option value="price_1GrLEBGlrejN28Vy0sOTXc1e">$50</option>
    <option value="price_1GrLECGlrejN28VySBEVgvXJ">$80</option>
    <option value="price_1GrLECGlrejN28VyJgflOx3c">$100</option>
    <option value="price_1GrLECGlrejN28VyyxMCGf6H">$150</option>
    <option value="price_1GrLccGlrejN28VyPhP3kgTA">$200</option>
    <option value="price_1GrLccGlrejN28VyGwq0PcmT">$300</option>
    <option value="price_1GrLcdGlrejN28VyQyOsSBOK">$350</option>
    <option value="price_1GrLccGlrejN28Vyo1xrk8QM">$400</option>
    <option value="price_1GrLceGlrejN28VyW9sQeqWI">$500</option>
    <option value="price_1GrLcdGlrejN28Vy4Y3O4l6K">$600</option>
    <option value="price_1GrLcdGlrejN28Vyin6U7qGp">$800</option>
    <option value="price_1GrLcdGlrejN28VyCFIzWcUy">$1000</option>
</select>

<button id="stripe-onetime" class="hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md">
    Donate
</button>

### Bank transfer

If you'd like to donate money from your bank account in your local currency, you can can do that too.

I use [TransferWise](https://transferwise.com/invite/u/samuels1719) (affiliate link 🙂), so I can accept bank transfers in almost any currency.

Contact me on [samuel@tenancyforlaravel.com](mailto:samuel@tenancyforlaravel.com?subject=Donation) and I'll give you bank details for your local currency.

## Legal

If you're a business making a donation, you may want an invoice.

Contact me on [samuel@tenancyforlaravel.com](mailto:samuel@tenancyforlaravel.com?subject=Donation%20with%20invoice), let me know what you need to have on the invoice and I will make it happen.

### Thank you!

Again, any donations are greatly appreciated. Thanks to everyone who has donated, you're helping keep this package maintained.

<script src="https://js.stripe.com/v3/"></script>
<script>
var stripe = Stripe('pk_live_K2y8FBHb65qJKcztSWoFkWy400BlZU0H7h');

document.getElementById('stripe-onetime').addEventListener('click', function () {
    selectedPrice = document.getElementById('stripe-onetime-price').value;

    stripe.redirectToCheckout({
        lineItems: [
            {price: selectedPrice, quantity: 1}
        ],
        mode: 'payment',
        submitType: 'donate',
        successUrl: 'https://tenancyforlaravel.com/thank-you/',
        cancelUrl: 'https://tenancyforlaravel.com/donate/',
    }).then(function (result) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, display the localized error message to your customer
        // using `result.error.message`.
    });
});
</script>
