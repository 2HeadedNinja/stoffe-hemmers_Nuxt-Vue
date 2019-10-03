<template>
  <span :class="css">
    <slot></slot> 
  </span>
</template>

<script>
  export default {
    name  : 'ProductCardFlag',
    props : {
      flagType  : {
        type    : String,

        default() {
          return null;
        }
      }
    },

    data() {
      return {
        baseCSS : 'product__card-cardwrap__flags__flag'
      }
    },

    computed : {
      css : function() {
        let __CSS = this.baseCSS;

        if(this.flagType !== null) {
          __CSS += '-'+this.flagType;
        }

        return __CSS;
      }
    }
    // -> https://markus.oberlehner.net/blog/lazy-loading-responsive-images-with-vue/
  }
</script>