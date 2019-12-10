<template>
  <div v-if="max && method == 'percent'" class="app__rating-percent flex">
    {{ getRating() }}
    <span :style="getStyle()">
      
    </span>
    <svg v-for="n in max" role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
      <use :xlink:href="getPath()"></use>
    </svg>
  </div>
  <div v-else-if="max && method == 'steps'" class="app__rating-steps flex">
    <svg v-for="n in max" :class=" n <= getRating() ? 'icon active' : 'icon'" role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
      {{ n }}
      <use :xlink:href="getPath()"></use>
    </svg>
  </div>
</template>

<script>
  export default {
    name  : 'AppRating',

    props : {
      max : {
        type : Number,

        default() {
          return null
        }
      },

      percent : {
        type : Number,

        default() {
          return 0;
        }
      },

      icon  : {
        type : String,

        default() {
          return 'star-solid';
        } 
      },

      method : {
        type : String,

        default() {
          return 'steps';
        }
      }
    },

    methods : {
      getPath() {
        return '/svg/sprite.svg#'+this.icon;
      },

      getStyle() {
        return 'width:'+ (this.percent) +'%;';
      },

      //Math.ceil(N / 10) * 10;

      getRating() {
        return Math.round((this.max / 100) * this.percent);
      }
    },
  }
</script>

<style lang="scss">
  [class*="app__rating"] {
    position                          : relative;
    z-index                           : 0;

    overflow-y                        : hidden;
    
    > svg {
      fill                            : tint(light,3);
    }

    &[class*="-steps"] {
      > svg {
        &.active {
          fill                        : tint(brand);
        }
      }
    }

    &[class*="-percent"] {
      > span {
        position                      : absolute;
        top                           : 0;
        left                          : 0;
        bottom                        : 0;

        width                         : 0%;

        background-color              : $white;
        background-color              : #ff0000;

        opacity                       : .7;

        overflow                      : hidden;
        white-space                   : nowrap;
      
        svg {
          display                     : inline-block;
          fill                        : tint(brand);

          height                      : 100%;
          width                       : auto;
        }
      }
    }
  }
</style>