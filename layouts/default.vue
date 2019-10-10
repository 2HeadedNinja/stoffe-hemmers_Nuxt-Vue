<template>
  <div class="layout__default">
    <AppHeader></AppHeader>
    <div v-show="show !== null" class="layout__default-scrollcontent">
      <nuxt />
      <AppFooter></AppFooter>
    </div>
  </div>
</template>

<script>
  import AppHeader from '~/components/AppHeader'
  import AppFooter from '~/components/AppFooter'
  
  export default {
    name : 'LayoutDefault',
    components  : {
      AppHeader,
      AppFooter
    },

    data() {
      return {
        show : null
      }
    }
  }
</script>