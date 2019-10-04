<template>
  <header>
    <div class="content">
      
    </div>
  </header>
</template>

<script>
  export default {
    name : 'AppHeader',

    created() {
      this.$root.$emit('AppHeaderCreated');
    },

    mounted() {
      const __rect  = this.$el.getBoundingClientRect();
      const __event = { height : null };

      if(__rect.height && typeof __rect.height == 'number') {
        __event.height = __rect.height;
      }

      this.$root.$emit('AppHeaderMounted',{ height : __rect.height});
    }
  }
</script>