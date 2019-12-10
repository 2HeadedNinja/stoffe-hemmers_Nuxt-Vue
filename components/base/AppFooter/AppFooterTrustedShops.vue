<template>
  <div v-if="reviews" class="app__footer-trustedshops content flex">
    <AppButton v-if="url" :role="'link'" :target="'_blank'" :href="url" :css="'app__footer-trustedshops__button-bold'">
      {{ $t('appFooter.trusted.headline',{ currentRating : schema.result, maxRating : schema.max, ratingCount : schema.activeCount }) }}
    </AppButton>
    <p v-else><strong>{{ $t('appFooter.trusted.headline',{ currentRating : schema.result, maxRating : schema.max, ratingCount : schema.activeCount }) }}</strong></p>
    <div class="grid">
      <AppFooterTrustedShopsReview v-for="(review, index) in reviews" v-bind:key="index" :reviewData="review"></AppFooterTrustedShopsReview>
      <svg role="presentation" class="app__footer-trustedshops__trusted-logo" preserveAspectRatio="xMidYMid meet" viewBox="0 0 282 117">
        <use xlink:href="/svg/sprite.svg#trusted-shops-black"></use>
      </svg>
    </div>
    <AppButton v-if="url" :role="'link'" :target="'_blank'" :href="url" :css="'app__footer-trustedshops__footer flex'" :icon="'arrow-right-thick'">
      {{ schema.count }} {{ $t('appFooter.trusted.buttonReviews') }}
    </AppButton>
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
        schema  : null,
        url     : null
      }
    },

    methods : {
      getReviewData(infinite = false) {
        this.$axios.$post('/api/trustedshops.ajax.php')
        .then(response => {
          if(response.error === false) {
            this.$data.reviews = response.data;
            this.$data.schema  = response.schema;
            this.$data.url     = response.url;
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