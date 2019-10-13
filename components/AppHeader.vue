<template>
  <div class="app__top">
    <header data-rellax-speed="6">
      <div class="app__header__content">
        <div class="app__header__content-top content">
          <a class="app__header__content-top__logo" href="/">
            <svg role="img" alt="Stoffe Hemmers" preserveAspectRatio="xMidYMid meet" viewBox="0 0 946 156">
              <use xlink:href="~/assets/svg/sprite.svg#logo-wide-de_DE"></use>
            </svg>
          </a>
          { SUCHE }
          <ul class="secondary__navigation">
            <li>
              <a href="#" role="button" class="modal flex align-left-center">
                <svg class="account" role="presentation" alt="Anmelden" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                  <use xlink:href="~/assets/svg/sprite.svg#avatar-line"></use>
                </svg>
                Anmelden
              </a>
            </li>
            <li class="flex align-left-center">
              <a href="#" class="flex align-left-center">
                <svg class="wishlist" role="presentation" alt="Mein Wunschzettel" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                  <use xlink:href="~/assets/svg/sprite.svg#heart-line"></use>
                </svg>
                Mein Wunschzettel
              </a>
            </li>
            <li>
              <a href="/cart" class="flex align-left-center">
                <svg class="cart" role="presentation" alt="Mein Warenkorb" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                  <use xlink:href="~/assets/svg/sprite.svg#shopping-bag-line"></use>
                </svg>
                Mein Warenkorb
              </a>
            </li>
          </ul>
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
      const __header = this.$el.querySelector('header');

      var rellax = new Rellax(__header,{
        callback: function(positions) {
          
        }
      });

      /*if(__header !== null && typeof simpleParallax === 'function') {
        const __instance = new simpleParallax(__header,{
          overflow: true
        });

        console.log(__instance);

        https://github.com/alexfoxy/laxxx
      }*/

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