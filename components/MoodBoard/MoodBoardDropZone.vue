<template>
	<div class="moodboard__drop-zone"></div>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'

	export default {
		name : 'MoodBoardDropZone',

		methods : {
		},

		created() {
  	},

  	mounted() {
      const __listing = document.querySelector('main.product__listing');

      if(DOMElement.is(this.$el) && DOMElement.is(__listing) && typeof dragula === 'function') {
        dragula([this.$el,__listing],{
          copy : function (el, source) {
            return el.classList.contains('product__card-cardwrap');
          },
          accepts: function (el, target, source, sibling) {
            return el.classList.contains('product__card-cardwrap');
          }
        });
      }
  	}
	}
</script>