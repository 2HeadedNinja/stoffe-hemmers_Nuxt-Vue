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
      <ProductSkelleton v-if="skelletons" v-for="n in productsPerPage" v-bind:key="Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5)"></ProductSkelleton>
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
        productCount    : null,
        productsPerPage : 15,

        skelletons      : true,
        route           : this.$route.params.id,
        default         : 'stoffe.html'
      }
    },

    methods         : {
      infiniteLoad() {
        window.addEventListener('scroll',this.handleScrollEvent);
      },

      handleScrollEvent() {
        if(this.$data.skelletons === false) {
          const __scrollPosition = Math.round(100 * window.scrollY / (document.documentElement.scrollHeight - window.innerHeight));

          if(__scrollPosition >= 80) {
            this.$data.skelletons = true;
            this.getProductData();
          }
        }
      },

      getProductData() {
        this.$axios.$post('/api/products.ajax.php',{
          route     : this.id,
          quantity  : this.$data.productsPerPage
        })
        .then(response => {
          if(response.error === false) {
            if(this.$data.products === null) {
              this.$data.products = response.products;
            } else {
              this.$data.products = this.$data.products.concat(response.products);
            }

            this.$data.skelletons = false;

            if(this.$data.productCount === null && response.productcount) {
              this.$data.productCount = response.productcount;
            } else {
              if(this.$data.products.length >= this.$data.productCount) {
                window.removeEventListener('scroll',this.handleScrollEvent);
              }
            }
          }
        })
        .catch(error => {
          console.log(error);
        });
      }
    },

    computed : {
      id : function() {
        if(this.$data.route !== undefined) {
          return this.$data.route.split('.html').join('');
        } else {
          return this.$data.default.split('.html').join('');
        }
      }
    },
    
    created() {
      if(this.$route.params.id !== undefined) {
        this.$data.route = this.$route.params.id;
      }

      this.$root.$on('LayoutReady',() => {
        this.getProductData();
        this.infiniteLoad();
      });
    },
    
    mounted() {
    },

    updated() {
      /*if(this.$data.waypoint !== null) {
        this.$data.waypoint.context.refresh();

        setTimeout(() => {
          this.$data.waypoint.enable();
        },100);
      }*/
    }
  }
</script>