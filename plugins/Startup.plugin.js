// -> Import and Initialize svg4everybody
import svg4everybody from 'svg4everybody';
svg4everybody()

import Vue from 'vue';
import { longClickDirective } from 'vue-long-click'

const longClickInstance = longClickDirective({delay: 400, interval: 0})
Vue.directive('longclick', longClickInstance)

/*var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();

(function(){
  var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
      s1.async   = true;
      s1.src     = 'https://embed.tawk.to/5d2f2f07bfcb827ab0cc487e/default';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin','*');
  
  s0.parentNode.insertBefore(s1,s0);
})();*/