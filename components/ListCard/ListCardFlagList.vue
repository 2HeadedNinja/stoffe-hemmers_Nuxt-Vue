<template>
  <ul v-if="flags" class="product__card-cardwrap__flags flex">
    <ListCardFlag v-for="(flag,index) in flags" v-bind:key="index" :flagType="flag.type">
      {{ flag.label }}
    </ListCardFlag>
  </ul>
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