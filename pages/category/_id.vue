<template>
  <div class="grid content" style="--padding-top: 50px; --padding-bottom: 50px;">
    <aside>
      <PagesCategoryFactsheet v-if="factsheet" :factsheetData="factsheet" :hasDesciption="hasDesciption" @FactsheetButtonClick="factsheetClick"></PagesCategoryFactsheet>
      <PagesCategorySidebar></PagesCategorySidebar>
    </aside>
    <div class="grid__column__line"></div>
    <main class="product__listing">
      <nav role="navigation" class="product__listing-navigation__breadcrump">
        Du bist hier:
        <a href="/category/stoffe.html">Stoffe</a> 
        <svg role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
          <use xlink:href="/svg/sprite.svg#arrow-right-thick"></use>
        </svg>
        <a href="/category/stoffe.html">Dekostoffe</a>
      </nav>
      <h1>{{ headline }}</h1>
      <ListCard v-for="(product, index) in products" v-bind:key="index" :productData="product"></ListCard>
      <!-- Show Skelletons as long as no Products are loaded yet //-->
      <ProductSkelleton v-if="skelletons" v-for="n in productsPerPage" v-bind:key="Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5)"></ProductSkelleton>
      <AppButton v-if="!loadInfinite" @AppButtonClick="loadProductsClick" :css="'product__listing__load-more__button'" :icon="'eye-show-line'">Mehr Produkte anzeigen</AppButton>
      <PagesCategoryDescription v-if="description" :desciptionHtml="description"></PagesCategoryDescription>
    </main>
  </div>
</template>

<script>
  import Position from '~/plugins/Position.plugin.js'
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppButton from '~/components/AppButton'
  import ListCard from '~/components/ListCard/ListCard'
  import ProductSkelleton  from '~/components/ProductSkelleton'
  import PagesCategorySidebar from '~/components/pages/category/PagesCategorySidebar'
  import PagesCategoryFactsheet from '~/components/pages/category/PagesCategoryFactsheet'
  import PagesCategoryDescription from '~/components/pages/category/PagesCategoryDescription'

  export default {
    layout : 'sidebar',

    components : {
      AppButton,
      ListCard,
      ProductSkelleton,
      PagesCategorySidebar,
      PagesCategoryDescription,
      PagesCategoryFactsheet
    },

    data() {
      return {
        busy            : false,

        loadInfinite    : true,

        products        : null,
        productCount    : null,
        productsPerPage : 15,

        factsheet       : null,
        description     : null,

        skelletons      : true,
        default         : 'stoffe.html',

        scrollThreshold : 80
      }
    },

    computed : {
      headline : function() {
        return 'Über 7000 Stoffe als Meterware zur Auswahl';

        /*if(this.$data.route !== undefined) {
          return this.$data.route.split('.html').join('');
        } else {
          return this.$data.default.split('.html').join('');
        }*/
      },

      hasDesciption : function() {
        if(this.$data.description) {
          return true;
        }

        return false;
      }
    },

    methods         : {
      infiniteLoad() {
        window.addEventListener('scroll',this.handleScrollEvent);
      },

      handleScrollEvent() {
        if(this.$data.skelletons === false) {
          const __scrollPosition = Math.round(100 * window.scrollY / (document.documentElement.scrollHeight - window.innerHeight));

          if(__scrollPosition >= this.$data.scrollThreshold && this.$data.loadInfinite === true) {
            this.$data.skelletons = true;
            this.getProductData(true);
          }/* else if(__scrollPosition < (this.$data.scrollThreshold * .75)) {
            if(this.$data.loadInfinite === false) {
              this.$data.loadInfinite = true;
            }
          }*/
        }
      },

      getProductData(infinite = false) {
        this.$axios.$post('/api/products.ajax.php',{
          quantity  : this.$data.productsPerPage,
          infinite  : infinite
        })
        .then(response => {
          if(response.error === false) {
            if(this.$data.products === null) {
              this.$data.products = response.products;
            } else {
              this.$data.products = this.$data.products.concat(response.products);
            }

            this.$data.skelletons = false;
            
            if(infinite == false) {
              if(this.$data.productCount === null && response.productcount) {
                this.$data.productCount = response.productcount;
              }

              if(this.$data.factsheet === null && response.factsheet) {
                this.$data.factsheet = response.factsheet;
              }

              if(this.$data.description === null && response.description) {
                this.$data.scrollThreshold  = 40;
                this.$data.description      = response.description;
              }
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
      },

      factsheetClick() {
        this.$data.loadInfinite = false;

        const __description = this.$el.querySelector('.product__listing-category__description');
        if(DOMElement.is(__description)) {
          const __y = Position.get(__description,{
            offset : -40
          });

          if(__y !== false) {
            window.scrollTo({
              top       : __y, 
              behavior  : 'smooth'
            });
          }
        }
      },

      loadProductsClick() {
        this.$el.classList.add('disable__hover');
        this.$data.loadInfinite = true;
        this.getProductData(true);

        setTimeout(() => {
          this.$el.classList.remove('disable__hover');
        },1000);
      }
    },
    
    created() {
      this.$root.$on('LayoutReady',() => {
        this.getProductData();
        this.infiniteLoad();
      });
    },
    
    mounted() {
      this.$root.$on('scrollToProducts', () => {
        const __listing = this.$el.querySelector('main.product__listing');

        if(DOMElement.is(__listing)) {
          const __y = Position.get(__listing,{
            offset : -40
          });

          if(__y !== false) {
            window.scrollTo({
              top       : __y, 
              behavior  : 'smooth'
            });
          }
        }
      });

      const __scrollPosition = Math.round(100 * window.scrollY / (document.documentElement.scrollHeight - window.innerHeight));

      if(__scrollPosition >= this.$data.scrollThreshold) {
        this.$data.loadInfinite = false;
      }
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