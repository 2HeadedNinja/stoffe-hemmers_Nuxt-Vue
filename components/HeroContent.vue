<template>
  <div v-if="contentData.hasHeroContent" class="layout__herocontent">
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

    methods : {
      parallax() {
        if(typeof rallax === 'object') {
          const __parallax = rallax.add(this.$el,{speed : -.55});
        }
      }
    },

    created() {
    },

    mounted() {
      if(this.contentData.elementHeight !== null) {    
        setTimeout(() => {
          this.$el.classList.add('mounted');
        },250);  

        this.$el.setAttribute('style','--height: calc(100vh - '+this.contentData.elementHeight+'px);');
        this.parallax();

        this.$emit('HeroContentMounted');
      } else {
        this.$emit('HeroContentMounted');
      }
    }
  }
</script>