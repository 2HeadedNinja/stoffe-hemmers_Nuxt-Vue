<template>
  <div v-if="products" class="product__slider-default">
    <h3 class="content"><slot /></h3>
    <div>
      <ul class="flex" style="scroll-padding-left: 352px; scroll-behavior: smooth; scroll-snap-type: x mandatory;">
        <li v-for="(product, index) in products" v-bind:key="index">
          <ListCard :productData="product" :format="format"></ListCard>
        </li>
      </ul>
      <AppButton @AppButtonClick="scroll('left')" v-if="buttonTop" :css="'product__slider-default__button-prev'" :icon="'arrow-left-thick'" :style="'top:'+buttonTop+'px;'"></AppButton>
      <AppButton @AppButtonClick="scroll('right')" v-if="buttonTop" :css="'product__slider-default__button-next'" :icon="'arrow-right-thick'" :style="'top:'+buttonTop+'px;'"></AppButton>
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
        buttonTop       : null,
        products        : null,
        scrollValue     : null
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
      }
    },

    methods : {
      getProductData(infinite = false) {
        this.$axios.$post('/api/slider.ajax.php',{
          category  : this.category,
          quantity  : this.infinite
        })
        .then(response => {
          if(response.error === false) {
            this.$data.products = response.products;
          }
        })
        .catch(error => {
          console.log(error);
        });
      },

      setButtonPosition() {
        if(DOMElement.is(this.$el)) {
          const __firstElement = this.$el.querySelector('ul li:first-of-type');

          if(DOMElement.is(__firstElement)) {
            const __style = __firstElement.currentStyle || window.getComputedStyle(__firstElement);
            if(__style.paddingLeft && typeof __style.paddingLeft == 'string') {
              this.$data.buttonTransform = (parseInt(__style.paddingLeft.split('px').join('')) + 1) * -1;
            }

            const __picture = __firstElement.querySelector('picture');
            if(DOMElement.is(__picture)) {
              const __rect = __picture.getBoundingClientRect();
              
              if(typeof __rect.height == 'number') {
                this.$data.buttonTop = Math.ceil(__rect.height * .5);
              }
            }
          }
        }
      },

      scroll(direction) {
        const __ul = this.$el.querySelector('ul');
        
        if(DOMElement.is(__ul)) {
          switch(direction) {
            case 'right':
            __ul.scrollLeft = __ul.scrollLeft + 1640;
            break;

            case 'left':
            __ul.scrollLeft = __ul.scrollLeft - 1640;
            break;
          }
        }
      }
    },

    created() {
      this.$root.$on('LayoutReady',() => {
        if(this.category !== null) {
          this.getProductData();
        }
      });
    },

    mounted() {
    },

    updated() {
      this.setButtonPosition();
    }
  }
</script>

<!--
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_polyester-krepp-indian-leopard-dunkelgruen_12424-028_7.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_baumwollstoff-cretonne-wilde-pferde-altrosa_6467-004_7.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_viskosestoff-high-heels-koralle_132.331-3006_6.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_modal-jersey-cherry-blossom-marineblau_6773-004_10.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_frottee-jersey-trigon-helloliv_991.071-0801_6.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_jacquard-jersey-ajour-bluemchen-ros_991.072-3001_8.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_viskosestoff-retro-roller-hellblau_132.335-3008_6.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_organic-baumwolljersey-erntezeit-taupe_991.083-3002_7.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_cordjersey-schmal-curry_12501-034_5.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_viskose-twill-bluetenwerk-dunkelpetrol_703.472-3007_6.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_baumwoll-musselin-double-gauze-federtraum_11253-051_6.jpg
  https://images.shcdn.de/resized/original/wpi/nuxt_fashion_teddy-krimmer-bordeaux_12307-019_7.jpg
//-->