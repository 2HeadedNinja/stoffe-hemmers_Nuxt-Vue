<template>
  <div class="layout__default">
    <AppHeader>
      <nuxt-link to="/category">Kategorie</nuxt-link>
    </AppHeader>
    <div v-show="show !== null" class="layout__default-scrollcontent">
      <nuxt />
      <AppFooter></AppFooter>
    </div>
  </div>
</template>

<script>
  export default {
    name : 'LayoutDefault',

    data() {
      return {
        show : null
      }
    }
  }
</script>