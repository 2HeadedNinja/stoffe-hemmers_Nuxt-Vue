<template>
  <button @click="$emit('AppButtonClick');" :class="css">
    <svg v-if="icon" role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
      <use :xlink:href="iconPath(icon)"></use>
    </svg>
    <slot></slot>
  </button>
</template>

<script>
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

    methods : {
      iconPath(name) {
        return '/svg/sprite.svg#'+this.icon;
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