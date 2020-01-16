<template>
  <div class="layout__default">
    <AppHeader></AppHeader>
    <transition name="fade">
      <div v-show="show" class="layout__default-scrollcontent">
        <nuxt />
        <AppFooter></AppFooter>
      </div>
    </transition>
  </div>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppHeader from '~/components/base/AppHeader'
  import AppFooter from '~/components/base/AppFooter'
  
  export default {
    name        : 'LayoutDefault',
    components  : {
      AppHeader,
      AppFooter
    },

    data() {
      return {
        show : null
      }
    },

    methods     : {
      positionScrollContent(event) {
        const __scrollcontent = this.$el.querySelector('.layout__default-scrollcontent');

        if(event.height !== null && event.hero == true) {
          this.$data.height = event.height;

          if(DOMElement.is(__scrollcontent)) {
            let __style = '--margin-top: '+this.$data.height+'px;';

            if(__scrollcontent.hasAttribute('style')) {
              __style += ' '+__scrollcontent.getAttribute('style');
            }

            __scrollcontent.setAttribute('style',__style);
          }
          
          this.$data.show = true;

          setTimeout(() => {
            this.$root.$emit('LayoutReady');
          },50);
        } else {
          if(event.height == null) {
            this.$data.show = true;
            this.$root.$emit('LayoutReady');
          } else {
            if(DOMElement.is(__scrollcontent)) {
              let __style = '--padding-top: '+event.height+'px;';

              if(__scrollcontent.hasAttribute('style')) {
                __style += ' '+__scrollcontent.getAttribute('style');
              }

              __scrollcontent.setAttribute('style',__style);
            }
          
            this.$data.show = true;

            setTimeout(() => {
              this.$root.$emit('LayoutReady');
            },50);
          }
        }
      }
    },

    created() {
      this.$root.$on('AppHeaderMounted',event => {
        this.positionScrollContent(event);
        this.$root.$off('AppHeaderMounted');
      });

      this.$root.$emit('LayoutDefaultCreated');
    },

    mounted() {
      this.$root.$emit('LayoutDefaultMounted');
    }
  }
</script>

<style lang="scss">
  .layout__default {
    position                          : relative;
    z-index                           : 0;
  }

  .layout__default-scrollcontent {
    position                          : relative;
    z-index                           : 1;

    background-color                  : $white;
    
    .content {
      > main {
        
      }
    }
  }
</style>