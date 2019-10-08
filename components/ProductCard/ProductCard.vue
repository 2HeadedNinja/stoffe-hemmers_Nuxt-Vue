<template>
  <div v-if="!productData.hasData" class="product__card-skelleton">
    <div class="product__card-skelleton__image"></div>
    <div class="product__card-skelleton__button"></div>
    <div class="product__card-skelleton__flags"></div>
    <div class="product__card-skelleton__other"></div>
  </div>
	<div v-else-if="productData.hasData" class="product__card-cardwrap">
    <div class="product__card-cardwrap__top">
      <a class="product__card-cardwrap__productimage" :title="productData.name" :href="productData.href">
        <ProductCardImage :alt="productData.name" :images="productData.image"></ProductCardImage>
      </a>
      <AppButton @AppButtonClick="quickView" :css="'app__button-slim-small'" :icon="'30c-schonwsche'">Schnellansicht  | {{ getKey }}</AppButton>
    </div>
    <a class="product__card-cardwrap__details" :title="productData.name" :href="productData.href">
      <ProductCardFlagList :flags="productData.flags"></ProductCardFlagList>
      <span class="product__card-cardwrap__details__productname">{{ productData.name }}</span>
      <ProductCardPrice :price="productData.price"></ProductCardPrice>
    </a>
  </div>
</template>

<script>
  import AppButton           from '~/components/AppButton';
  import ProductCardImage    from '~/components/ProductCard/ProductCardImage';
  import ProductCardPrice    from '~/components/ProductCard/ProductCardPrice';
  import ProductCardFlagList from '~/components/ProductCard/ProductCardFlagList';

  export default {
    name        : 'ProductCard',
    
    components  : {
      AppButton,
      ProductCardImage,
      ProductCardPrice,
      ProductCardFlagList
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

      }
    },

    computed : {
      getKey : function() {
        return this.$vnode.key;
      }
    },

    methods : {
      quickView : function() {
        alert('click: quickView');
      }
    },

  	created() {
  	},

  	mounted() {
  	}
  }
</script>