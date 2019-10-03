<template>
  <div class="layout__sidebar">
    <AppHeader>
      AppHeader
    </AppHeader>
    <transition name="fade">
      <div v-show="show" class="layout__sidebar-scrollcontent">
        <div class="grid content" style="--padding-top: 40px; --padding-bottom: 40px;">
          <aside>
            Sidebar
          </aside>
          <nuxt />
        </div>
        <AppFooter></AppFooter>
      </div>
    </transition>
  </div>
</template>

<script>
  import AppHeader from '~/components/AppHeader'
  import AppFooter from '~/components/AppFooter'

  export default {
    name        : 'LayoutSidebar',
    components  : {
      AppHeader,
      AppFooter
    },

    methods     : {
      positionScrollContent() {
        this.$root.$on('AppHeaderMounted',event => {
          if(event.height !== null) {
            const __scrollcontent = this.$el.querySelector('.layout__sidebar-scrollcontent');

            if(__scrollcontent !== null) {
              let __style = '--margin-top: '+event.height+'px;';

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
    }
  }
</script>