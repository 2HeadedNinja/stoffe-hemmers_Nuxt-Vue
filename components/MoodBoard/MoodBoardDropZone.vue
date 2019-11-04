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
            if(typeof interact === 'function') {
              interact('.product__card-cardwrap')
              .draggable({
                onstart(event) {
                  if(DOMElement.is(event.target)) {
                    const __body  = document.body;

                    if(!__body.classList.contains('disable__hover')) {
                      __body.classList.add('disable__hover');
                      
                      const __div   = document.createElement('div');
                            __div.classList.add('drag__clone');

                      const __clone = event.target.querySelector('.product__card-cardwrap__productimage picture').cloneNode(true);

                      __div.appendChild(__clone);

                      __body.appendChild(__div);
                    }
                  }
                },
                onmove(event) {
                  const __target = event.target;

                  var x = (parseFloat(__target.getAttribute('data-x')) || 0) + event.dx;
                  var y = (parseFloat(__target.getAttribute('data-y')) || 0) + event.dy;

                  console.log(x+' | '+y);

                  // translate the element
                  /*target.style.webkitTransform =
                    target.style.transform =
                      'translate(' + x + 'px, ' + y + 'px)'

                  // update the posiion attributes
                  target.setAttribute('data-x', x)
                  target.setAttribute('data-y', y)*/
                }
              })
            }
            /*if(typeof Draggable === 'object') {
              const __draggable = new Draggable.default(__listing,{
                'draggable' : '.product__card-cardwrap'
              })
              .on('drag:start', () => console.log('drag:start'))
              .on('drag:move',  () => console.log('drag:move'))
              .on('drag:stop',  () => console.log('drag:stop'));;
            }
            /*const __draggable = new new Draggable(__listing,{
              'draggable' : '.product__card-cardwrap'
            });*/
						/*const __dragula = dragula([this.$el,__listing],{
						  copy: true
						}).on('drag',function(item) {
              if(!item.classList.contains('product__card-cardwrap')) {
                this.cancel();
              }
            });*/
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