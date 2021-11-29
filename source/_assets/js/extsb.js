import splitbee from '@splitbee/web';

(function (tag) {
    if (! tag) {
        return;
    }

    let data = tag.dataset;
    if (! data.token) {
        return;
    }

    splitbee.init({
        scriptUrl: "https://tenancyforlaravel.com/bee.js",
        apiUrl: "https://tenancyforlaravel.com/_hive",
        token: data.token,
    })

    splitbee.enableCookie();
    splitbee.user.set({github: data.github});
    splitbee.track('Purchase', {
        product: data.product,
        price: data.price,
    });
})(document.getElementById('extsb'));
