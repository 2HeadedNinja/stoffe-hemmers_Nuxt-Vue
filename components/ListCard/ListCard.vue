<template>
  <div v-if="!productData.hasData" class="product__card-skelleton">
    <div class="product__card-skelleton__image"></div>
    <div class="product__card-skelleton__button"></div>
    <div class="product__card-skelleton__flags"></div>
    <div class="product__card-skelleton__other"></div>
  </div>
  <div class="product__card-cardwrap" v-else-if="productData.type == 'product'">
  	<div class="product__card-cardwrap__top">
      <div class="product__card-cardwrap__top-icons">
        <AppButton @AppButtonClick="wishList" :data-id="productData.id" :css="wishlistCss" :icon="'heart-line'" :hovericon="'heart'" :label="'Auf meinen Wunschzettel'"></AppButton>
        <span v-if="productData.colors" class="product__card-cardwrap__top-icons__colors">
          <svg role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 500 500">
            <use xlink:href="/svg/sprite.svg#colorcircle"></use>
          </svg>
        </span>
      </div>
      <a class="product__card-cardwrap__productimage" :title="productData.name" :href="productData.href" @click.prevent @mousedown="mousedown" @mouseup="mouseup">
        <ListCardImage :alt="productData.name" :images="productData.image"></ListCardImage>
      </a>
      <AppButton @AppButtonClick="quickView" :css="'app__button-slim-small'" :icon="'eye-show-line'" :hovericon="'eye-love-this'" :label="'Schnellansicht'">Schnellansicht</AppButton>
    </div>
    <a class="product__card-cardwrap__details" :title="productData.name" :href="productData.href">
      <!--<ListCardFlagList :flags="productData.flags"></ListCardFlagList>//-->
      <span class="product__card-cardwrap__details__productname">{{ productData.name }}</span>
      <ListCardPrice :price="productData.price"></ListCardPrice>
    </a>
  </div>
  <div v-else-if="productData.type == 'promotion'" class="promotion__card">
    Promotion Card
  </div>
</template>

<script>
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppButton        from '~/components/AppButton'
  import ListCardImage    from '~/components/ListCard/ListCardImage'
  import ListCardPrice    from '~/components/ListCard/ListCardPrice'
  import ListCardFlagList from '~/components/ListCard/ListCardFlagList'

  export default {
    name        : 'ListCard',
    
    components  : {
      AppButton,
      ListCardImage,
      ListCardPrice,
      ListCardFlagList
    },

  	props : {
      productData : {
        type : Object,

        default() {
          return {
            hasData : false,
            url     : false
          }
        }
      }
    },

    data() {
      return {
        clicktime : null,
        interval  : null
      }
    },

    computed : {
      getKey : function() {
        return this.$vnode.key;
      },

      wishlistCss : function() {
        if(this.productData.wishlist === true) {
          return 'product__card-button__wishlist active';
        }

        return 'product__card-button__wishlist';
      }
    },

    methods : {
      quickView : function() {
        alert('click: quickView');
      },

      wishList : function() {
        if(event && DOMElement.is(event.target) && event.target.hasAttribute('data-id')) {
          const __id = event.target.getAttribute('data-id');

          if(event.target.classList.contains('active')) {
            event.target.classList.remove('active');
            this.$root.$emit('RemoveWishlistProduct',__id);
          } else {
            event.target.classList.add('active');
            this.$root.$emit('AddWishlistProduct',__id);
          }
        }
      },

      moodBoard : function() {

      },

      mousedown : function() {
        if(event.button === 0) {
          this.$data.clicktime = new Date().getTime();

          this.$data.interval = setInterval(() => {
            const __time = new Date().getTime() - this.$data.clicktime;

            if(__time > 400) {
              clearInterval(this.$data.interval);
              this.$emit('longClick');
            }
          },10);
        }
      },

      mouseup : function() {
        if(event.button === 0) {
          clearInterval(this.$data.interval);
          
          const __time = new Date().getTime() - this.$data.clicktime;
          if(__time < 400) {
            const __target = event.target;
            if(DOMElement.type(__target,'a') && __target.hasAttribute('href')) {
              window.location = __target.getAttribute('href');
            }
          }
        }
      }
    },

  	created() {
  	},

  	mounted() {
  	}
  }
</script>

<style lang="scss">
  [class*="product__card"] {
    &[class="product__card-skelleton"] {
      grid-column                           : span 1;

      [class*="skelleton__image"] {
        position                            : relative;
        z-index                             : 0;

        width                               : 100%;
        padding-top                         : 100%;

        background-color                    : $skelleton;
      }

      [class*="skelleton__button"] {
        background-color                    : $skelleton;

        width                               : 100%;
        height                              : 36px;

        margin                              : 2px 0 0 0;
      }

      [class*='skelleton__flags'] {
        margin-bottom                       : 10px;

        &:after,
        &:before {
          content                           : '';

          display                           : inline-block;
          height                            : 25px;

          background-color                  : $skelleton;
          margin                            : 12px 12px 0 0;
        }

        &:before {
          width                             : 40px;
        }

        &:after {
          width                             : 70px;
        }
      }

      [class*='skelleton__other'] {
        &:after,
        &:before {
          content                           : '';

          display                           : inline-block;
          background-color                  : $skelleton;

          height                            : 22px;
          border-radius                     : 11px;
        }

        &:before {
          width                             : 100%;
          margin-bottom                     : 5px;
        }

        &:after {
          width                             : 95px;
        }
      }

      [class*="skelleton__name"] {
        background-color                    : $skelleton;

        width                               : 100%;
        height                              : 26px;

        margin                              : 20px 0 0 0;
        border-radius                       : 13px;
      }

      [class*="skelleton__price"] {
        background-color                    : $skelleton;

        width                               : 30%;
        height                              : 25px;

        margin                              : 5px 0 0 0;
      }
    }
  }
</style>