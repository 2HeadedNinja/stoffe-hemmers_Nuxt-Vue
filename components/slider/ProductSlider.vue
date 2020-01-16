<template>
  <div v-show="products" class="product__slider-default">
    <h3 class="content" v-if="!!$slots.default"><slot /></h3>
    <div>
      <ul class="flex" :style="getStyle()">
        <li v-for="(product, index) in products" v-bind:key="index">
          <ListCard :productData="product" :format="format" :details="details"></ListCard>
        </li>
      </ul>
      <AppButton @AppButtonClick="scroll('left')" v-if="buttonTop" v-show="scrollValues && showPrev" :css="'product__slider-default__button-prev'" :icon="'arrow-left-thick'" :style="'top:'+buttonTop+'px;'"></AppButton>
      <AppButton @AppButtonClick="scroll('right')" v-if="buttonTop" v-show="scrollValues && showNext" :css="'product__slider-default__button-next'" :icon="'arrow-right-thick'" :style="'top:'+buttonTop+'px;'"></AppButton>
    </div>
  </div>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppButton from '~/components/AppButton'
  import ListCard from '~/components/ListCard/ListCard'

  export default {
    name  : 'ProductSlider',

    components : {
      ListCard,
      AppButton
    },

    data() {
      return {
        buttonTop    : null,
        products     : null,
        scrollValues : null,
        showPrev     : null,
        showNext     : null,
      }
    },

    props : {
      category : {
        type : Number,

        default() {
          return null
        }
      },

      quantity : {
        type : Number,

        default() {
          return 4;
        }
      },

      format : {
        type : String,

        default() {
          return 'square';
        }
      },

      visible : {
        type : Number,

        default() {
          return 5;
        }
      },

      details : {
        type : Boolean,

        default() {
          return true;
        }
      }
    },

    methods : {
      getStyle() {
        return 'scroll-behavior: smooth; scroll-snap-type: x mandatory; --width: '+(100 / this.visible)+'%;';
      },

      getProductData(infinite = false) {
        this.$axios.$post('/api/slider.ajax.php',{
          category  : this.category,
          quantity  : this.quantity
        })
        .then(response => {
          if(response.error === false) {
            this.$data.products = response.products;

            setTimeout(() => {
              this.setButtonPosition();
            },100);
          }
        })
        .catch(error => {
          console.log(error);
        });
      },

      setScrollVariables(ul = false, li = false) {
        if(ul === false || li === false) {
          return false;
        }

        const __ulWidth      = ul.getBoundingClientRect();
        const __ulStyle      = ul.currentStyle || window.getComputedStyle(ul);

        const __paddingLeft  = parseFloat(__ulStyle.paddingLeft.split('px').join(''));
        const __paddingRight = parseFloat(__ulStyle.paddingRight.split('px').join(''));

        const __width        = __ulWidth.width - (__paddingLeft + __paddingRight);

        this.$data.scrollValues             = {};
        this.$data.scrollValues.width       = __width;
        this.$data.scrollValues.cardWidth   = li.getBoundingClientRect().width;
        this.$data.scrollValues.scrollMaxX  = Math.floor(this.$data.scrollValues.cardWidth * this.$data.products.length);
        this.$data.scrollValues.visible     = Math.round(__width / this.$data.scrollValues.cardWidth);
      },

      setButtonPosition() {
        if(DOMElement.is(this.$el)) {
          const __ul = this.$el.querySelector('ul');
          if(DOMElement.is(__ul)) {
            const __firstElement = __ul.querySelector('li:first-of-type');
            if(DOMElement.is(__firstElement)) {
              this.setScrollVariables(__ul,__firstElement);
              this.disableHover(__ul);

              const __style = __firstElement.currentStyle || window.getComputedStyle(__firstElement);
              if(__style.paddingLeft && typeof __style.paddingLeft == 'string') {
                this.$data.buttonTransform = (parseInt(__style.paddingLeft.split('px').join('')) + 1) * -1;
              }

              const __picture = __firstElement.querySelector('picture');
              if(DOMElement.is(__picture)) {
                const __rect = __picture.getBoundingClientRect();
                if(typeof __rect.height == 'number') {
                  this.$data.buttonTop = Math.ceil(__rect.height * .5);
                  
                  if(this.$data.products.length > this.$data.scrollValues.visible) {
                    this.$data.showNext = true;
                  }
                }
              }
            }
          }
        }
      },

      scroll(direction) {
        const __ul = this.$el.querySelector('ul');
        
        if(DOMElement.is(__ul) && this.$data.scrollValues !== null) {
          let __targetValue = null;

          switch(direction) {
            case 'right':
            __targetValue = __ul.scrollLeft + this.$data.scrollValues.width;
            break;

            case 'left':
            __targetValue = __ul.scrollLeft - this.$data.scrollValues.width;
            break;
          }

          if(__targetValue !== null) {
            if(__targetValue > 0) {
              this.$data.showPrev = true;
            } else if(__targetValue < this.$data.scrollValues.cardWidth) {
              this.$data.showPrev = false;
            }

            if((__targetValue + this.$data.scrollValues.width) >= this.$data.scrollValues.scrollMaxX) {
              this.$data.showNext = false;
            } else {
              this.$data.showNext = true;
            }

            __ul.scrollLeft = __targetValue;
          }
        }
      },

      disableHover(ul = false) {
        if(ul === false) {
          return false;
        }

        if(DOMElement.is(ul)) {
          let   __timer = null;
          const __body  = document.body;

          ul.addEventListener('scroll', () => {
            clearTimeout(__timer);

            if(!__body.classList.contains('disable__hover')) {
              __body.classList.add('disable__hover')
            }

            __timer = setTimeout(() => {
              __body.classList.remove('disable__hover');
            },500);
          });
        }
      }
    },

    created() {
    },

    mounted() {
      if(this.category !== null) {
        this.getProductData();
      }
    }
  }
</script>