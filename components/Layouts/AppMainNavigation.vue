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
  <nav v-else-if="navigation" class="app__header__content-bottom main__navigation" role="navigation">
    <ul>
      <li v-for="(link, index) in navigation" v-bind:key="index" :data-id="link.id">
        <a :href="link.url">{{ link.label }}</a>
      </li>
    </ul>
  </nav>
</template>

<script>
  export default {
    name  : 'AppMainNavigation',
    data() {
      return {
        navigation : null
      }
    },

    methods         : {
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
      }
    },

    created() {
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
          width                 : 140px;
          height                : 80px;
        }
      }
    }
  }
</style>