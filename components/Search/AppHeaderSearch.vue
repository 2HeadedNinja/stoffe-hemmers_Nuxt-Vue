<template>
  <form name="app__header__search" @submit.prevent="submit">
    <fieldset class="app__header__search">
      <input type="text" placeholder="Deinen Stoff finden ..." name="query" />
      <AppButton :type="'submit'" :css="'app__header__search-search__button'" :icon="'search-line'"></AppButton>
    </fieldset>
  </form>
</template>

<script>
  import Empty from '~/plugins/Empty.plugin.js'
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppButton from '~/components/AppButton'

  export default {
    name        : 'AppHeaderSearch',

    components  : {
      AppButton
    },

    methods : {
      submit() {
        const __query__input = this.$el.querySelector('input[name="query"]');

        if(DOMElement.is(__query__input)) {
          if(Empty.is(__query__input.value)) {
            __query__input.focus();
          } else {

          }
        }

        return false;
      }
    }
  }
</script>

<style lang="scss">
  
</style>