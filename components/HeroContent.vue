<template>
  <div v-show="content" class="layout__herocontent">
    <video class="layout__herocontent__video-background" muted="muted" playinline="playinline" preload="auto"> 
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
        this.$emit('HeroContentMounted');
      });
    }
  }
</script>