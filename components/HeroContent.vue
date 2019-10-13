<template>
  <div v-if="contentData.hasHeroContent" class="layout__herocontent" id="#layout__herocontent" data-lax-preset="lax__preset__AppHero">
    <HeroContentTextContent v-if="contentData.promotext" :textContent="contentData.promotext"></HeroContentTextContent>
    <video class="layout__herocontent__video-background" muted="muted" playinline="playinline" preload="auto" data-lax-anchor="#layout__herocontent" data-lax-preset="lax__preset__VideoBackground"> 
      <source src="https://lib.shcdn.de/videos/videohive-8EYpYB17-interior-design.mp4" type="video/mp4"> 
    </video>
  </div>
</template>

<script>
  import HeroContentTextContent from '~/components/HeroContent/HeroContentTextContent'

  export default {
    name : 'HeroContent',

    components  : {
      HeroContentTextContent
    },

    props : {
      contentData : {
        type : Object,

        default() {
          return {
            hasHeroContent : false,
            elementHeight  : null,
            promotext      : null
          }
        }
      }
    },

    methods : {
      parallax(height = false) {
        if(height === false) {
          return false;
        }

        if(typeof lax === 'object' && typeof height === 'number') {
          lax.addPreset("lax__preset__AppHero", function() {
            return { 
              "data-lax-translate-y" : "0 0, ("+Math.ceil(height*2)+") ("+( Math.ceil(height*2)*-1)+")"
            }
          })

          lax.addElement(this.$el);
          lax.updateElements();
        }
      },

      video(obj = false) {
        if(obj === false) {
          return false;
        }

        obj.addEventListener('canplay',() => {
          setTimeout(() => {
            obj.classList.add('canplay');
            obj.setAttribute('autoplay','autoplay');
          },250);
        });
      }
    },

    created() {
    },

    mounted() {
      if(this.contentData.elementHeight !== null) {
        const __background = this.$el.querySelector('[class*="-background"]');

        if(DOMElement.is(__background)) {
          if(DOMElement.type(__background) == 'video') {
            this.video(__background);
          }
        }

        setTimeout(() => {
          this.$el.classList.add('mounted');
        },250);      

        this.parallax(this.contentData.elementHeight);
        this.$el.setAttribute('style','--height: calc(100vh - '+this.contentData.elementHeight+'px);');

        this.$emit('HeroContentMounted');
      } else {
        this.$emit('HeroContentMounted');
      }
    }
  }
</script>