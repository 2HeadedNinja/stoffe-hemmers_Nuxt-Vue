<template>
	<div class="layout__herocontent__text">
    <div v-html="textContent"></div>
    <AppButton @AppButtonClick="scrollToProducts" :css="'layout__herocontent__text__button'" :icon="'arrow-down-thick'"></AppButton>
  </div>
</template>

<script>
  //import rallax from 'rallax.js';
  import AppButton from '~/components/AppButton';

	export default {
		name 				: 'HeroContentTextContent',
    
    components  : {
      AppButton
    },


		props : {
      textContent : {
        type : String,

        default() {
          return 'Kein Text vorhanden';
        }
      }
    },

    methods : {
      scrollToProducts : function() {
        this.$root.$emit('scrollToProducts');
      },

      parallax() {
        if(typeof rallax == 'object') {
          const __parallax    = rallax.add(this.$el, {
            speed   : -.25,
            offset  : {
              x : '-50%',
              y : '-50%',
              z : '0px'
            }
          });
        }
      }
    }, 

    mounted() {
    	this.parallax();
    }
	}
</script>