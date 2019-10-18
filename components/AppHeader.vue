<template>
  <div class="app__top">
    <header>
      <div class="app__header__content">
        <div class="app__header__content-top content">
          <a class="app__header__content-top__logo" href="/">
            <svg role="img" alt="Stoffe Hemmers" preserveAspectRatio="xMidYMid meet" viewBox="0 0 946 156">
              <use xlink:href="/svg/sprite.svg#logo-wide-de_DE"></use>
            </svg>
          </a>
          { SUCHE }
          <ul class="secondary__navigation">
            <li>
              <a href="/category" role="button" class="modal flex align-left-center">
                <svg class="account" role="presentation" alt="Anmelden" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                  <use xlink:href="/svg/sprite.svg#avatar-line"></use>
                </svg>
                Anmelden
              </a>
            </li>
            <li class="flex align-left-center">
              <a href="#" class="flex align-left-center">
                <svg class="wishlist" role="presentation" alt="Mein Wunschzettel" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                  <use xlink:href="/svg/sprite.svg#heart-line"></use>
                </svg>
                Mein Wunschzettel
              </a>
            </li>
            <li>
              <a href="/cart" class="flex align-left-center">
                <svg class="cart" role="presentation" alt="Mein Warenkorb" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                  <use xlink:href="/svg/sprite.svg#shopping-bag-line"></use>
                </svg>
                Mein Warenkorb
              </a>
            </li>
          </ul>
        </div>
        <nav class="app__header__content-bottom main__navigation" role="navigation">
          <ul>
            <li>
              <a href="/category">Stoffe</a>
            </li>
            <li>
              <a href="/category">Nähzubehör</a>
            </li>
            <li>
              <a href="/category">Schnittmuster</a>
            </li>
            <li>
              <a href="/category">Inspiration</a>
            </li>
            <li >
              <a href="/category">Neuheiten</a>
            </li>
            <li>
              <a href="/category">Sale</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <HeroContent v-if="heroContent" :contentData="heroContent" @HeroContentMounted="emitEvent('AppHeaderMounted')"></HeroContent>
  </div>
</template>

<script>
  //import rallax from 'rallax.js';
  import HeroContent from '~/components/HeroContent'
  
  export default {
    name        : 'AppHeader',

    components  : {
      HeroContent
    },

    data() {
      return {
        heroContent   : null,
      }
    },

    methods : {
      getHeight() {
        const __rect  = this.$el.getBoundingClientRect();

        if(__rect.height && typeof __rect.height == 'number') {
          return Math.round(__rect.height);
        }

        return null;
      },

      emitEvent(evt = 'AppHeaderInitialMount') {
        const __event = { height : this.getHeight() };
        this.$root.$emit(evt,__event);
      },

      parallax() {
        const __header = this.$el.querySelector('header');

        if(typeof rallax === 'function' && DOMElement.is(__header)) {
          const __rect = __header.getBoundingClientRect();

          if(__rect && typeof __rect.height === 'number') {
            const __parallax = rallax(__header,{speed : -.45});
          }
        }
      }
    },
    
    created() {
      this.$root.$emit('AppHeaderCreated');
    },

    mounted() {
      //this.parallax();
      this.$axios.$post('/api/herocontent.ajax.php')
        .then(response => {
          if(response.error === false) {
            this.$data.heroContent = response;

            if(this.$data.heroContent.hasHeroContent === true) {
              this.$data.heroContent.elementHeight = this.getHeight();
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