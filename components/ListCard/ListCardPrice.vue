<template>
  <div :class="css">
    <span v-if="price.promotional" class="product__card-cardwrap__details__productprice__promotional">{{ promotional }}</span>
    <span v-if="price.original" class="product__card-cardwrap__details__productprice__original">{{ original }}</span>
  </div>
</template>

<script>
  export default {
    name  : 'ListCardPrice',
    props : {
      price   : {
        type  : Object,

        default() {
          return {
            original    : null,
            promotional : null,
            currency    : null,
            unit        : null
          }
        }
      }
    },

    data() {
      return {
        baseCSS : 'product__card-cardwrap__details__productprice'
      }
    },

    computed : {
      css : function() {
        let __CSS = this.baseCSS;
        
        if(this.price.promotional !== null) {
          __CSS += '-promotional';
        }

        return __CSS;
      },

      original : function() {
        if(this.price.promotional !== null) {
          return (this.price.original+' '+this.price.currency).split('.').join(',');
        } else {
          return (this.price.original+' '+this.price.currency+' / '+this.price.unit).split('.').join(',');
        }
      },

      promotional : function() {
        return (this.price.promotional+' '+this.price.currency+' / '+this.price.unit).split('.').join(',');
      }
    }
  }
</script>