<template>
  <div v-if="contentData.hasHeroContent && !kill" class="layout__herocontent">
    <HeroContentTextContent v-if="contentData.promotext" :textContent="contentData.promotext"></HeroContentTextContent>
    <HeroContentBackground v-if="contentData.background" :backgroundData="contentData.background"></HeroContentBackground>
  </div>
</template>

<script>
  import HeroContentBackground from '~/components/HeroContent/HeroContentBackground'
  import HeroContentTextContent from '~/components/HeroContent/HeroContentTextContent'

  export default {
    name : 'HeroContent',

    components  : {
      HeroContentBackground,
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

    data() {
      return {
        kill               : false
      }
    },

    methods : {
      parallax() {
        if(typeof rallax === 'object') {
          const __parallax = rallax.add(this.$el,{speed : -.55});
        }
      }
    },

    created() {
      this.$root.$on('AppHeaderMounted',event => {
        if(!this.$data.kill) {
          const __height = Math.ceil(event.height * 1.2);

          this.$root.$on('LayoutScrollEvent',() => {
            const __scrollPosition = Math.round(window.scrollY);

            if(__scrollPosition > __height) {
              this.$data.kill = true;
              this.$root.$emit('KillHeroContent');
            }
          });
        }
      });
    },

    mounted() {
      if(this.contentData.hasHeroContent === false) {
        return false;
      }

      if(this.contentData.elementHeight !== null) {    
        setTimeout(() => {
          this.$el.classList.add('mounted');
        },250);  

        this.$el.setAttribute('style','--height: calc(100vh - '+this.contentData.elementHeight+'px);');
        this.parallax();

        this.$emit('HeroContentMounted',{ hasHeroContent : true});
      } else {
        this.$emit('HeroContentMounted',{ hasHeroContent : false});
      }
    }
  }
</script>