<template>
  <div :class="css">
    <span v-if="price.promotional" class="product__card-cardwrap__details__productprice__savings">{{ savings }}</span>
    <span v-if="price.original" class="product__card-cardwrap__details__productprice__original">{{ original }}</span>
    <span v-if="price.promotional" class="product__card-cardwrap__details__productprice__promotional">{{ promotional }}</span>
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
            savings     : null,
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

        return __CSS+'  flex';
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
      },

      savings : function() {
        return '-' + (100 - Math.ceil((100 / this.price.original) * this.price.promotional)) + '%';
      }
    }
  }
</script>