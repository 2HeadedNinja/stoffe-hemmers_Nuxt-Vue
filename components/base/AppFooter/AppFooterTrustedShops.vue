<template>
  <div v-if="reviews" class="app__footer-trustedshops content grid">
    <AppFooterTrustedShopsReview v-for="(review, index) in reviews" v-bind:key="index" :reviewData="review"></AppFooterTrustedShopsReview>
  </div>
</template>

<script>
  import AppFooterTrustedShopsReview from '~/components/base/AppFooter/AppFooterTrustedShopsReview'

  export default {
    name        : 'AppFooterTrustedShops',

    components  : {
      AppFooterTrustedShopsReview
    },

    data() {
      return {
        reviews : null
      }
    },

    methods : {
      getReviewData(infinite = false) {
        this.$axios.$post('/api/trustedshops.ajax.php',{
          quantity  : this.$data.productsPerPage,
          infinite  : infinite
        })
        .then(response => {
          if(response.error === false) {
            this.$data.reviews = response.data;
          }
        })
        .catch(error => {
          console.log(error);
        });
      }
    },

    created() {
      this.$emit('AppFooterTrustedShopsCreated');

      this.$root.$on('LayoutReady',() => {
        this.getReviewData();
      });
    },

    mounted() {
      this.$emit('AppFooterTrustedShopsMounted');
    }
  }
</script>