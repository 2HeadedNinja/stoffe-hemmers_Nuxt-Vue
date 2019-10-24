<template>
  <nav v-if="navigation" role="navigation" class="app__header__content-bottom mega__menue__navigation">
    <div class="mega__menue__navigation__inner content" v-for="(data, index) in navigation" v-if="data.sub" v-bind:key="index" :data-id="data.id">
      <ul>
        <li v-for="(link, index) in data.sub" v-bind:key="index">
          <a :href="link.url">
            {{ link.label }}
          </a>
        </li>
      </ul>
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
      showSubmenue(id = false) {
        if(DOMElement.is(this.$el)) {
          this.$el.classList.add('open')
        }
      },

      killSubmenue() {
        if(DOMElement.is(this.$el)) {
          this.$el.classList.remove('open');
        }
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

      this.$root.$on('killSubmenue', () => {
        this.killSubmenue();
      });
    }
  }
</script>