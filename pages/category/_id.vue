<template>
  <main class="product__listing">
    <h1>{{ id }}</h1>
    <ProductCard v-for="(product, index) in products" v-bind:key="index" :productData="product"></ProductCard>
    <!-- Show Skelletons as long as no Products are loaded yet //-->
    <ProductSkelleton v-if="!products" v-for="n in productsPerPage" v-bind:key="n"></ProductSkelleton>
  </main>
</template>

<script>
  import ProductCard from '~/components/ProductCard/ProductCard';
  import ProductSkelleton  from '~/components/ProductSkelleton';

  export default {
    layout          : 'sidebar',
    components      : {
      ProductCard,
      ProductSkelleton
    },

    data() {
      return {
        productsPerPage : 30,
        products        : null,
        route           : this.$route.params.id,
        state           : 'stoffe.html',
        waypoint        : null
      }
    },

    methods         : {
      infiniteLoad() {
        if(typeof Waypoint === 'function') {
          const __axios = this.$axios; 
          const __data  = this.$data;
          
          this.$data.waypoint = new Waypoint({
            element   : document.body,
            handler   : function(direction) {
              if(direction === 'down') {             
                this.disable();

                __axios.$get('http://localhost/ajax/products.ajax.php')
                  .then(response => {
                    if(response.error === false) {
                      __data.products = __data.products.concat(response.products);

                      if(__data.products.length >= 120) {
                        __data.waypoint.destroy();
                      } 
                    }
                  })
                  .catch(error => {
                    console.log(error);
                  });
              }
            },
            offset    : function() {
              return Math.round((document.body.getBoundingClientRect().height*.6) * -1);
            }
          });
        }
      },

      getProductData() {
        this.$axios.$get('http://localhost/ajax/products.ajax.php')
          .then(response => {
            if(response.error === false) {
              this.$data.products = response.products;
            }
          })
          .catch(error => {
            console.log(error);
          });

        /*if(__response.error === false) {
        }*/
      }
    },

    computed        : {
      id : function() {
        return this.$data.state.split('.html').join('');
      }
    },
    
    created() {
      if(this.$route.params.id !== undefined) {
        this.$data.state = this.$route.params.id;
      }

      this.$root.$on('LayoutReady',() => {
        this.getProductData();
        this.infiniteLoad();
      });
    },
    
    mounted() {
      this.$data.state = 'mounted: '+this.$data.state;
    },

    updated() {
      if(this.$data.waypoint !== null) {
        this.$data.waypoint.context.refresh();

        setTimeout(() => {
          this.$data.waypoint.enable();
        },100);
      }
    }
  }
</script>