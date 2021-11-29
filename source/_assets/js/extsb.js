import splitbee from '@splitbee/web';

splitbee.init({
  scriptUrl: "/bee.js",
  apiUrl: "/_hive",
})

let tag = document.getElementsByClassName('extsb')[0];

splitbee.user.set({test: 'foo'})
