<template>
  <div v-if="factsheetData" class="category__sidebar-factsheet" style="--margin-bottom: 40px;">
    <picture v-if="factsheetData.image">
      <img :alt="imageAlt" :src="factsheetData.image">
    </picture>
    <div class="category__sidebar-factsheet__inner">
      <h6 v-if="factsheetData.title">{{ factsheetData.title }}</h6>
      <p v-if="factsheetData.characteristics">
        <strong>Typische Einsatzbereiche</strong>
      </p>
      <ul v-if="factsheetData.characteristics" class="base__list">
        <li v-for="(label, index) in factsheetData.characteristics" v-bind:key="index">{{ label }}</li>
      </ul>
      <p v-if="factsheetData.applications">
        <strong>Typische Einsatzbereiche</strong>
      </p>
      <ul v-if="factsheetData.applications" class="base__list">
        <li v-for="(label, index) in factsheetData.applications" v-bind:key="index">{{ label }}</li>
      </ul>
      <AppButton v-if="hasDesciption" @AppButtonClick="click">Mehr Informationen</AppButton>
    </div>
  </div>
</template>

<script>
  import AppButton from '~/components/AppButton'

  export default {
    name : 'PagesCategoryFactsheet',

    components : {
      AppButton
    },

    props : {
      factsheetData : {
        type : Object,

        default() {
          return null;
        }
      },

      hasDesciption : {
        type : Boolean,

        default() {
          return false;
        }
      }
    },

    computed : {
      imageAlt : function() {
        if(this.factsheetData.title) {
          return this.factsheetData.title;
        }

        return 'Stoffe Hemmers';
      }
    },

    methods : {
      click : function() {
        this.$emit('FactsheetButtonClick');
      }
    },

    created() {},

    mounted() {}
  }
</script>

<style lang="scss">
  [class="category__sidebar-factsheet"] {
    border                            : 1px solid $border-light;

    picture {
      display                         : block;

      position                        : relative;
      z-index                         : 0;

      max-width                       : 100%;

      img {
        position                      : relative;
        z-index                       : 0;

        width                         : 100%;
        height                        : auto;

        display                       : block;
      }

      &:before {
        content                       : '';

        position                      : absolute;
        top                           : 0;
        left                          : 0;
        right                         : 0;
        bottom                        : 0;
        z-index                       : 1;

        border                        : 4px solid $white;
      }
    }

    [class="category__sidebar-factsheet__inner"] {
      padding                         : 15px 20px 20px 20px;
    
      [class*="app__button"] {
        margin-top                    : 30px;
      }
    }
  }
</style>