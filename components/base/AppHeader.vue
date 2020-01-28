<template>
  <div :class="getCSS()">
    <header>
      <div class="app__header__content">
        <div class="app__header__content-top content">
          <a class="app__header__content-top__logo" href="/" title="Stoffe Hemmers" label="Stoffe Hemmers">
            <svg role="img" alt="Stoffe Hemmers" preserveAspectRatio="xMidYMid meet" viewBox="0 0 946 156">
              <use xlink:href="/svg/sprite.svg#logo-wide-de_DE"></use>
            </svg>
          </a>
          <AppHeaderSearch></AppHeaderSearch>
          <AppSecondaryNavigation></AppSecondaryNavigation>
        </div>
        <AppMainNavigation :hasHeroContent="!heroContent ? false : heroContent.hasHeroContent"></AppMainNavigation>
      </div>
      <AppMegaMenue></AppMegaMenue>
    </header>
    <HeroContent v-if="heroContent && !sticky" :contentData="heroContent" @HeroContentMounted="emitEvent('AppHeaderMounted')"></HeroContent>
  </div>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'
  import Breakpoint from '~/plugins/Breakpoint.plugin.js'
  
  import HeroContent from '~/components/HeroContent'
  import AppMegaMenue from '~/components/Layouts/AppMegaMenue'
  import AppHeaderSearch from '~/components/Search/AppHeaderSearch'
  import AppMainNavigation from '~/components/Layouts/AppMainNavigation'
  import AppSecondaryNavigation from '~/components/Layouts/AppSecondaryNavigation'

  export default {
    name        : 'AppHeader',

    components  : {
      HeroContent,
      AppMegaMenue,
      AppHeaderSearch,
      AppMainNavigation,
      AppSecondaryNavigation
    },

    data() {
      return {
        path          : this.$route.fullPath,
        route         : this.$route.name,
        sticky        : false,
        animate       : false,
        threshold     : null,
        heroContent   : null,
        parallaxObj   : null
      }
    },

    methods : {
      getCSS() {
        let __css = 'app__top';

        if(this.$data.heroContent === null || this.$data.heroContent.hasHeroContent === false) {
          __css += ' no__hero__content';
        }

        if(this.$data.sticky === true) {
          __css += ' sticky';
        }

        if(this.$data.animate === true) {
          __css += ' animate';
        }

        return __css;
      },

      getHeight() {
        const __rect  = this.$el.getBoundingClientRect();

        if(__rect.height && typeof __rect.height == 'number') {
          return Math.round(__rect.height);
        }

        return null;
      },

      emitEvent(evt = 'AppHeaderInitialMount', obj = false) {
        let __event = obj;
        if(__event === false) {
          __event = { hero : this.$data.heroContent.hasHeroContent, height : this.getHeight() };
        }
        this.$root.$emit(evt,__event);
      },

      parallax() {
        const __header = this.$el.querySelector('header');
        if(typeof rallax === 'object' && DOMElement.is(__header)) {
          const __rect = __header.getBoundingClientRect();

          if(__rect && typeof __rect.height === 'number') {
            this.$data.parallaxObj = rallax.add(__header,{speed : -.45});
          }
        }
      },

      handleScrollEvent() {
        if(this.$data.threshold !== null && typeof this.$data.threshold == 'number') {
          const __scrollPosition = Math.round(window.scrollY);
          if(__scrollPosition >= this.$data.threshold && this.$data.sticky === false) {
            if(this.$data.parallaxObj !== null) {
              this.$data.parallaxObj.destroy();
            }

            this.$data.sticky    = true;
            setTimeout(() => {
              this.$data.animate = true;
            },250);
            
            this.$root.$emit('AppHeaderIsSticky');
          } else if(__scrollPosition < this.$data.threshold && this.$data.sticky === true) {
            this.$data.animate  = false;
            this.$data.sticky   = false;

            if(this.$data.parallaxObj !== null) {
              this.$data.parallaxObj.start();
            }
            
            this.$root.$emit('AppHeaderNotSticky');
          }
        }
      },

      // -> scrollListener()
      //    One Listener to Broadcast the ScrollEvent to the whole Application
      scrollListener() {
        let   __timer = null;
        const __body  = document.body;

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
      },
      // -> getHeroContent()
      //    Check if the current route has any herocontent. Emit the AppHeaderMounted
      //    event when finished
      getHeroContent() {
        console.log(this.$route);

        if(this.$data.route === undefined) {
          this.$data.route = 'index'
        }

        this.$axios.$post('/api/herocontent.ajax.php',{
          route     : this.$data.route,
          path      : this.$data.path
        })
        .then(response => {
          if(response.error === false) {
            this.$data.heroContent = response;

            if(this.$data.heroContent.hasHeroContent === true) {
              this.parallax();
              this.$data.heroContent.elementHeight = this.getHeight();
            } else {
              if(DOMElement.is(this.$el)) {
                let __rect = this.$el.getBoundingClientRect().height;

                if(__rect && typeof __rect == 'number') {
                  this.emitEvent('AppHeaderMounted',{ hero : this.$data.heroContent.hasHeroContent, height : __rect});
                } else {
                  this.emitEvent('AppHeaderMounted',{ hero : false, height : null});
                }
              } else {
                this.emitEvent('AppHeaderMounted',{ hero : false, height : null});
              }
            }
          } else {
            this.emitEvent('AppHeaderMounted',{ hero : false, height : null});
          }
        })
        .catch(error => {
          this.emitEvent('AppHeaderMounted',{ hero : false, height : null});
        });
      }
    },
    
    created() {
      this.$root.$emit('AppHeaderCreated');
    },

    mounted() {
      this.getHeroContent();
      this.scrollListener();

      this.$root.$on('LayoutReady',() => {   
        if(DOMElement.is(this.$el)) {
          let __rect = this.$el.getBoundingClientRect().height;

          if(__rect && typeof __rect == 'number') {
            this.$data.threshold = Math.ceil(__rect * 1.1);

            this.$root.$on('LayoutScrollEvent',() => {
              this.handleScrollEvent();
            });
          }
        }
      });
    }
  }
</script>