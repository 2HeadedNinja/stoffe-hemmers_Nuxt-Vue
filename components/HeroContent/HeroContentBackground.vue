<template>
  <div v-if="backgroundData.image" :class="getClass()">
    <picture class="layout__herocontent__image-background-picture" :data-alt="alt" :data-iesec="backgroundData.image">
      <source v-if="backgroundData.image" :srcset="backgroundData.image" />
      <noscript><img :src="backgroundData.image" :alt="alt" /></noscript>
    </picture>
  </div>
  <video v-else-if="(backgroundData.mp4 || backgroundData.ogv) && !backgroundData.image" class="layout__herocontent__video-background" muted="muted" playinline="playinline" preload="auto" loop="loop"> 
    <source v-if="backgroundData.mp4" :src="backgroundData.mp4" type="video/mp4"> 
    <source v-if="backgroundData.ogv" :src="backgroundData.ogv" type="video/ogv"> 
  </video>
</template>

<script>
  // -> https://lib.shcdn.de/videos/videohive-8EYpYB17-interior-design.mp4
  // -> https://lib.shcdn.de/videos/nuxt__cherry_blossom.mp4
  // -> https://lib.shcdn.de/videos/nuxt__sewing_teaching.mp4
  // -> https://lib.shcdn.de/videos/nuxt__strawberry-falling.mp4
  // -> https://images.shcdn.de/resized/original/wpi/nuxt__living-room-modern.jpg
  // -> https://images.shcdn.de/resized/original/wpi/nuxt__comfortable-room.jpg
  import DOMElement from '~/plugins/DOMElement.plugin.js'
  import Breakpoint from '~/plugins/Breakpoint.plugin.js'
  import lozad from 'lozad';

  export default {
    name  : 'HeroContentBackground',
    
    props : {
      alt            : {
        type : String,

        default() {
          return 'Stoffe Hemmers'
        }
      },

      valign         : {
        type : String,

        default() {
          return 'bottom';
        }
      },

      backgroundData : {
        type : Object,

        default() {
          return {
            image : null,
            mp4   : null,
            ogv   : null
          }
        }
      }
    },

    methods : {
      getClass() {
        return 'layout__herocontent__image-background '+this.valign;
      },

      video(obj = false) {
        this.$el.addEventListener('canplay',() => {
          setTimeout(() => {
            this.$el.classList.add('canplay');
            this.$el.setAttribute('autoplay','autoplay');
          },250);
        });
      }
    },

    mounted() {
      if(DOMElement.is(this.$el)) {
        if(DOMElement.type(this.$el) == 'video') {
          this.video();
        } else if(DOMElement.type(this.$el) == 'div') {
          const __background__image = this.$el.querySelector('picture');

          if(DOMElement.is(__background__image)) {
            const __observer = lozad(__background__image,{
              loaded : el => {
                setTimeout(() => {
                  el.classList.add('loaded');
                },250);
              }
            });

            __observer.observe();
          }
        }
      }
    }
  }
</script>