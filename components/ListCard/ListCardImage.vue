<template>
  <picture class="product__card-cardwrap__productimage-picture" :data-alt="alt" :data-iesec="images.default">
    <source v-if="images.default" :srcset="images.default" />
    <noscript><img :src="images.default" :alt="alt" /></noscript>
  </picture>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'
  // -> https://markus.oberlehner.net/blog/lazy-loading-responsive-images-with-vue/
  import lozad from 'lozad';

  export default {
    name  : 'ListCardImage',
    props : {
      alt     : null,

      images  : {
        type  : Object,

        default() {
          return {
            default : null,
            medium  : null,
            small   : null
          }
        }
      }
    },

    mounted() {
      const __observer = lozad(this.$el,{
        loaded : el => {
          setTimeout(() => {
            el.classList.add('loaded');

            const __images = el.querySelectorAll('img');
            if(DOMElement.is(__images)) {
              for(const __image of __images) {
                __image.addEventListener('mousedown',function() {
                  console.log('drag');
                });
              }
            }

            this.$emit('ProductImageLoaded');
          },250);
        }
      });

      __observer.observe();
    }
  }
</script>