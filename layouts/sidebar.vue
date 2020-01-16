<template>
  <div class="layout__sidebar">
    <AppHeader></AppHeader>
    <transition name="fade">
      <div v-show="show" class="layout__sidebar-scrollcontent">
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
    name        : 'LayoutSidebar',
    components  : {
      AppHeader,
      AppFooter
    },

    data() {
      return {
        height  : null,
        show    : null
      }
    },

    methods     : {
      positionScrollContent(event) {
        const __scrollcontent = this.$el.querySelector('.layout__sidebar-scrollcontent');

        console.log(event);
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

    data() {
      return {
        show : null
      }
    },

    created() {
      this.$root.$on('AppHeaderMounted',event => {
        this.positionScrollContent(event);
        this.$root.$off('AppHeaderMounted');
      });
      this.$root.$emit('LayoutSidebarCreated');
    },

    mounted() {
      this.$root.$emit('LayoutSidebarMounted');
    }
  }
</script>

<style lang="scss">
  .layout__sidebar {
    position                          : relative;
    z-index                           : 0;
  }

  .layout__sidebar-scrollcontent {
    position                          : relative;
    z-index                           : 1;

    background-color                  : $white;
    
    > .content.grid {
      grid-template                   : auto / repeat(25,1fr);
      grid-gap                        : 40px;

      > aside {
        grid-column                   : span 6;

        position                      : relative;
        z-index                       : 0;
      }

      > main {
        grid-column                   : span 18;
      }
    }
  }
</style>