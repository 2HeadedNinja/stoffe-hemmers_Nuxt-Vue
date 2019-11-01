<template>
  <div :class="getCSS()">
    <header>
      <div class="app__header__content">
        <div v-show="!sticky" class="app__header__content-top content">
          <a class="app__header__content-top__logo" href="/">
            <svg role="img" alt="Stoffe Hemmers" preserveAspectRatio="xMidYMid meet" viewBox="0 0 946 156">
              <use xlink:href="/svg/sprite.svg#logo-wide-de_DE"></use>
            </svg>
          </a>
          { SUCHE }
          <AppSecondaryNavigation></AppSecondaryNavigation>
        </div>
        <AppMainNavigation :hasHeroContent="!heroContent ? false : heroContent.hasHeroContent"></AppMainNavigation>
      </div>
      <AppMegaMenue></AppMegaMenue>
    </header>
    <HeroContent v-if="heroContent" :contentData="heroContent" @HeroContentMounted="emitEvent('AppHeaderMounted')"></HeroContent>
  </div>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'
  import Breakpoint from '~/plugins/Breakpoint.plugin.js'
  
  import HeroContent from '~/components/HeroContent'
  import AppMegaMenue from '~/components/Layouts/AppMegaMenue'
  import AppMainNavigation from '~/components/Layouts/AppMainNavigation'
  import AppSecondaryNavigation from '~/components/Layouts/AppSecondaryNavigation'

  export default {
    name        : 'AppHeader',

    components  : {
      HeroContent,
      AppMegaMenue,
      AppMainNavigation,
      AppSecondaryNavigation
    },

    data() {
      return {
        sticky        : false,
        threshold     : null,
        heroContent   : null,
        parallaxObj   : null,
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
          __event = { height : this.getHeight() };
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
            this.$data.sticky = true;
            this.$data.parallaxObj.stop();
          } else if(__scrollPosition < this.$data.threshold && this.$data.sticky === true) {
            this.$data.sticky = false;
            this.$data.parallaxObj.start();
          }
        }
      }
    },
    
    created() {
      this.$root.$emit('AppHeaderCreated');
    },

    mounted() {
      this.$root.$on('LayoutReady',() => {   
        if(DOMElement.is(this.$el)) {
          let __rect = this.$el.getBoundingClientRect().height;

          if(__rect && typeof __rect == 'number') {
            this.$data.threshold = Math.ceil(__rect * 1.2);

            this.$root.$on('LayoutScrollEvent',() => {
              this.handleScrollEvent();
            });
          }
        }
      });

      this.$axios.$post('/api/herocontent.ajax.php')
        .then(response => {
          if(response.error === false) {
            this.$data.heroContent = response;

            if(this.$data.heroContent.hasHeroContent === true) {
              this.parallax();
              this.$data.heroContent.elementHeight = this.getHeight();
            } else {
              this.emitEvent('AppHeaderMounted',{ height : null});
            }
          } else {
            this.emitEvent('AppHeaderMounted',{ height : null});
          }
        })
        .catch(error => {
          this.emitEvent('AppHeaderMounted',{ height : null});
        });
    }
  }
</script>