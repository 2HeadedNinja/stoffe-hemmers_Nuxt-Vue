<template>
  <button @click="$emit('AppButtonClick');" :class="css">
    <svg v-if="icon" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
      <use xlink:href="~/assets/svg/sprite.svg#eye-show-line"></use>
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
      iconPath() {
        return '~/assets/svg/sprite.svg#'+this.icon;
      }
    },

    created() {
      this.$emit('AppButtonCreated');
    },

    mounted() {
      this.$emit('AppButtonMounted');
    }
    // -> https://markus.oberlehner.net/blog/lazy-loading-responsive-images-with-vue/
  }
</script>