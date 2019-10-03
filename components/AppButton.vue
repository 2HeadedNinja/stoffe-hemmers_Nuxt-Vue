<template>
  <button @click="$emit('AppButtonClick');" :class="css">
    <svg v-if="icon" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
      <use :xlink:href="svg"></use>
    </svg>
    <slot></slot>
  </button>
</template>

<script>
  export default {
    name  : 'AppButton',
    props : {
      icon    : null,
      css     : {
        type  : String,

        default() {
          return 'app__button'
        }
      }
    },

    computed : {
      svg : function() {
        return './assets/svg/sprite.svg#'+this.icon;
      }
    },

    mounted() {
      /*const __observer = lozad(this.$el,{
        loaded : el => {
          el.classList.add('loaded');
        }
      });
      
      __observer.observe();*/
    }
    // -> https://markus.oberlehner.net/blog/lazy-loading-responsive-images-with-vue/
  }
</script>