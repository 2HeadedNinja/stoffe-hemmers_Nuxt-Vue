<template>
  <button :type="type" @click="$emit('AppButtonClick')" :class="getCss()">
    <div v-if="hovericon" class="icon">
      <svg role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
        <use :xlink:href="iconPath(hovericon)"></use>
      </svg>
      <svg role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
        <use :xlink:href="iconPath(icon)"></use>
      </svg>
    </div>
    <svg v-else-if="icon" role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
      <use :xlink:href="iconPath(icon)"></use>
    </svg>
    <slot></slot>
  </button>
</template>

<script>
  export default {
    name  : 'AppButton',
    props : {
      icon      : null,
      hovericon : null,
      type      : {
        type : String,

        default() {
          return 'button';
        } 
      },
      animate   : {
        type : Boolean,

        default() {
          return false;
        }
      },
      label     : {
        type : String,

        default() {
          return 'Stoffe Hemmers';
        }
      },
      css       : {
        type  : String,

        default() {
          return 'app__button-default';
        }
      }
    },

    methods : {
      getCss() {
        if(this.animate === false) {
          return this.css;
        } else {
          return this.css+'-animate';
        }
      },

      iconPath(name) {
        return '/svg/sprite.svg#'+name;
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