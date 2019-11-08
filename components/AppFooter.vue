<template>
  <footer>
    <transition name="fade">
      <AppButton v-show="toTop" @AppButtonClick="moveToTop" :css="'app__button to__top'" :icon="'arrow-up-thick'" :label="'Nach oben'">Nach oben</AppButton>
    </transition>
  </footer>
</template>

<script>
  import AppButton from '~/components/AppButton'

  export default {
    name : 'AppFooter',
    
    components  : {
      AppButton
    },

    data() {
      return {
        toTop : null
      }
    },

    methods : {
      moveToTop() {
        window.scrollTo({
          top       : 0, 
          behavior  : 'smooth'
        });
      }
    },

    created() {
    },

    mounted() {
      this.$root.$on('LayoutScrollEvent',() => {
        if(window.scrollY >= Math.round(window.innerHeight * 1.2)) {
          if(this.$data.toTop === null) {
            this.$data.toTop = true;
          }
        } else {
          if(this.$data.toTop === true) {
            this.$data.toTop = null;
          }
        }
      });
    }
  }
</script>

<style lang="scss">
  .to__top {
    position                            : fixed;
    right                               : 20px;
    bottom                              : 20px;
    z-index                             : 0;

    width                               : auto;
    padding                             : 0 15px 0 15px;

    color                               : $white;
    font-size                           : 14px;
    text-shadow                         : 1px 1px 0 tint(dark,6);
    flex-direction                      : row-reverse;

    svg {
      fill                              : $white;
      height                            : 20px;
      margin                            : 0 0 0 10px;
    }

    &:after {
      content                           : '';

      position                          : absolute;
      top                               : 0;
      left                              : 0;
      right                             : 0;
      bottom                            : 0;
      z-index                           : -1;

      background-color                  : tint(dark,5);
      opacity                           : .85;
    }
  }
</style>