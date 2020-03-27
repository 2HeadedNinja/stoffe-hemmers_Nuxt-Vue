<template>
  <div style="--padding-top: 50px; --padding-bottom: 50px;"> 
    Test
  </div>
</template>
<script>
  import Position from '~/plugins/Position.plugin.js'
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppButton from '~/components/AppButton'
  import ProductSlider from '~/components/slider/ProductSlider'

  export default {
    layout     : 'default',

    components : {
      AppButton,
      ProductSlider
    },
      
    created() {
    },

    mounted() {
      console.log(this.$route);
    }
  }
</script>