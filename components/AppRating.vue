<template>
  <div v-if="max" class="app__rating flex">
    <span class="flex" :style="getStyle()">
      <svg v-for="n in getRating()" role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
        <use :xlink:href="getPath()"></use>
      </svg>
    </span>
    <svg v-for="n in max" role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
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
      }
    },

    methods : {
      getPath() {
        return '/svg/sprite.svg#'+this.icon;
      },

      getStyle() {
        return 'width:'+ (this.percent) +'%;';
      },

      getRating() {
        return Math.round((this.max / 100) * this.percent);
      }
    },
  }
</script>

<style lang="scss">
  .app__rating {
    position                          : relative;
    z-index                           : 0;

    > svg {
      fill                            : tint(light,3);
    }

    > span {
      position                        : absolute;
      top                             : 0;
      left                            : 0;
      bottom                          : 0;

      width                           : 0%;
      overflow                        : hidden;

      flex-wrap                       : no-wrap;
      background-color                : $white;

      overflow                        : hidden;
    
      svg {
        fill                          : tint(brand);
        float                         : left;
      }
    }
  }
</style>