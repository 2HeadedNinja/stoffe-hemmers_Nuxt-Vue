<template>
  <div v-if="!navigation" class="app__header__content-bottom main__navigation-skelleton">
    <ul>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <nav v-else-if="navigation" :class="getMainCSS()" role="navigation">
    <ul @mouseleave="mouseleave">
      <li :class="getCSS(link)" v-for="(link, index) in navigation" v-bind:key="index" :data-id="link.id" @click="click" v-on="link.sub ? { mouseover : handleMouseover } : { mouseover : killSubmenue }">
        <a :href="link.url">
          <span>{{ link.label }}</span>
        </a>
      </li>
    </ul>
  </nav>
</template>


<script>
  //https://github.com/vuejs/vue/issues/7349
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  export default {
    name  : 'AppMainNavigation',

    props : {
      hasHeroContent : {
        type : Boolean,

        default() {
          return false;
        }
      }
    },

    data() {
      return {
        navigation : null,
        interval   : null,
        css        : null
      }
    },

    methods         : {
      getMainCSS() {
        let __class = 'app__header__content-bottom main__navigation disable__hover';

        if(!this.hasHeroContent) {
          __class += ' no__hero__content';
        }

        return __class;
      },

      getCSS(link = false) {
        if(link === false) {
          return null;
        }

        let __css = '';

        if(link.sub) {
          __css += 'has';
        } 

        if(link.css) {
          if(__css !== '') {
            __css += ' ';
          }

          __css += link.css;
        }

        if(__css === '') {
          return null;
        }

        return __css;
      },

      submenues() {
        if(!this.$data.navigation) {
          return this.$data.navigation;
        }

        const __submenues = new Array();

        for(const __entry of this.$data.navigation) {
          if(__entry.sub) {
            __submenues.push(__entry);
          }
        }

        if(__submenues.length > 0) {
          return __submenues;
        } else {
          return null;
        }
      },

      killSubmenue() {
        const __nav = document.querySelectorAll('nav[role="navigation"].open');
        if(__nav.length > 0) {
          for(let __n of __nav) {
            __n.classList.remove('open');
          }
        }

        const __li = this.$el.querySelector('ul li.open');
        if(DOMElement.is(__li)) {
          __li.classList.remove('open');
        }

        const __active = document.querySelector('nav.mega__menue__navigation div.active');
        if(DOMElement.is(__active)) {
          __active.classList.remove('active');
        }

        const __particles = document.querySelector('particles-js-canvas-el');
        if(DOMElement.is(__particles)) {
          setTimeout(() => {
            __particles.remove();
          },500);
        }
      },

      handleMouseover() {
        if(this.$data.interval !== null) {
          clearInterval(this.$data.interval);
        }

        if(!DOMElement.is(event.target) || !event.target.hasAttribute('data-id')) {
          return false;
        }
        
        const __active = this.$el.querySelector('li.open');
        if(DOMElement.is(__active)) {
          __active.classList.remove('open');
        }

        this.$el.classList.add('open');
        event.target.classList.add('open');

        if(event.target.hasAttribute('data-id')) {
          const __id        = event.target.getAttribute('data-id');
          const __container = document.querySelector('nav.mega__menue__navigation div[data-id="'+__id+'"]');

          if(DOMElement.is(__container)) {
            if(!__container.cHeight) {
              const __rect = __container.getBoundingClientRect();
              __container.cHeight = Math.ceil(__rect.height) + 10;
            }

            this.$root.$emit('showSubmenue',{id : __id, height : __container.cHeight});
          }
        }
      },

      mouseleave() {
        this.$data.interval = setInterval(() => {
          clearInterval(this.$data.interval);
          this.$root.$emit('killSubmenue');
        },50);
      },

      click() {
        if(event && DOMElement.is(event.target)) {
          const __a = event.target.querySelector('a:first-of-type');
          if(DOMElement.is(__a) && __a.hasAttribute('href')) {
            window.location = __a.getAttribute('href');
          }
        }
      }
    },

    created() {
      this.$root.$on('MegaMenueMouseLeave',() => {
        this.mouseleave();
      });

      this.$root.$on('MegaMenueMouseOver',() => {
        if(this.$data.interval !== null) {
          clearInterval(this.$data.interval);
        }
      });

      this.$root.$on('killSubmenue',() => {
        this.killSubmenue();
      });

      this.$axios.$post('/api/navigation.main.ajax.php')
        .then(response => {
          if(response.error == false) {
            this.$data.navigation = response.navigation;
          }
          this.$root.$emit('onNavigationData',this.submenues());
        })
        .catch(error => {

        });
    },

    mounted() {
      setTimeout(() => {
        if(this.$el.classList.contains('disable__hover')) {
          this.$el.classList.remove('disable__hover');
        }
      },2000);
    }
  }
</script>

<style lang="scss">
  .main__navigation-skelleton {
    > ul {
      li {
        position                : relative;
        z-index                 : 0;
        
        &:after,
        &:before {
          display               : block;
          content               : '';
        }

        &:before {
          height                : 24px;
          border-radius         : 12px;

          background-color      : $skelleton;

          position              : absolute;
          top                   : 50%;
          left                  : 20px;
          right                 : 20px;
          z-index               : 1;

          transform             : translateY(-50%);
        }

        &:after {
          width                 : 180px;
          height                : 80px;
        }
      }
    }
  }
</style>