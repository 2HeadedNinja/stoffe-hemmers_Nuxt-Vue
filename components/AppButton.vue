<template>
  <button :type="type" :role="role" :href="href" @click="clickHandler()" :class="getCss()">
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
      href      : null,
      type      : {
        type : String,

        default() {
          return 'button';
        } 
      },
      role      : {
        type  : String,

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
      },
      target    : {
        type  : String,
      
        default() {
          return '_self';
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
      },

      clickHandler() {
        if(this.role === 'link' && this.href !== null) {
          window.open(this.href,this.target);
        } else {
          this.$emit('AppButtonClick')
        }
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