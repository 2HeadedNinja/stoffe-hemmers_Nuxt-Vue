<template>
  <div class="app__error__page content flex center-horizontal">
    <h1>{{ error.statusCode }}</h1>
    <h1 v-if="error.statusCode === 404">Page not found</h1>
    <h1 v-else>An error occurred</h1>
    
  </div>
</template>

<script>
export default {
  props: ['error'],
  layout: 'default' // you can set a custom layout for the error page
}
</script>