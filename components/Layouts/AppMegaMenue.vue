<template>
  <nav v-if="navigation" id="mega__menue__navigation" role="navigation" class="app__header__content-bottom mega__menue__navigation" @mouseover="mouseover" @mouseleave="mouseleave">
    <div class="mega__menue__navigation__container content">
      <div class="mega__menue__navigation__inner" v-for="(data, index) in navigation" v-if="data.sub" v-bind:key="index" :id="getID(index)" :data-id="data.id">
        <ul>
          <li v-for="(link, index) in data.sub" v-bind:key="index">
            <a :href="link.url">
              {{ link.label }}
            </a>
          </li>
        </ul>
        <div class="mega__menue__navigation__container mega__elements">
          Mega
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  export default {
    name  : 'AppMegaMenue',

    data() {
      return {
        navigation  : null,
        height      : null
      }
    },

    methods : {
      getID(id = false) {
        if(id === false) {
          return null;
        }

        return 'mega__menue-'+id;
      },

      showSubmenue(e = false) {
        const __active  = this.$el.querySelector('div.mega__menue__navigation__inner.active');
        const __current = this.$el.querySelector('div[data-id="'+e.id+'"]');

        if(DOMElement.is(this.$el) && DOMElement.is(__current)) {
          if(DOMElement.is(__active)) {
            __active.classList.remove('active');
          }

          __current.classList.add('active');

          this.$el.setAttribute('style','height:'+e.height+'px');
          this.$el.classList.add('open');
        }
      },

      mouseleave() {
        this.$root.$emit('MegaMenueMouseLeave');
      },

      mouseover() {
        this.$root.$emit('MegaMenueMouseOver');
      }
    },

    created() {
      this.$root.$on('onNavigationData', data => {
        this.$data.navigation = data;
      });
    },

    mounted() {
      this.$root.$on('showSubmenue', id => {
        this.showSubmenue(id);
      });
    }
  }
</script>