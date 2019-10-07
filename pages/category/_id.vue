<template>
  <div class="grid content" style="--padding-top: 40px; --padding-bottom: 40px;">
    <aside>
      <PagesCategorySidebar></PagesCategorySidebar>
    </aside>
    <div class="grid__column__line"></div>
    <main class="product__listing">
      <h1>{{ id }}</h1>
      <ProductCard v-for="(product, index) in products" v-bind:key="index" :productData="product"></ProductCard>
      <!-- Show Skelletons as long as no Products are loaded yet //-->
      <ProductSkelleton v-if="skelletons" v-for="n in productsPerPage" v-bind:key="n"></ProductSkelleton>
    </main>
  </div>
</template>

<script>
  import ProductCard from '~/components/ProductCard/ProductCard';
  import ProductSkelleton  from '~/components/ProductSkelleton';
  import PagesCategorySidebar from '~/components/pages/category/PagesCategorySidebar';

  export default {
    layout          : 'sidebar',
    components      : {
      ProductCard,
      ProductSkelleton,
      PagesCategorySidebar
    },

    data() {
      return {
        products        : null,
        productsPerPage : 15,

        skelletons      : true,
        route           : this.$route.params.id,
        state           : 'stoffe.html'
      }
    },

    methods         : {
      infiniteLoad() {
        /*if(typeof Waypoint === 'function') {
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
        }*/
      },

      getProductData() {
        this.$axios.$post('/api/products.ajax.php',{
          route     : this.id,
          quantity  : this.$data.productsPerPage
        })
        .then(response => {
          if(response.error === false) {
            this.$data.products   = response.products;
            this.$data.skelletons = false;
          }
        })
        .catch(error => {
          console.log(error);
        });
      }
    },

    computed        : {
      id : function() {
        return this.$data.state.split('.html').join('');
      }
    },
    
    created() {
      if(this.$route.params.id !== undefined) {
        this.$data.route = this.$route.params.id;
      }

      this.$root.$on('LayoutReady',() => {
        this.getProductData();
        //this.infiniteLoad();
      });
    },
    
    mounted() {

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