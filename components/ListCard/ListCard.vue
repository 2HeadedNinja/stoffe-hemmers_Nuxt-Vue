<template>
  <div v-if="!productData.hasData" class="product__card-skelleton">
    <div class="product__card-skelleton__image"></div>
    <div class="product__card-skelleton__button"></div>
    <div class="product__card-skelleton__flags"></div>
    <div class="product__card-skelleton__other"></div>
  </div>
	<div v-else-if="productData.type == 'product'" class="product__card-cardwrap">
    <div class="product__card-cardwrap__top">
      <a class="product__card-cardwrap__productimage" :title="productData.name" :href="productData.href">
        <ListCardImage :alt="productData.name" :images="productData.image"></ListCardImage>
      </a>
      <AppButton @AppButtonClick="quickView" :css="'app__button-slim-small'" :icon="'eye-show-line'" :label="'Schnellansicht'">Schnellansicht</AppButton>
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
  import AppButton        from '~/components/AppButton';
  import ListCardImage    from '~/components/ListCard/ListCardImage';
  import ListCardPrice    from '~/components/ListCard/ListCardPrice';
  import ListCardFlagList from '~/components/ListCard/ListCardFlagList';

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