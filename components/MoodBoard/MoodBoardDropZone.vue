<template>
	<div class="moodboard__drop-zone">
		DropZone
	</div>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'

	export default {
		name : 'MoodBoardDropZone',

		methods : {
			dragula : function() {
				if(typeof dragula === 'function') {
					const __listing = document.querySelector('main.product__listing');

					if(DOMElement.is(__listing) && DOMElement.is(this.$el)) {
						dragula([this.$el, __listing],{
						  copy: true
						});
					}
				}
			}
		},

		created() {
  	},

  	mounted() {
  		this.dragula();
  	}
	}
</script>