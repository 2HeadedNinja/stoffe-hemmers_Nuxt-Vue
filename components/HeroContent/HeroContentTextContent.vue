<template>
	<div class="layout__herocontent__text">
    <div v-html="textContent"></div>
  </div>
</template>

<script>
	export default {
		name 				: 'HeroContentTextContent',

		props : {
      textContent : {
        type : String,

        default() {
          return 'Kein Text vorhanden';
        }
      }
    },

    mounted() {
    	if(typeof lax === 'object') {
      	lax.updateElements();
    	}
    }
	}
</script>