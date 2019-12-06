<template>
  <div v-if="reviews" class="app__footer-trustedshops content flex">
    <p>{{ $t('appFooter.trusted.headline',{ currentRating : schema.result, maxRating : schema.max, ratingCount : schema.activeCount }) }}</p>
    <div class="grid">
      <AppFooterTrustedShopsReview v-for="(review, index) in reviews" v-bind:key="index" :reviewData="review"></AppFooterTrustedShopsReview>
    </div>
    <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__button-slim-auto'" :label="'Alle X Kundenmeinungen'">{{ $t('appFooter.trusted.button',{ counter : schema.count }) }}</AppButton>
  </div>
</template>

<script>
  import AppButton from '~/components/AppButton'
  import AppFooterTrustedShopsReview from '~/components/base/AppFooter/AppFooterTrustedShopsReview'

  export default {
    name        : 'AppFooterTrustedShops',

    components  : {
      AppButton,
      AppFooterTrustedShopsReview
    },

    data() {
      return {
        reviews : null,
        schema  : null
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
            this.$data.schema  = response.schema;
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