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
      <AppButton @AppButtonClick="quickView" :css="'app__button-slim-small'" :icon="'30c-schonwsche'">Schnellansicht</AppButton>
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

<style lang="scss">
  @media all {
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

      &[class="product__card-cardwrap"] {
        grid-column                           : span 1;

        display                               : flex;
        flex-wrap                             : wrap;

        min-width                             : 0;
        opacity                               : 1;

        [class*="cardwrap__details"],
        [class="product__card-cardwrap__top"] {
          flex                                : 0 0 100%;
        }

        [class*="cardwrap__details"] {
          min-width                           : 0;

          margin-top                          : auto;
          text-decoration                     : none;

          [class*="__productname"] {
            @include animate(color,.25s);

            display                           : block;
            width                             : 100%;

            margin-top                        : 13px;
            margin-bottom                     : 7px;

            white-space                       : nowrap;
            overflow                          : hidden;
            text-overflow                     : ellipsis;

            font-size                         : 16px;
            line-height                       : 22px;
            color                             : tint(dark,2);

            &:hover {
              color                           : tint(brand);
            }
          }

          [class*="__productprice"] {
            font-size                         : 18px;
            font-weight                       : 500;

            [class*="__original"] {
              color                           : tint(dark,3);
            }

            [class*="__promotional"] {
              color                           : $sale;
            }

            &[class*="-promotional"] {
              [class*="__promotional"] {
                margin-right                  : 8px;
              }

              [class*="__original"] {
                position                      : relative;
                z-index                       : 0;

                &:before {
                  content                     : '';

                  position                    : absolute;
                  top                         : calc(50% - 3px);
                  left                        : -3px;
                  right                       : -2px;
                  z-index                     : 0;

                  height                      : 2px;

                  background-color            : tint(dark,3);
                  transform                   : rotate(4deg);
                }
              }
            }
          }
        }

        [class*="app__button-slim"] {
          border-top                          : none;
        }

        [class="product__card-cardwrap__flags"] {
          [class*="__flags__flag"] {
            display                           : inline-flex;
            align-items                       : center;

            margin                            : 15px 10px 0 0;
            padding                           : 0 6px 0 6px;

            border                            : 1px solid tint(light,3);

            font-size                         : 11px;
            font-weight                       : 500;
            line-height                       : 100%;

            min-height                        : 25px;
            max-height                        : 25px;

            text-transform                    : uppercase;
            letter-spacing                    : .5px;

            color                             : tint(dark,1);

            &[class*='-sale'] {
              background-color                : $sale;
              border                          : 1px solid $sale;
              color                           : $white;
            }
          } 
        }

        [class="product__card-cardwrap__productimage"] {
          position                            : relative;
          z-index                             : 0;

          display                             : block;
          padding-top                         : 100%;

          background-color                    : tint(light,2);

          [class*="-picture"] {
            display                           : block;

            position                          : absolute;
            top                               : 0;
            left                              : 0;
            right                             : 0;
            bottom                            : 0;
            z-index                           : 0;

            overflow                          : hidden;

            &:after,
            &:before {
              content                         : '';

              position                        : absolute;
              top                             : 0;
              left                            : 0;
              right                           : 0;
              bottom                          : 0;
            }

            &:after {
              border                          : 1px solid tint(light,3);
              z-index                         : 2;
            }

            &:before {
              border                          : 5px solid $white;
              z-index                         : 1;
            }

            img {
              @include animate(opacity,.5s);

              display                         : block;

              width                           : auto;
              height                          : 100%;

              opacity                         : 0;

              position                        : absolute;
              top                             : 50%;
              left                            : 50%;
              z-index                         : 0;

              transform                       : translate(-50%,-50%);
            }

            &.loaded {
              img {
                opacity                       : 1;
              }
            }
          }

          &:after {
            @include animate(opacity,.25s);

            content                         : '';

            position                        : absolute;
            top                             : 0;
            left                            : 0;
            right                           : 0;
            bottom                          : 0;
            z-index                         : 0;
            
            opacity                         : 0;
            border                          : 2px solid tint(brand);
          }

          &:hover {
            &:after {
              opacity                       : 1;
            }
          }
        }
      }
    }
  }
</style>