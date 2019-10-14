<template>
	<div class="layout__herocontent__text">
    <div v-html="textContent"></div>
    <AppButton @AppButtonClick="quickView" :css="'layout__herocontent__text__button'" :icon="'arrow-down-thick'" :label="'Direkt zu den Produkten'">
      Direkt zu den Produkten
    </AppButton>
  </div>
</template>

<script>
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
      quickView : function() {
        alert('click: quickView');
      }
    }, 

    mounted() {
    	if(typeof lax === 'object') {
      	lax.updateElements();
    	}
    }
	}
</script>