<template>
  <div v-if="desciptionHtml" class="product__listing-category__description">
    <PagesCategoryTableOfContents :tableOfContent="this.$data.tableOfContent"></PagesCategoryTableOfContents>
    <article :class=" !tableOfContent ? 'continuous__text full' : 'continuous__text'" v-html="desciptionHtml"></article>
  </div>
</template>

<script>
  import Position from '~/plugins/Position.plugin.js'
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import PagesCategoryTableOfContents from '~/components/pages/category/PagesCategoryTableOfContents'

  export default {
    name : 'PagesCategoryDescription',

    components : {
      PagesCategoryTableOfContents
    },

    props : {
      desciptionHtml : {
        type : String,

        default() {
          return null;
        }
      }
    },

    data() {
      return {
        tableOfContent : null
      }
    },

    methods         : {
      getTableOfContents() {
        const __headlines = this.$el.querySelectorAll('h3,h4');
        if(DOMElement.is(__headlines)) {
          let   __tmp             = null;
          const __tableOfContents = new Array();

          for(const __headline of __headlines) {
            if(DOMElement.type(__headline,'h3')) {
              if(__tmp !== null) {
                if(__tmp.sub.length < 1) {
                  __tmp.sub = null;
                }
                __tableOfContents.push(__tmp);
              }

              __tmp       = {};
              __tmp.label = __headline.textContent;
              __tmp.obj   = __headline;
              __tmp.sub   = new Array();
            }

            if(DOMElement.type(__headline,'h4')) {
              if(__tmp !== null) {
                const __sub       = {};
                      __sub.label = __headline.textContent;
                      __sub.obj   = __headline; 

                __tmp.sub.push(__sub);
              }
            }
          }

          __tableOfContents.push(__tmp);

          if(__tableOfContents.length > 0) {
            this.$data.tableOfContent = __tableOfContents;
          }
        }
      }
    },

    created() {
    },

    mounted() {
      this.getTableOfContents();
    }
  }
</script>

<style lang="scss">
  .product__listing-category__description {
    grid-column                       : span 3;

    display                           : grid;
    grid-template                     : auto / repeat(12,1fr);
    grid-gap                          : 50px; 

    border-top                        : 1px dotted $border-light;
    padding-top                       : 50px;

    article {
      grid-column                     : span 8;

      &.full {
        grid-column                   : span 12;
      }
    }
  }
</style>