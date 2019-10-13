<template>
  <div v-show="content" class="layout__herocontent" data-rellax-speed="14">
    <div class="layout__herocontent__text">
      <div>
        <h3>Design für deine Heimtextilien</h3>
        <p>
          <strong>Dekoration</strong> ist pure Leidenschaft und verlangt ein Gespür für die schönen Dinge im Leben. <strong>Individuelle Akzente</strong> im Wohnraum setzen, <strong>kreative Farbspiele</strong> in den Alltag integrieren und dabei gekonnt den <strong>eigenen Stil</strong> unterstreichen:
        </p>
        <p>
          <em>Das kannst Du alles mit Hilfe unserer Dekostoffe realisieren.</em>
        </p>
      </div>
    </div>
    <video class="layout__herocontent__video-background" muted="muted" playinline="playinline" preload="auto" data-rellax-speed="-5"> 
      <source src="https://lib.shcdn.de/videos/videohive-8EYpYB17-interior-design.mp4" type="video/mp4"> 
    </video>
  </div>
</template>

<script>
  export default {
    name : 'HeroContent',

    props : {
      content : {
        type : Boolean,

        default() {
          return false;
        }
      }
    },

    methods     : {
    },

    created() {

    },

    mounted() {
      setTimeout(() => {
        this.$el.classList.add('mounted');
      },250);

      const __text  = this.$el.querySelector('layout__herocontent__text');
      const __video = this.$el.querySelector('video');

      if(__video !== null) {
        __video.addEventListener('canplay',() => {
          setTimeout(() => {
            __video.classList.add('canplay');
            __video.setAttribute('autoplay','autoplay');
          },250);
        });
      }

      this.$root.$on('AppHeaderInitialMount',event => {
        this.$el.setAttribute('style','--height: calc(100vh - '+event.height+'px);');

        const __rellax__container = new Rellax(this.$el);
        const __rellax__video     = new Rellax(__video);

        this.$emit('HeroContentMounted');
      });
    }
  }
</script>