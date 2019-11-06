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
  // https://simpleparallax.com/#examples
  // import simpleParallax from 'simple-parallax-js';
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppButton from '~/components/AppButton'
  import AppHeader from '~/components/AppHeader'
  import AppFooter from '~/components/AppFooter'

  import MoodBoardDropZone from '~/components/MoodBoard/MoodBoardDropZone'

  export default {
    name        : 'LayoutSidebar',
    components  : {
      AppHeader,
      AppFooter,
      AppButton,
      MoodBoardDropZone
    },

    data() {
      return {
        height  : null
      }
    },

    methods     : {
      positionScrollContent() {
        this.$root.$on('AppHeaderMounted',event => {
          if(event.height !== null) {
            this.$data.height = event.height;

            const __scrollcontent = this.$el.querySelector('.layout__sidebar-scrollcontent');

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
            this.$data.show = true;
            this.$root.$emit('LayoutReady');
          }
        });

        this.$root.$on('KillHeroContent',() => {
          const __scrollcontent = this.$el.querySelector('.layout__sidebar-scrollcontent');

          if(DOMElement.is(__scrollcontent) && __scrollcontent.hasAttribute('style') && this.$data.height) {
            __scrollcontent.removeAttribute('style');

            window.scrollTo({
              top : Math.round(window.scrollY - (this.$data.height-150))
            });
          }
        });
      }
    },

    data() {
      return {
        show : null
      }
    },

    created() {
      this.positionScrollContent();
    },

    mounted() {
      const __body  = document.body;
      let __timer   = null;

      window.addEventListener('scroll', () => {
        clearTimeout(__timer);
        
        if(!__body.classList.contains('disable__hover')) {
          __body.classList.add('disable__hover')
        }

        __timer = setTimeout(() => {
          __body.classList.remove('disable__hover')
        },500);

        this.$root.$emit('LayoutScrollEvent');
      });
    }
  }
</script>

<style lang="scss">
  .layout__sidebar {
    position                            : relative;
    z-index                             : 0;

    .layout__sidebar-scrollcontent {
      position                          : relative;
      z-index                           : 1;

      background-color                  : $white;
      
      .content {
        display                         : grid;

        grid-template                   : auto / repeat(25,1fr);
        grid-gap                        : 40px;

        >aside {
          grid-column                   : span 6;

          position                      : relative;
          z-index                       : 0;
        }

        > main {
          grid-column                   : span 18;
        }

        .grid__column__line {
          position                      : relative;
          z-index                       : 0;

          grid-column                   : span 1;

          &:before {
            content                     : '';

            position                    : absolute;
            top                         : 2px;
            left                        : 50%;
            bottom                      : 2px;
            z-index                     : 0;

            width                       : 0px;

            border-right                : 1px dotted $border-light;
          }
        }
      }
    }
  }
</style>