<template>
  <button @click="$emit('AppButtonClick');" :class="css">
    <svg role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
      <use xlink:href="~/assets/svg/sprite.svg#arrow-down-thick"></use>
    </svg>
    <slot></slot>
  </button>
</template>

<script>
  import svg4everybody from 'svg4everybody'

  export default {
    name  : 'AppButton',
    props : {
      icon    : null,
      label   : {
        type  : String,

        default() {
          return 'Stoffe Hemmers'
        }
      },
      css     : {
        type  : String,

        default() {
          return 'app__button'
        }
      }
    },

    computed : {
      iconPath() {
        return '~/assets/svg/sprite.svg#'+this.icon;
      }
    },

    created() {
      this.$emit('AppButtonCreated');
    },

    mounted() {
      svg4everybody();
      this.$emit('AppButtonMounted');
    }
    // -> https://markus.oberlehner.net/blog/lazy-loading-responsive-images-with-vue/
  }
</script>