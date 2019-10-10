<template>
  <div class="app__top">
    <header>
      <div class="app__header__content">
        <div class="app__header__content-top">
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
            <use xlink:href="~/assets/svg/sprite.svg#eye-show-line"></use>
          </svg>
        </div>
        <nav class="app__header__content-bottom main__navigation" role="navigation">
          <ul>
            <li>
              <a href="#">Stoffe</a>
            </li>
            <li>
              <a href="#">Nähzubehör</a>
            </li>
            <li>
              <a href="#">Schnittmuster</a>
            </li>
            <li>
              <a href="#">Inspiration</a>
            </li>
            <li >
              <a href="#">Neuheiten</a>
            </li>
            <li>
              <a href="#">Sale</a>
            </li>
          </ul>
        </nav>
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