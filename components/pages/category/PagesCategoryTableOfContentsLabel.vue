<template>
  <AppButton :css="'product__listing-category__tableofcontents__button'" @AppButtonClick="scrollToEntry">
    <span><slot /></span>
  </AppButton>
</template>

<script>
  import Position from '~/plugins/Position.plugin.js'
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppButton from '~/components/AppButton'

  export default {
    name : 'PagesCategoryTableOfContentsLabel',

    components : {
      AppButton
    },

    props : ['DOMobj'],

    methods : {
      scrollToEntry() {
        if(DOMElement.is(this.DOMobj)) {
          const __y = Position.get(this.DOMobj,{
            offset : -15
          });

          this.$emit('TableOfContentsLabelClick',__y);
        }
      }
    },

    mounted() {

    }
  }
</script>

<style lang="scss">
</style>