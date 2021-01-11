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

### GitHub Sponsors

If you would like to support me on a monthly basis in USD, you can use GitHub Sponsors. Click the *Sponsor* button on left: [https://github.com/stancl/](https://github.com/stancl/)

## One-time donations

### PayPal

You can donate here: [https://paypal.me/samuelstancl](https://paypal.me/samuelstancl)

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
