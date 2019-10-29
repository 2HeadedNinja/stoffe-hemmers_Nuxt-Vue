<template>
  <div v-if="desciptionHtml" class="product__listing-category__description">
    <aside>
      Aside
    </aside>
    <article v-html="desciptionHtml"></article>
  </div>
</template>

<script>
  export default {
    name : 'PagesCategoryDescription',

    props : {
      desciptionHtml : {
        type : String,

        default() {
          return null;
        }
      }
    },
  }
</script>