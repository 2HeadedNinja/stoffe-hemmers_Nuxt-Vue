<template>
  <div v-if="flags" class="product__card-cardwrap__flags">
    <ProductCardFlag v-for="(flag,index) in flags" v-bind:key="index" :flagType="flag.type">
      {{ flag.label }}
    </ProductCardFlag>
  </div>
</template>

<script>
  import ListCardFlag from '~/components/ListCard/ListCardFlag';

  export default {
    name  : 'ListCardFlagList',
    components  : {
      ListCardFlag
    },
    props : {
      flags  : {
        type  : Array,

        default() {
          return null;
        }
      }
    }
    // -> https://markus.oberlehner.net/blog/lazy-loading-responsive-images-with-vue/
  }
</script>