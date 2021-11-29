import splitbee from '@splitbee/web';

splitbee.init({
  scriptUrl: "https://tenancyforlaravel.com/bee.js",
  apiUrl: "https://tenancyforlaravel.com/_hive",
})

let tag = document.getElementsByClassName('extsb')[0];

splitbee.user.set({test: 'foo'})
