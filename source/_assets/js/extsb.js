import splitbee from '@splitbee/web';

splitbee.init({
    scriptUrl: "https://tenancyforlaravel.com/bee.js",
    apiUrl: "https://tenancyforlaravel.com/_hive",
})

window.auth = function (username) {
    if (! username) return window.location.replace('https://github.com/tenancy-for-laravel/saas-boilerplate');

    splitbee.user.set({
        userId: username.substr(1),
    }).finally(() => {
        window.location.replace('https://github.com/tenancy-for-laravel/saas-boilerplate');
    });
}
