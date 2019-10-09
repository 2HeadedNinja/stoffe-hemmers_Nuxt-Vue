<template>
  <div class="app__top">
    <header>
      <div class="app__header__content">
        <slot></slot>
      </div>
    </header>
    <HeroContent :content="hero" @HeroContentMounted="emitEvent('AppHeaderMounted')"></HeroContent>
  </div>
</template>

<script>
  import HeroContent from '~/components/HeroContent'
  
  export default {
    name        : 'AppHeader',

    components  : {
      HeroContent
    },

    data() {
      return {
        hero : false
      }
    },

    methods     : {
      emitEvent(evt = 'AppHeaderInitialMount') {
        const __rect  = this.$el.getBoundingClientRect();
        const __event = { height : null };

        if(__rect.height && typeof __rect.height == 'number') {
          __event.height = Math.round(__rect.height);
        }

        this.$root.$emit(evt,__event);
      }
    },
    
    created() {
      this.$root.$emit('AppHeaderCreated');
    },

    mounted() {

      this.$axios.$post('/api/herocontent.ajax.php')
        .then(response => {
          if(response.error === false) {
            this.$data.hero = response.hero;

            if(this.hero === true) {
              this.emitEvent();
            } else {
              this.emitEvent('AppHeaderMounted');
            }
          } else {
            this.emitEvent('AppHeaderMounted');
          }
        })
        .catch(error => {
          this.emitEvent('AppHeaderMounted');
        });
    }
  }
</script>